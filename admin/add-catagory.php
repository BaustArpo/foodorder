<?php include('./partials/menu.php'); ?>
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
</style>
<?php
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

?>
<br><br>
<div class="main-content">
    <div class="wrapper">
        <h1>Add catagory</h1>
        <br><br>

        <form action="add-catagory.php" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title</td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Catagory" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        <?php
        if (isset($_POST['submit'])) {
            echo "cliked";
            $title = $_POST['title'];
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            //print_r($_FILES['image']);
            //die();
            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                //$ext= end(explode('.',$image_name));
                //$image_name="Food_catagory_".rand(000,999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/catagory/" . $image_name;



                $upload = move_uploaded_file($source_path, $destination_path);


                if ($upload == false) {
                    $_SESSION['upload'] = "Failed to upload";
                    header('location:' . SITEURL . 'admin/add-catagory.php');
                    die();
                }
            } else {
                $image_name = "";
            }



            $sql = "INSERT INTO tbl_catagory SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        ";

            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $_SESSION['add'] = "catagory added";
                header('location:' . SITEURL . 'admin/manage-catagory.php');
            } else {
                $_SESSION['add'] = "Error";
                header('location:' . SITEURL . 'admin/add-catagory.php');
            }
        }

        ?>


    </div>
</div>