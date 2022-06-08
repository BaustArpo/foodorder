<?php include('./partials/menu.php'); ?>
<style>
    H1{
        text-align: center;
        font-weight: lighter;
    }
    table{
        border-top: 1px solid black;
        padding: 4%;
        border-bottom: 1px solid #ddd;
        align-items: center;
    }
    th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid red;
}
    .btn-success{
        background-color: #2596be;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: green;
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
  align-self: right;

    }
    .btn-danger{
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
    .th-1{
        text-align: right;
    }
    .red{
        color: red;
    }
</style>
<div class="main-content">
    <div class="wrapper">
        <h1>manage catagory</h1>
        <br>
        <?php 
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
?>
<br>

        <a class="btn-success" href="/food-oder/admin/add-catagory.php">Add catagory <br></a>
        <table>
            <tr>
                <th >S.n</th>
                <th >title</th>
                <th >image</th>
                <th >featured</th>
                <th >active</th>
                <th  colspan="2">Actions</th>
            </tr>
            <?php 
            $sql="SELECT * FROM tbl_catagory";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                    ?>
             <tr>
                <td ><?php echo $sn++; ?></td>
                <td ><?php echo $title; ?></td>
                <td >
                    <?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" width="100px">
                                <?php

                            }
                            else
                            {
                                echo "Image Not Available";
                            }
                    ?>
                </td>
                <td ><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
                
                <td >
                    
                    <a class="btn-danger" href="<?php echo SITEURL; ?>admin/delete-catagory.php ? id=<?php echo $id; ?>">Delete catagory</a>

                </td>
            </tr>

                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                    <div aria-colspan="6" class="red">No catagory added</div>
                </tr>
                <?php
            }
            ?>

          
        </table>
    </div>


</div>