<?php

// getting products
function getproducts(){
    global $connection;

    // condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){

    $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
    $result_query = mysqli_query($connection, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $product_stock = $row['product_stock'];
        $category_title = $row['category_title'];
        $brand_title = $row['brand_title'];
        echo "
            <div class='col-md-3 mb-2 pe-0 ps-2'>
            <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'><strong>Price: $product_price/-</strong></p>
                    <span class='card-text stock'><strong>$product_stock</strong></span>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
    }
}
}
}

// getting all products
function get_all_products() {
    global $connection;

    // condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    

    $select_query = "SELECT * FROM products ORDER BY RAND()";
    $result_query = mysqli_query($connection, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $product_stock = $row['product_stock'];
        $category_title = $row['category_title'];
        $brand_title = $row['brand_title'];
        echo "
            <div class='col-md-3 mb-2 pe-0 ps-2'>
            <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'><strong>Price: $product_price/-</strong></p>
                    <span class='card-text stock'><strong>$product_stock</strong></span>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
    }
}
}
}

// getting unique categories
function get_unique_categories(){
    global $connection;

    // condition to check isset or not
    if(isset($_GET['category'])){
        $category_title = $_GET['category'];

    $select_query = "SELECT * FROM products WHERE category_title='$category_title'";
    $result_query = mysqli_query($connection, $select_query);

    $num_of_rows = mysqli_num_rows($result_query);

    if($num_of_rows == 0){
            echo "<div class='text-center'>
            <img src='./products/records.png' alt='records' width='300px'>
            <h2 class='text-danger mt-3'>No stock for this categories.</h2>
            </div>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $product_stock = $row['product_stock'];
        $category_title = $row['category_title'];
        $brand_title = $row['brand_title'];
        echo "
            <div class='col-md-3 mb-2 pe-0 ps-2'>
            <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'><strong>Price: $product_price/-</strong></p>
                    <span class='card-text stock'><strong>$product_stock</strong></span>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
    }
}
}


// Getting unique Brands
function get_unique_brands(){
    global $connection;

    // condition to check isset or not
    if(isset($_GET['brand'])){
        $brand_title = $_GET['brand'];

    $select_query = "SELECT * FROM products WHERE brand_title='$brand_title'";
    $result_query = mysqli_query($connection, $select_query);

    $num_of_rows = mysqli_num_rows($result_query);

    if($num_of_rows == 0){
            echo "<div class='text-center'>
            <img src='./products/records.png' alt='records' width='300px'>
            <h2 class='text-danger mt-3'>This Brand is not available for service.</h2>
            </div>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $product_stock = $row['product_stock'];
        $category_title = $row['category_title'];
        $brand_title = $row['brand_title'];
        echo "
            <div class='col-md-3 mb-2 pe-0 ps-2'>
            <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'><strong>Price: $product_price/-</strong></p>
                    <span class='card-text stock'><strong>$product_stock</strong></span>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
    }
}
}


// displaying brands in sidenav
function getbrands(){
    global $connection;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($connection, $select_brands);

    while($brand_row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $brand_row_data['brand_title'];
        // $brand_id = $brand_row_data['brand_id'];
    
        echo "<li class='nav-item border-top border-2 border-white'>
        <a class='nav-link text-dark side-bar' href='index.php?brand=$brand_title'>$brand_title</a>
        </li>";
    }
}

// displaying Categories in sidenav
function getcategories() {
    global $connection;
    $select_category = "SELECT * FROM categories";
    $result_category = mysqli_query($connection, $select_category);

    while($cat_row_data = mysqli_fetch_assoc($result_category)){
        $category_title = $cat_row_data['category_title'];
        // $category_id = $cat_row_data['category_id'];

        echo "<li class='nav-item border-top border-2 border-white'>
        <a class='nav-link text-dark side-bar' href='index.php?category=$category_title'>$category_title</a>
        </li>";
    }
}

// searching product function

