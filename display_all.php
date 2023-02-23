<!-- connection File  -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Webiste</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="style.css">

    <style>

.card-body .stock {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 10px;
    right: 5px;
    width: 50px;
    height: 30px;
    background: #c8cd77;
    border-radius: 10px;
    color: #fff;
    
}

</style>

</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">

        <?php 
        // navbar include
        include('./includes/navbar.php');
        // Calling cart function
        cart(); 
        ?>

        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <ul class="navbar-nav me-auto">
                <!-- PHP Code -->
                <?php
                // For Guest to user name 
                if(!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='second-nav nav-link text-white' href='#'>Guest Account</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='second-nav nav-link text-white' href='#'>Welcome ". $_SESSION['username']."</a>
                </li>";
                }
                
                // For Login to Logout
                if(!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='second-nav nav-link text-white' href='./User/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='second-nav nav-link text-white' href='./User/logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="bg-light home-heading">
            <h3 class="text-center">Modern Couture</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>

        <!-- Fourth child -->
        <div class="row product-box">

            <!-- sidenav -->
            <div class="col-md-2 bg-primary bg-light p-0">
                <!-- Brands to be display -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-primary">
                        <a herf="#" class="nav-link text-white"><h5>Delivery Brands</h5></a>
                    </li>

                    <!-- PHP CODE -->
                    <?php
                    // calling function
                    getbrands();
                    ?>
                </ul>

                <!-- categories to be display -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-primary">
                        <a herf="#" class="nav-link text-white"><h5>Categories</h5></a>
                    </li>
                    
                    <!-- PHP CODE -->
                    <?php
                    // calling function 
                    getcategories();
                    ?>

                </ul>

            </div>

            <!-- products -->
            <div class="col-md-9">
                <div class="row">
                <!--fetching products -->
                <?php
                // calling function
                get_all_products();
                get_unique_categories();
                get_unique_brands();
                ?> 
                </div>
            </div>
        </div>



        <!-- Last Child -->
        <?php require_once("./includes/footer.php") ?>

    </div>











    <!-- JS bootstrap Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>