<?php 
include("../config/constant.php");
if(isset($_GET['id']))
{
    //echo "get value and delete";
    $id=$_GET['id'];
    $sql="DELETE FROM tbl_catagory WHERE id=$id";
    $res=mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete']="Catagory deleted successfully";
        header('location:'.SITEURL.'admin/manage-catagory.php');
    }
    else
    {
        $_SESSION['delete']="Failed";
        header('location:'.SITEURL.'admin/manage-catagory.php');
    }
}
else
{
    header('location:'.SITEURL.'admin/manage-catagory.php');
}
?>