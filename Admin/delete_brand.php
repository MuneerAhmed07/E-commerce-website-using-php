<?php

if(isset($_GET['delete_brands'])) {
    $delete_brand = $_GET['delete_brands'];
    
    // Delete query
    $delete_query = "DELETE FROM brands WHERE brand_id = $delete_brand";
    $result = mysqli_query($connection, $delete_query);
    if($result){
        echo "<script>alert('Brand is been Deleted Successfully.');</script>";
        echo "<script> window.open('./index.php?view_brands', '_self') ;</script>";
    }
}

?>