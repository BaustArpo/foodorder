<html>
        <head>
            <title>food-oder Website Homepage</title>
            <link rel="stylesheet" href="../css/admin.css">
        </head>
        
    <body>
        <?php include('partials/menu.php');?>

        <!--Main content start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
        
             ?>

                <div class="col-4 text-center">
                    <?php
                        $sql="SELECT * FROM tbl_catagory";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                    ?>
                    <h1><?php echo $count; ?></h1>
                    <br/>
                    catagories
                </div>
                <div class="col-4 text-center">
                   <?php
                        $sql2="SELECT * FROM tbl_food";
                        $res2=mysqli_query($conn,$sql2);
                        $count2=mysqli_num_rows($res2);
                    ?>
                    
                    <h1><?php echo $count2; ?></h1>
                    <br/>
                    Foods
                </div>
                <div class="col-4 text-center">
                 <?php
                        $sql3="SELECT * FROM tbl_oder";
                        $res3=mysqli_query($conn,$sql3);
                        $count3=mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br/>
                    Total Oder
                </div>
                <div class="col-4 text-center">
                   <?php
                        $sql4="SELECT SUM(total) AS total FROM tbl_oder";
                        $res4=mysqli_query($conn,$sql4);
                        $row4=mysqli_fetch_assoc($res4);
                        $total_revenue=$row4['total'];
                        
                    ?>

                    <h1>TK<?php echo $total_revenue; ?></h1>
                    <br/>
                    Revenue
                </div>
                <div class="clear-fix"></div>
            </div>
        </div>
        <!--Main content end -->
    
    </body> 
</html>
