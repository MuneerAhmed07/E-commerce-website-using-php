<!-- connection File  -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?> </title>

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

    <!-- navbar -->
    <div class="container-fluid p-0">

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <img src="../products/logo.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="first-nav nav-link active text-white" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="../display_all.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="./profile.php">My Account</a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="../cart.php"><i
                            class="fa-solid fa-cart-shopping"></i><sup>&nbsp;<?php cart_item_number(); ?></sup></a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                </li>
            </ul>
            <form class="d-flex" action="../search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="search_data" autocomplete="off">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
            </form>
            </div>
        </div>
    </nav>
        
        <?php
        // Calling cart function
        cart(); 
        ?>

        <!-- Second Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <ul class="navbar-nav me-auto">
                <!-- PHP code -->
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
                    <a class='second-nav nav-link text-white' href='./user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='second-nav nav-link text-white' href='./logout.php'>Logout</a>
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

        <!-- fourth Child -->
        <div class="row my-5 px-5">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav bg-light text-center">
                <li class="nav-item bg-primary">
                    <a class="nav-link text-white" href="#"><h5 class="m-0">Your Profile</h5></a>
                </li>
                <?php
                $username = $_SESSION['username'];
                $user_image = "SELECT * FROM user_table WHERE user_name = '$username'";
                $result_image = mysqli_query($connection, $user_image);
                $fetch_image = mysqli_fetch_array($result_image);
                $user_image = $fetch_image['user_image'];
                echo "
                <li class='nav-item'>
                <img src='./User_images/$user_image' alt='user_image' class='user-image border border-3 border-light rounded-circle'>
                </li>";
                ?>
                <li class="nav-item border-top border-2 border-white py-1">
                    <a class="nav-link text-dark side-bar" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item border-top border-2 border-white py-1">
                    <a class="nav-link text-dark side-bar" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item border-top border-2 border-white py-1">
                    <a class="nav-link text-dark side-bar" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item border-top border-2 border-white py-1">
                    <a class="nav-link text-dark side-bar" href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item border-top border-2 border-white py-1">
                    <a class="nav-link text-dark side-bar" href="./logout.php">Logout</a>
                </li>
                </ul>
            </div>
            <!-- second container -->
            <div class="col-md-10 text-center">
            <?php 
            get_user_order_details();

            if(isset($_GET['edit_account'])){
                include('./edit_account.php');
            }
            if(isset($_GET['my_orders'])){
                include('./user_orders.php');
            }
            if(isset($_GET['delete_account'])){
                include('./delete_account.php');
            }
            ?>
            </div>
        </div>





        <!-- Last Child -->
        <?php require_once("../includes/footer.php") ?>

    </div>











    <!-- JS bootstrap Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>