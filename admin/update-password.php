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
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action=""method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Old Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="COnfiem Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        //get data 
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        //check if pass exists
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='current_password'";

        //execute the querey
        $res=mysqli_query($conn, $sql);
        if($res==true)
        {
            $count=mysqli_num_rows($res);

            if($count==1)
            {
               // echo "User Found";
               //check new and confirm match or not
               if($new_password=$confirm_password)
               {
                    echo "password match";
               }
               else
               {
                $_SESSION['pwd-not-match']="Password did not match";
                header('location:'.SITEURL.'admin/manage-admin.php');
                
               }
            }
            else
            {
                $_SESSION['user-not-found']="user not found";
                header('location:'.SITEURL.'admin/manage-admin.php');
                
            }


    }
}

?>