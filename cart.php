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
    <title>E-commerce Webiste Cart-details</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <img src="./products/logo.png" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="first-nav nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="first-nav nav-link text-white" href="./display_all.php">Products</a>
                    </li>
                    <?php
                    if(isset($_SESSION['username'])) {
                        echo "
                        <li class='nav-item'>
                        <a class='first-nav nav-link text-white' href='./User/profile.php'>My Account</a>
                    </li>";
                    }else {
                        echo "
                        <li class='nav-item'>
                        <a class='first-nav nav-link text-white' href='./User/user_registration.php'>Register</a>
                    </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="first-nav nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="first-nav nav-link text-white" href="cart.php"><i
                                class="fa-solid fa-cart-shopping"></i><sup>&nbsp;<?php cart_item_number(); ?></sup></a>
                    </li>
                </ul>
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

        <!-- Fourth child-table -->
        <div class="container my-5">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered  text-center">
                    <tbody>

                        <!-- PHP code to display dynamic cart data -->
                        <?php
                        $get_ip_address = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
                        $result = mysqli_query($connection, $cart_query);

                        // check data have or not
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {

                            // Table heading 
                            echo "
                            <thead>
                                <tr class='bg-primary text-white'>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            ";

                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_product_price = "SELECT * FROM products WHERE product_id = '$product_id'";
                                $result_product_price = mysqli_query($connection, $select_product_price);

                                while ($row_product_price = mysqli_fetch_array($result_product_price)) {
                                    $product_price = [$row_product_price['product_price']];
                                    $price_table = $row_product_price['product_price']; // product price
                                    $product_title = $row_product_price['product_title']; // product title
                                    $product_image1 = $row_product_price['product_image1']; // product image
                                    $product_stock = $row_product_price['product_stock']; //product stock
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                                    ?>

                        <tr class='body-row'>
                            <td><?php echo $product_title; ?></td>
                            <td><img src='./Admin/product_images/<?php echo $product_image1; ?>' alt='<?php echo $product_image1; ?>' class='cart-image'></td>
                            <td><input type='number' min='1' max='50' name='quantity' class='px-1' ></td>

                            <?php
                            $get_ip_address = getIPAddress();
                            if (isset($_POST['update_cart'])) {
                                $quantities = $_POST['quantity'];
                                if($quantities == $product_stock or $quantities < $product_stock){
                                    $update_cart = "UPDATE cart_details SET quantity = $quantities WHERE ip_address = '$get_ip_address'";
                                    $result_product_quantity = mysqli_query($connection, $update_cart);
                                    $total_price = $total_price * $quantities;
                                }else {
                                    echo "<script> alert('Stock not available'); </script>";
                                }

                            }
                            ?>

                            <td><?php echo $price_table; ?>/-</td>
                            <td><input type='checkbox' name='remove_item[]' class='checkbox' value="<?php echo $product_id ?>"></td>
                            <td>
                                <input type='submit' value='update cart' class='btn btn-primary' name='update_cart'>
                                <button class='btn btn-danger ms-2' name="remove_cart"><i class='fa-solid fa-trash-can'></i></button>
                            </td>
                        </tr>

                        <?php
                                }
                            }
                        } else {
                            echo "<div class='text-center'>
                            <img src='./products/records.png' alt='records' width='300px'>
                            <h2 class='text-danger mt-2'>Cart is Empty.</h2>
                            <a href='index.php' class='btn btn-primary text-decoration-none mt-3 px-4'>Continue Shoping</a>
                            </div>";
                        }
                        ?>

                    </tbody>
                </table>

                <!-- subtotal -->
                <div class="d-flex p-0 mt-4">
                <?php
                $get_ip_address = getIPAddress();
                // $total_price = 0;
                $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
                $result = mysqli_query($connection, $cart_query);
                
                // check data have or not
                $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                    echo "
                    <h4 class='pe-3'>Subtotal: <strong class='text-primary'>$total_price/-</strong></h4>
                    <a href='index.php' class='btn btn-primary text-decoration-none'>Continue Shoping</a>
                    <a href='./User/checkout.php'class='btn btn-dark ms-3'>Checkout</a>
                    ";
                }
                ?>
                </div>
            </div>
            </form>

            <!-- Function to remove items -->
            <?php
            function remove_cart_item()
            {
                global $connection;
                if (isset($_POST['remove_cart'])) {
                    foreach ($_POST['remove_item'] as $remove_id) {
                        echo $remove_id;
                        $delete_query = "DELETE FROM cart_details WHERE product_id = $remove_id";
                        $run_delete = mysqli_query($connection, $delete_query);

                        if ($run_delete) {
                            echo "<script> window.open('cart.php','_self'); </script>";
                        }
                    }
                }
            }

            remove_cart_item();

            ?>

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