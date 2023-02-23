    <?php
    $get_orders = "SELECT * FROM user_orders";
    $result = mysqli_query($connection, $get_orders);
    $row_count = mysqli_num_rows($result);
    
    if($row_count == 0) {
        echo "<div class='text-center pb-5'>
        <img src='../products/records.png' alt='not-found' class='w-25'>
        <h2 class='text-danger text-center mt-2'>No Orders Yet.</h2>
        </div>";
    } else {


        echo "
        <h3 class='text-center'>All Orders</h3>
        <table class='table table-bordered mt-5 table-striped text-center'>
        <thead class='bg-primary text-white'>
        <tr>
        <th>Sl No</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>";

        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $due_amount = $row_data['due_amount'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;

            echo "
            <tr>
            <td>$number</td>
            <td>$due_amount</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_orders=$order_id'><i class='fa-solid fa-trash text-danger'></i></a></td>
            </tr>";
        }
    }

    ?>

    </tbody>
</table>