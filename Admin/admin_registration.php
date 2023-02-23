<?php

include('../includes/connect.php');
include('../functions/common_function.php');

@session_start();

if(isset($_SESSION['admin_username'])){
    header("location:admin_login.php");
}else {
    header("location:admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

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

<div class="container-fluid m-3">
    <h2 class="text-center my-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../products/admin.png" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="useremail" class="form-label">Email</label>
                    <input type="email" id="useremail" name="useremail" placeholder="Enter your email" required="required" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="confirm password" required="required" class="form-control" autocomplete="off">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary px-3" value="Register" name="admin_registration">
                </div>
                <p class="small mt-3">Do you Already have an account? <a href="admin_login.php" class="link-danger fw-bold">Login</a> </p>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>


<?php

if (isset($_POST['admin_registration'])) {
    $username = $_POST['username'];
    $user_email = $_POST['useremail'];
    $user_password = $_POST['password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['confirm-password'];

    //select Query
    $select_query = "SELECT * FROM admin_table WHERE admin_name = '$username' or admin_email='$user_email'";
    $result = mysqli_query($connection, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script> alert('username or email already exist.'); </script>";
    } elseif (strlen($user_password) < 8) {
        echo "<script> alert('Password must be 8 digits.'); </script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script> alert('Password do not matched.'); </script>";
    } else {
        // insert Query
        $insert_query = "INSERT INTO admin_table (admin_name,admin_email,admin_password) VALUES ('$username', '$user_email','$hash_password')";
        $sql_execute = mysqli_query($connection, $insert_query);
        if ($sql_execute) {
            echo "<script> alert('Register successfully.'); </script>";
        } else {
            die("not inserted");
        }
    }
}

?>