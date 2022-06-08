<?php  include('./partials/menu.php');?>
<style>
    .tbl-30 {
        width: 30%;
    }

.btn-secondary {
  background-color: #EA4C89;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
 .btn-secondary:hover {
        color: orange;
    }
</style>

<?php 
   $id=$_GET['id'];

   $sql="SELECT * FROM tbl_admin WHERE id=$id";

   $res=mysqli_query($conn, $sql);

   if($res==true)
   {
       $count = mysqli_num_rows($res);
       if($count==1)
       {
            $rows=mysqli_fetch_assoc($res);

            $full_name=$rows['full_name'];
            $username=$rows['username'];
       }
       
   }

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin Page</h1>

        <br><br>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>
                    
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
    //check the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "cliked";
        //get values from form
        echo $id=$_POST['id'];
        echo $full_name=$_POST['full_name'];
        echo $username=$_POST['username'];

        //sql query for update
        $sql = "UPDATE tbl_admin SET 
        full_name='$full_name',
        username='$username' 
        WHERE id='$id' 
        ";
        //execute the querey
        $res=mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['update'] = "updated";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update'] = "not updated";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

 