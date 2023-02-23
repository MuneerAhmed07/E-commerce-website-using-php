<?php

if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];
    
    // Delete Query
    $delete_user = "DELETE FROM user_table WHERE user_id = $delete_id";
    $result_user = mysqli_query($connection, $delete_user); 
    
    if($result_user){
        echo "<script> alert('User Deleted Successfully.'); </script>";
        echo "<script> window.open('./index.php?list_user', '_self'); </script>";
    }

}

?>