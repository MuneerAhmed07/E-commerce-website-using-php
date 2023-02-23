<?php

if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];
    
    // Delete Query
    $delete_payment = "DELETE FROM user_payments WHERE payment_id = $delete_id";
    $result_payment = mysqli_query($connection, $delete_payment); 
    
    if($result_payment){
        echo "<script> alert('Payment Deleted Successfully.'); </script>";
        echo "<script> window.open('./index.php?list_payment', '_self'); </script>";
    }

}

?>