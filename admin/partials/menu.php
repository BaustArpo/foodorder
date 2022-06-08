<?php 
    include('../config/constant.php');
    include('login-check.php');
 ?>

<html>
    <head>
        <title>food-oder Website Homepage</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!--Menu Section start -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="/food-oder/admin/index.php">Home</a></li>
                    <li><a href="/food-oder/admin/manage-admin.php">Admin</a></li>
                    <li><a href="/food-oder/admin/manage-catagory.php">Catagory</a></li>
                    <li><a href="/food-oder/admin/manage-food.php">Food</a></li>
                    <li><a href="/food-oder/admin/manage-oder.php">order</a></li>
                    <li><a href="/food-oder/admin/logout.php">Logout</a></li>
                </ul>
            </div>
           

        </div>
        <!--Menu Section end -->
    </body>    
</html>