<div class='h-100 d-flex flex-column align-item-center justify-content-center'>
    <h3>Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="btn btn-dark form-control w-25" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="btn btn-primary form-control w-25" name="dont_delete" value=" Don't Delete Account">
        </div>
    </form>
</div>


<?php

$user_name_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "DELETE FROM user_table WHERE user_name = '$user_name_session'";
    $result = mysqli_query($connection, $delete_query);
    if($result){
        session_destroy();
        echo "<script> alert('Account Deleted Successfully.'); </script>";
        echo "<script> window.open('../index.php', '_self'); </script>";
    }
}

if(isset($_POST['dont_delete'])) {
    echo "<script> window.open('./profile.php', '_self'); </script>";
}

?>

