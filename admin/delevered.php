<?php
    include('../config/constant.php');

     $customer_email=$_GET['email'];

     echo $customer_email;

    $sql="DELETE FROM `tbl_oder` WHERE customer_email = '$customer_email'";

    $res= mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete']="Food delivered";

        header('location:'.SITEURL.'admin/manage-oder.php');
    }
    else{
        $_SESSION['delete']="failed.try again";

        header('location:'.SITEURL.'admin/manage-oder.php');
    }
?>
