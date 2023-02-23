<?php

include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

if(isset($_SESSION['admin_username'])){
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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
    <h2 class="text-center my-5">Admin Login</h2>
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
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control" autocomplete="off">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary px-3" value="Login" name="admin_login">
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>




<?php

if(isset($_POST['admin_login'])) {
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    $select_query = "SELECT * FROM admin_table WHERE admin_name = '$user_username'";
    $result = mysqli_query($connection, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count > 0) {
        $_SESSION['admin_username'] = $user_username;
        if(password_verify($user_password, $row_data['admin_password'])){
            echo "<script> alert('Login Successfully.'); </script>";
            echo "<script> window.open('./index.php', '_self'); </script>";
        } else {
            echo "<script> alert('Invalid password.'); </script>";
        }
    }else{
        echo "<script> alert('Invalid username'); </script>";
    }
}

?>