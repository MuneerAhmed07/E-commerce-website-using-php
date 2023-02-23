<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if(!isset($_SESSION['admin_username'])){
    header("location:admin_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="../style.css">

</head>
<body>

    <!-- Navbar -->
    <div class="container-fluid p-0">

        <!-- First Child  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <img class="logo" src="../products/logo.png" alt="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex">
                            <?php
                            // For guest to user name
                            if(!isset($_SESSION['admin_username'])) {
                                echo " <li class='nav-item'>
                                <a class='first-nav nav-link text-white' href='#'>Guest Account</a>
                                </li>";
                            } else {
                                echo "<li class='nav-item'>
                                <a class='first-nav nav-link text-white' href='#'>Welcome ". $_SESSION['admin_username']."</a>
                                </li>";
                            }
                            // For Login to Logout
                            if(!isset($_SESSION['admin_username'])) {
                                echo "<li class='nav-item'>
                                <a class='first-nav nav-link text-white' href='./admin_login.php'>Login</a>
                            </li>";
                            } else {
                                echo "<li class='nav-item'>
                                <a class='first-nav nav-link text-white' href='./admin_logout.php'>Logout</a>
                            </li>";
                            }
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-5">Manage Details</h3>
        </div>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 p-1 bg-dark d-flex align-items-center">
                <div class="me-5 ms-4 p-3">
                    <a href="#"><img src="../products/admin-profile.png" alt="admin-profile" class="admin-image border border-3 border-light rounded-circle"></a>
                    <?php

                    // For guest to user name
                    if(!isset($_SESSION['admin_username'])) {
                        echo " <p class='text-light text-center m-0 mt-2'>Admin Name</p>";
                    } else {
                        echo "<p class='text-light text-center m-0 mt-2'> ". $_SESSION['admin_username']."</p>";
                    }

                    ?>
                </div>
                <div class="button text-center">
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="insert_product.php" class="nav-link text-light bg-primary button-text">Insert Products</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?view_products" class="nav-link text-light bg-primary button-text">View Products</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?insert_category" class="nav-link text-light bg-primary button-text">Insert Categories</a>
                     </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?view_categories" class="nav-link text-light bg-primary button-text">View Categories</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?insert_brand" class="nav-link text-light bg-primary button-text">Insert Brands</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?view_brands" class="nav-link text-light bg-primary button-text">View Brands</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?list_orders" class="nav-link text-light bg-primary button-text">ALL Orders</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?list_payment" class="nav-link text-light bg-primary button-text">All Payments</a>
                    </button>
                    <button class="border border-primary rounded-3 mb-2">
                        <a href="index.php?list_user" class="nav-link text-light bg-primary button-text">List Users</a>
                    </button>
                </div>
            </div>
        </div>


        <!-- Fourth child -->
        <div class="container my-5 py-5">
            <?php
            if(isset($_GET['insert_category'])) {
                include_once('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])) {
                include_once('insert_brands.php');
            }
            if(isset($_GET['view_products'])) {
                include_once('view_products.php');
            }
            if(isset($_GET['edit_products'])) {
                include_once('edit_products.php');
            }
            if(isset($_GET['delete_product'])) {
                include_once('delete_product.php');
            }
            if(isset($_GET['view_categories'])) {
                include_once('view_categories.php');
            }
            if(isset($_GET['view_brands'])) {
                include_once('view_brands.php');
            }
            if(isset($_GET['edit_category'])) {
                include_once('edit_category.php');
            }
            if(isset($_GET['edit_brands'])) {
                include_once('edit_brands.php');
            }
            if(isset($_GET['delete_category'])) {
                include_once('delete_category.php');
            }
            if(isset($_GET['delete_brands'])) {
                include_once('delete_brand.php');
            }
            if(isset($_GET['list_orders'])) {
                include_once('list_orders.php');
            }
            if(isset($_GET['delete_orders'])) {
                include_once('delete_orders.php');
            }
            if(isset($_GET['list_payment'])) {
                include_once('list_payment.php');
            }
            if(isset($_GET['delete_payment'])) {
                include_once('delete_payment.php');
            }
            if(isset($_GET['list_user'])) {
                include_once('list_user.php');
            }
            if(isset($_GET['delete_user'])) {
                include_once('delete_user.php');
            }
            
            ?>
        </div>


        <!-- Footer section -->
        <?php require_once("../includes/footer.php") ?>


    </div>










    <!-- JS bootstrap Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    
</body>
</html>