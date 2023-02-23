<?php

include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="container-fluid my-5 h-100">
        <h2 class="text-center  mb-5">User Login</h2>
        <div class="row d-flex align-iems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4 m-auto w-75">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" name="user_username" placeholder="Enter your username" autocomplete="off" required='required'>
                    </div>
                    <!-- password Filed -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter your password" autocomplete="off" required='required'>
                    </div>
                    <div class="form-oultline w-50" style="margin-left: 87px;">
                    <input type="submit" name="user_login" class="btn btn-primary mb-3 px-3" value="Login">
                    <p>Don't have a account? <a href="user_registration.php"><strong>Register</strong></a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>


<?php

if(isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE user_name = '$user_username'";
    $result = mysqli_query($connection, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // cart Item
    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($connection, $select_query_cart);
    $cart_row_count = mysqli_num_rows($select_cart);

    if($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            if($row_count == 1 and $cart_row_count == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script> alert('Login Successfully.'); </script>";
                echo "<script> window.open('./profile.php','_self'); </script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script> alert('Login Successfully.'); </script>";
                echo "<script> window.open('./checkout.php','_self'); </script>";
            }
        } else {
            echo "<script> alert('Invalid password.'); </script>";
        }
    }else{
        echo "<script> alert('Invalid username'); </script>";
    }
}

?>