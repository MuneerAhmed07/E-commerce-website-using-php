<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_orders WHERE order_id = $order_id";
    $result = mysqli_query($connection, $select_data);

    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $due_amount = $row_fetch['due_amount'];
}

if(isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode) VALUES ($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($connection, $insert_query);
    if($result){
        echo "<script> alert('Successfully completed the payment'); </script>";
        echo "<script> window.open('./profile.php?my_orders','_self'); </script>";
    }
    $update_orders = "UPDATE user_orders SET order_status = 'Complete' WHERE order_id = $order_id";
    $result_order = mysqli_query($connection, $update_orders);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="../style.css">

</head>
<body class="bg-light payment-body">
    <div class="container my-5">
        <h4 class="text-center">Confirm Payment</h4>
        <form action="" method="post">
            <div class="from-outline my-4 text-center">
                <input type="text" class="form-control w-25 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" autocomplete="off" readonly>
            </div>
            <div class="from-outline my-4 text-center">
                <label for="amount" class="mb-2">Amount</label>
                <input type="text" class="form-control w-25 m-auto" id="amount" name="amount" value="<?php echo $due_amount ?>" autocomplete="off" readonly>
            </div>
            <div class="from-outline my-4 text-center">
                <select name="payment_mode" class="form-select w-25 m-auto">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Paypal</option>
                    <option>Jazz Cash</option>
                    <option>Cash on Delivery</option>
                </select>
            </div>
            <div class="from-outline my-4 text-center">
                <input type="submit" class="btn btn-primary px-5" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>