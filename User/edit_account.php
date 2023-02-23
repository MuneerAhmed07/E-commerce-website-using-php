<?php

if(isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE user_name = '$user_session_name' ";
    $result_query = mysqli_query($connection, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

    if(isset($_POST['user_update'])) {
        $update_id = $user_id;
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./User_images/$user_image");

        // Update query
        $update_data = "UPDATE user_table SET user_name = '$user_name', user_email = '$user_email', user_image = '$user_image', user_address = '$user_address', user_mobile = '$user_mobile' WHERE  user_id = $update_id";
        $update_result_query = mysqli_query($connection, $update_data);
        if($update_result_query) {
            echo "<script> alert('Data updated successfully.'); </script>";
            echo "<script> window.open('./logout.php','_self'); </script>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>

    <style>
        .edit-user-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>

</head>
<body>

    <h3 class='mb-5'>Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="mb-5">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name; ?>" name="user_username" autocomplete="off">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email; ?>" name="user_email" autocomplete="off">
        </div>
        <div class="form-outline mb-4 d-flex  w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit-user-image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address; ?>" name="user_address" autocomplete="off">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile; ?>" name="user_mobile" autocomplete="off">
        </div>
        <input type="submit" value="Update" class="btn btn-primary px-5 w-50" name="user_update">
    </form>

</body>
</html>