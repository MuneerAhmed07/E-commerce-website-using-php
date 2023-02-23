<?php
    $get_payment = "SELECT * FROM user_payments";
    $result = mysqli_query($connection, $get_payment);
    $row_count = mysqli_num_rows($result);
    
    if($row_count == 0) {
        echo "<div class='text-center pb-5'>
        <img src='../products/records.png' alt='not-found' class='w-25'>
        <h2 class='text-danger text-center mt-2'>No Payments received Yet.</h2>
        </div>";
    } else {


        echo "
        <h3 class='text-center'>All Payments</h3>
        <table class='table table-bordered mt-5 table-striped text-center'>
        <thead class='bg-primary text-white'>
        <tr>
        <th>Sl No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>";

        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id = $row_data['order_id'];
            $payment_id = $row_data['payment_id'];
            $invoice_number = $row_data['invoice_number'];
            $amount = $row_data['amount'];
            $payment_mode = $row_data['payment_mode'];
            $order_date = $row_data['date'];
            $number++;

            echo "
            <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$order_date</td>
            <td><a href='index.php?delete_payment=$payment_id'><i class='fa-solid fa-trash text-danger'></i></a></td>
            </tr>";
        }
    }

    ?>

    </tbody>
</table>