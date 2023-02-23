<?php

include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// getting total items and total price of all items
$get_ip_address = getIPAddress();

$total_price = 0;
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($connection, $cart_query_price);

// Generate invoice Number
$invoice_number = mt_rand();
$status = 'pending';

$count_product = mysqli_num_rows($result_cart_price);

while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    // Fetch a product price from products table
    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
    $run_price = mysqli_query($connection, $select_product);
    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = [$row_product_price['product_price']];
        $product_values = array_sum($product_price);
        $total_price += $product_values;

    }
}


// getting quantity from cart
$get_cart = "SELECT * FROM cart_details";
$run_cart = mysqli_query($connection, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];

if($quantity == 1) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

// Insert Order
$insert_order = "INSERT INTO user_orders (user_id, due_amount, invoice_number, 	total_products, order_date, order_status) VALUES ($user_id, $subtotal, $invoice_number, $count_product, NOW(), '$status')";
$result_query = mysqli_query($connection, $insert_order);

if($result_query) {
    echo "<script> alert('Orders are submitted Successfully.'); </script>";
    echo "<script> window.open('./profile.php', '_self'); </script>";
}

// Ordern pending
$insert_pending_orders = "INSERT INTO order_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_order = mysqli_query($connection, $insert_pending_orders);

// Delete Item from the cart
$empty_cart = "DELETE FROM cart_details WHERE ip_address = '$get_ip_address'";
$result_delete = mysqli_query($connection, $empty_cart);



?>