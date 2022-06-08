<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-massage']="Please Login";
        header('location:'.SITEURL.'admin/login.php');
    }
?>