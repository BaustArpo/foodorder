<?php
    include('../config/constant.php');

     $id=$_GET['id'];

    $sql="DELETE FROM tbl_admin WHERE id=$id";

    $res= mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete']="Admin deleted";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['delete']="failed.try again";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>