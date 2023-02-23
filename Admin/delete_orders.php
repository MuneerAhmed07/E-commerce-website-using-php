<?php

if(isset($_GET['delete_orders'])){
    $delete_id = $_GET['delete_orders'];
    
    // Delete Query
    $delete_order = "DELETE FROM user_orders WHERE order_id = $delete_id";
    $result_order = mysqli_query($connection, $delete_order); 
    
    if($result_order){
        echo "<script> alert('Order Deleted Successfully.'); </script>";
        echo "<script> window.open('./index.php?list_orders', '_self'); </script>";
    }

}

?>