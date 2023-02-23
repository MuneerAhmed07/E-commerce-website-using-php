<?php

$user_name = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE user_name = '$user_name'";
$result = mysqli_query($connection, $get_user);

$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

?>

<h3>All my Orders</h3>
<table class="table table-bordered mt-5 table-striped">
    <thead class="text-white bg-primary">
        <tr>
            <th>Sl no</th>
            <th>Due Amount</th>
            <th>Total products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $get_order_details = "SELECT * FROM user_orders WHERE user_id = $user_id";
        $result_orders = mysqli_query($connection, $get_order_details);
        $number = 1;
        while($row_orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_status = $row_orders['order_status'];
            if($order_status == 'pending'){
                $order_status = 'Incomplete';
            }else {
                $order_status = 'Complete';
            }
            $order_date = $row_orders['order_date'];
            echo "
            <tr>
                <td>$number</td>
                <td>$due_amount</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
        ?>

        <?php
                
            if($order_status == 'Complete'){
                echo "<td>Paid</td>";
            }else{
            echo "
            <td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
            </tr>";
            }
            $number++;
        }

        ?>
    </tbody>
</table>