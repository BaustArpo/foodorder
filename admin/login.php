<?php 
include('../config/constant.php');
?>

<html>
    <head>
        <title>LOGIN PAGE</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <style>
        .login{
            margin: 10% auto;
            padding: 5%;
            text-align: center;
    border: 1px solid gray;
    width: 20%;
    }
    </style>
    <body>
    <div class="login">
        <h1>Login</h1>

        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-massage']))
            {
                echo $_SESSION['no-login-massage'];
                unset($_SESSION['no-login-massage']);
            }
        
        ?>
        <form action="" method="POST">
            username: <br>
            <input type="text" name="username"><br>
            password: <br>
            <input type="password" name="password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
        

    </div>    

    </body>
</html>

<?php 
    if(isset($_POST['submit']))
    {
       echo $username=$_POST['username'];
       echo $password=$_POST['password'];

       $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

       $res=mysqli_query($conn, $sql);

       $count=mysqli_num_rows($res);

       if($count==1)
       {
           $_SESSION['login']="Login Successful";
           $_SESSION['user']=$username;
           header('location:'.SITEURL.'admin/');
       }
       else
       {
        $_SESSION['login']="Login UNSuccessful";
        header('location:'.SITEURL.'admin/login.php');

       }

    }


?>