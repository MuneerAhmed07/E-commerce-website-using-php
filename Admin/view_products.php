<h3 class="text-center">All Products</h3>

<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary text-white">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $get_products = "SELECT * FROM products";
        $result = mysqli_query($connection, $get_products);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $number++;

        ?>
        <tr class='body-row'>
        <td><?php echo $number; ?></td>
        <td><?php echo $product_title; ?></td>
        <td><?php echo "<img src='./product_images/$product_image1' alt='product_image' class='view-image'>"; ?></td>
        <td><?php echo $product_price . "/-"; ?></td>
        <td><?php
        $get_count = "SELECT * FROM order_pending WHERE product_id = $product_id";
        $result_count = mysqli_query($connection, $get_count);
        $row_count = mysqli_num_rows($result_count);
        echo $row_count;
        ?></td>
        <td><?php echo $status; ?></td>
        <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-dark'><i class='fa-solid fa-pen-to-square text-primary'></i></a></td>
        <td><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-dark'><i class='fa-solid fa-trash text-danger'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>