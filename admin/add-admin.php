<?php include('./partials/menu.php'); ?>
<style>
    .tbl-30 {
        width: 30%;
    }

    .btn-secondary {
        background-color: #5352ed;
        text-decoration: none;
        color: white;

    }
</style>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="FULL NAME"></td>
                </tr>

                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username" placeholder="USERNAME"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="PASSWORD"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php  
  //coonecction
    $conn = mysqli_connect('localhost', 'root', '');
    $db_select = mysqli_select_db($conn, 'food-oder');
if (isset($_POST['submit'])) {
    //button clicked
    //echo"button cliked";
    $full_name = $_REQUEST['full_name'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    //sql to save data in database
    $sql = "INSERT INTO tbl_admin (full_name,username,password)
    values ('$full_name','$username','$password')";
    $res = mysqli_query($conn, $sql);

    if($res=TRUE)
    {
        echo"DATA In";
    }
    else
    {
        echo"DATA FAILED";
    }
}

?>