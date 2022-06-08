<html>

<head>
    <title>food-oder Website Homepage</title>
    <link rel="stylesheet" href="../../css/admin.css">

</head>
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
</style>


<body>
    <?php include('./partials/menu.php'); ?>
    <!--Main content start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>WELCOME TO ADMIN PANEL</h1>
            <br>

            <?php 
             if(isset($_SESSION['delete']))
             {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);   
             }
             
             if(isset($_SESSION['user-not-found']))
             {
                 echo $_SESSION['user-not-found'];
                 unset($_SESSION['user-not-found']);
             }
             if(isset($_SESSION['pwd-not-match']))
             {
                 echo $_SESSION['pwd-not-match'];
                 unset($_SESSION['pwd-not-match']);
             }
            ?>
            <br>
            <!--- admin button --->
            

            <table>
                <tr>
                    <th >S.n</th>
                    <th >Full Name</th>
                    <th >Username</th>
                    <th >Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn,$sql);
                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                ?>
                                    <tr>
                                            <td ><?php echo $sn++; ?> </td>
                                            <td ><?php echo $full_name ?></td>
                                            <td ><?php echo $username ?></td>
                                            <td >
                                                
                                                <a class="btn-secondary" href="<?php echo SITEURL; ?>admin/update-admin.php ? id=<?php echo $id; ?>">Update</a></td>

                                        <td>
                                                <a class="btn-danger" href="<?php echo SITEURL; ?>admin/delete-admin.php ? id=<?php echo $id; ?>">Delete</a>
                                                
                                            </td>
                                        </tr>
                                <?php
                            }
                        }
                    }
                    else{

                    }
                ?>

                
            </table>
            <a class="btn-success" href="add-admin.php">Add admin <br></a>


        </div>
        <!--Main content end -->

</body>

</html>