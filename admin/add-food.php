<?php 
    include('./partials/menu.php');
?>
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
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                <td>title:</td>
                <td>
                    <input type="text" name="title">
                </td>
                </tr>

                <tr>
                    <td>description:</td>
                    <td>
                        <textarea name="description"  cols="30" rows="5"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>catagory:</td>
                    <td>
                        <select name="catagory">
                        <?php 
                        $sql="SELECT * FROM tbl_catagory WHERE active='Yes'";
                        $res=mysqli_query($conn, $sql);
                        $count=mysqli_num_rows($res);
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $title=$row['title'];
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <option value="0">No Catagory Found</option>
                            <?php
                            

                        }
                        ?>

                            <option value="1">Food</option>
                            <option value="2">Snaks</option>
                        </select>
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
                        <input type="submit" name="submit" value="Add food"class="btn-secondary">
                    </td>
                </tr>
                

            </table>
        </form>

            <?php 
            if(isset($_POST['submit']))
            {
               echo "clicked";
               $title=$_POST['title'];
               $description=$_POST['description'];
               $price=$_POST['price'];
               $catagory=$_POST['catagory'];
               if(isset($_POST['featured']))
               {
                   $featured=$_POST['featured'];
               }
               else{
                   $featured="No";
               }
               if(isset($_POST['active']))
               {
                   $active=$_POST['active'];
               }
               else{
                   $active="No";
               }

               if(isset($_FILES['image']['name']))
               {
                    $image_name= $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        

                        $src=$_FILES['image']['tmp_name'];
                        $dst="../images/food/".$image_name;

                        $upload=move_uploaded_file($src,$dst);
                        if($upload==false)
                        {
                            $_SESSION['upload']="Failed to upload";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
               }
               else
               {
                   $image_name="";
               }

               $sql2="INSERT INTO tbl_food SET
               title='$title',
               description='$description',
               price=$price,
               image_name='$image_name',

               catagory_id=$catagory,
               featured='$featured',
               active='$active'
               
               ";
               $res2=mysqli_query($conn, $sql2);
               if($res2==true)
                  {
                    $_SESSION['add']="Food added";
                    
                }
                else{
                    $_SESSION['add']="Error DXD";
                    header('location:'.SITEURL.'admin/add-food.php');
                    }
            }
            ?>


    </div>
</div>