<?php

include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="container-fluid my-5">
        <h2 class="text-center  mb-5">New User Registration</h2>
        <div class="row d-flex align-iems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4 m-auto w-75">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" name="user_username" placeholder="Enter your username" autocomplete="off" required='required'>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" name="user_email" placeholder="Enter your email" autocomplete="off" required='required'>
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_email" class="form-control" name="user_image" required='required'>
                    </div>
                    <!-- password Filed -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter your password" autocomplete="off" required='required'>
                    </div>
                    <!-- confirm password Field  -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" name="conf_user_password" placeholder="Confirm your password" autocomplete="off" required='required'>
                    </div>
                    <!-- Address Field -->
                    <div class="form-outline mb-4 m-auto w-75">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" name="user_address" placeholder="Enter your address" autocomplete="off" required='required'>
                    </div>
                    <!-- Contact Field -->
                    <div class="form-outline mb-4 m-auto w-75">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" name="user_contact" placeholder="Enter your contact" autocomplete="off" required='required'>
                    </div>
                    <div class="form-oultline w-50" style="margin-left: 87px;">
                    <input type="submit" name="user_register" class="btn btn-primary mb-3 px-3" value="Register">
                    <p>Already have an account? <a href="user_login.php"><strong>Login</strong></a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>
    
</body>
</html>


<!-- PHP code -->

<?php

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    // For Image
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    // For Ip address
    $user_ip = getIPAddress();

    //select Query

    $select_query = "SELECT * FROM user_table WHERE user_name = '$user_username' or user_email='$user_email' or user_mobile='$user_contact'";
    $result = mysqli_query($connection, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0) {
        echo "<script> alert('username, email or contact already exist.'); </script>";
    }elseif(strlen($user_password) < 8) {
        echo "<script> alert('Password must be 8 digits.'); </script>";
    }
    elseif($user_password != $conf_user_password) {
        echo "<script> alert('Password do not matched.'); </script>";
    }else {
    // insert Query
    move_uploaded_file($user_image_tmp, "./User_images/$user_image"); // move image into user_image Folder
    $insert_query = "INSERT INTO user_table (user_name,user_email,user_password,user_image,user_ip,user_address,	user_mobile) VALUES ('$user_username', '$user_email','$hash_password', '$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($connection, $insert_query);
    if($sql_execute) {
        echo "<script> alert('Register successfully.'); </script>";
    }else {
        die("not inserted");
    }
    }

    // selecting cart items
    $select_cart_items = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($connection, $select_cart_items);

    $cart_rows_count = mysqli_num_rows($result_cart);
    if($cart_rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script> alert('You have items in your cart.'); </script>";
        echo "<script> window.open('checkout.php','_self'); </script>";
    } else {
        echo "<script> window.open('../index.php','_self'); </script>";
    }

}

?>