function search_product()
{
    global $connection;

    if (isset($_GET['search_data_product'])) {
        $user_search_value = $_GET['search_data'];

        $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$user_search_value%'";
        $result_query = mysqli_query($connection, $search_query);

        $num_of_rows = mysqli_num_rows($result_query);

        if($num_of_rows == 0){
                echo "<div class='text-center'>
                <img src='./products/records.png' alt='records' width='300px'>
                <h2 class='text-danger mt-3'>No results match. No products found on this category.</h2>
                </div>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_stock = $row['product_stock'];
            $category_title = $row['category_title'];
            $brand_title = $row['brand_title'];
            echo "
            <div class='col-md-3 mb-2 pe-0 ps-2'>
            <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'><strong>Price: $product_price/-</strong></p>
                    <span class='card-text stock'><strong>$product_stock</strong></span>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }
    }
}


// view details functions 

function view_details()
{
    global $connection;

    // condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product_id'];

                $select_query = "SELECT * FROM products WHERE product_id=$product_id";
                $result_query = mysqli_query($connection, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $product_stock = $row['product_stock'];
                    $category_title = $row['category_title'];
                    $brand_title = $row['brand_title'];
                    echo "
                    <h4 class='text-center text-primary mb-5'>Related Products</h4>
            <div class='col-md-3 mb-2 pe-0 ps-2'>
            <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'><strong>Price: $product_price/-</strong></p>
                    <span class='card-text stock'><strong>$product_stock</strong></span>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='index.php' class='btn btn-secondary'>back to home</a>
                </div>
            </div>
        </div>
        
        <div class='col-md-9'>
                <!--   related card -->
            <div class='row'>
                <div class='col-md-12'>
                </div>
                <div class='col-md-4'>
                    <div class='card'>
                        <img src='./Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'><strong>Price: $product_price/-</strong></p>
                            <span class='card-text stock'><strong>$product_stock</strong></span>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='card'>
                        <img src='./Admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'><strong>Price: $product_price/-</strong></p>
                            <span class='card-text stock'><strong>$product_stock</strong></span>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
                }
            }
        }
    }
}


// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

// Insert item into cart_detial database
// cart function
function cart() {
    if(isset($_GET['add_to_cart'])) {
        global $connection;

        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address' AND product_id = $get_product_id";
        $result_query = mysqli_query($connection, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart.');</script>";
            echo "<script> window.open('index.php','_self'); </script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 1)";
            $result_query = mysqli_query($connection, $insert_query);
            echo "<script>alert('Item is added to cart.');</script>";
            echo "<script> window.open('index.php','_self'); </script>";
        }
    }
}

// Function to get cart item number
function cart_item_number() {
    if(isset($_GET['add_to_cart'])) {
        global $connection;

        $get_ip_address = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
        $result_query = mysqli_query($connection, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }else {
            global $connection;

            $get_ip_address = getIPAddress();
            $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
            $result_query = mysqli_query($connection, $select_query);
            $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// Total Price Function
function total_cart_price() {
    global $connection;

    $get_ip_address = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_address'";
    $result = mysqli_query($connection, $cart_query);

    while($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_product_price = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result_product_price = mysqli_query($connection, $select_product_price);

        while($row_product_price = mysqli_fetch_array($result_product_price)) {
            $product_price = [$row_product_price['product_price']];
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

// get user Order details
function get_user_order_details() {
    global $connection;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE user_name = '$username'";
    $result_query = mysqli_query($connection, $get_details);

    while($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])) {
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM user_orders WHERE user_id = $user_id AND order_status = 'pending'";
                    $result_order_query = mysqli_query($connection, $get_orders);
                    $row_count = mysqli_num_rows($result_order_query);
                    if($row_count > 0) {
                        echo "<div class='h-100 d-flex flex-column align-item-center justify-content-center'>
                        <h3 class='text-center'>You have <span class='text-danger'> $row_count </span> pending orders.</h3>
                        <div class='w-10'><p class='text-center my-4 btn btn-primary'><a href='profile.php?my_orders' class='text-white text-decoration-none'>Order Details</a></p></div></div>";
                    } else {
                        echo "<div class='h-100 d-flex flex-column align-item-center justify-content-center'>
                        <h3 class='text-center'>You have zero pending orders.</h3>
                        <div class='w-10'><p class='text-center my-4 btn btn-primary'><a href='../index.php' class='text-white text-decoration-none'>Explore products</a></p></div></div>";
                    }
                }
            }
        }
    }
}

?>