<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM products WHERE product_id = $edit_id";
    $result = mysqli_query($connection, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_title = $row['category_title'];
    $brand_title = $row['brand_title'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    $product_stock = $row['product_stock'];


    // fetching category name
    $select_category = "SELECT * FROM categories WHERE category_title = '$category_title'";
    $result_category = mysqli_query($connection, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title1 = $row_category['category_title'];

    //fetching brands name
    $select_brand = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_brand = mysqli_query($connection, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title1 = $row_brand['brand_title'];
 
}

// Update Editing Products
if(isset($_POST['edit_product'])){
    $edit_product_title = $_POST['product_title'];
    $edit_product_description = $_POST['product_description'];
    $edit_product_keyword = $_POST['product_keyword'];
    $edit_product_category = $_POST['product_category'];
    $edit_product_brands = $_POST['product_brands'];
    $edit_product_price = $_POST['product_price'];
    $edit_product_stock = $_POST['product_stock'];

    $edit_product_image1 = $_FILES['product_image1']['name'];
    $edit_product_image2 = $_FILES['product_image2']['name'];
    $edit_product_image3 = $_FILES['product_image3']['name'];

    $edit_product_tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $edit_product_tmp_image2 = $_FILES['product_image2']['tmp_name'];
    $edit_product_tmp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking For fields empty or not
    if($edit_product_title=='' or $edit_product_description=='' or $edit_product_keyword=='' or $edit_product_category=='' or $edit_product_brands=='' or $edit_product_image1=='' or $edit_product_image2=='' or $edit_product_image3=='' or $edit_product_price=='' or $edit_product_stock=='') {
        echo "<script>Alert('Please Fill all the Fields.');</script>";
    } else {
        move_uploaded_file($edit_product_tmp_image1, "./product_images/$edit_product_image1");
        move_uploaded_file($edit_product_tmp_image2, "./product_images/$edit_product_image2");
        move_uploaded_file($edit_product_tmp_image3, "./product_images/$edit_product_image3");

        // Query to update products
        $update_product = "UPDATE products SET product_title = '$edit_product_title', product_description = '$edit_product_description', product_keywords = '$edit_product_keyword', category_title = '$edit_product_category', brand_title = '$edit_product_brands', product_image1 = '$edit_product_image1', product_image2 = '$edit_product_image2', product_image3 = '$edit_product_image3', product_price = '$edit_product_price', product_stock = '$edit_product_stock', date=NOW() WHERE product_id = $edit_id";
        $result_update = mysqli_query($connection, $update_product);

        if($result_update) {
            echo "<script> alert('Product_updated Successfully.'); </script>";
            echo "<script> window.open('./index.php?view_products', '_self'); </script>";
        }
    }
}
?>



<div class="container my-5">
    <h1 class="text-center mb-5">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data" class="mb-5">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title; ?>" name="product_title" class="form-control" required='required' autocomplete="off">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo $product_description; ?>" name="product_description" class="form-control" required='required' autocomplete="off">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product Keywords</label>
            <input type="text" id="product_keyword" value="<?php echo $product_keywords; ?>" name="product_keyword" class="form-control" required='required' autocomplete="off">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select" id="product_category">
                <option value="<?php echo $category_title1; ?>"><?php echo $category_title1; ?></option>

                <?php 
                $select_category_all = "SELECT * FROM categories";
                $result_category_all = mysqli_query($connection, $select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    $category_title2 = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_title2'>$category_title2</option>";
                }
                ?>

            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brand</label>
            <select name="product_brands" class="form-select" id="product_brands">
                <option value="<?php echo $brand_title1; ?>"><?php echo $brand_title1; ?></option>

                <?php 
                $select_brand_all = "SELECT * FROM brands";
                $result_brand_all = mysqli_query($connection, $select_brand_all);
                while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                    $brand_title2 = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_title2'>$brand_title2</option>";
                }
                ?>
                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required='required'>
                <img src="./product_images/<?php echo $product_image1; ?>" alt="product_image" class="view-image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required='required'>
                <img src="./product_images/<?php echo $product_image2; ?>" alt="product_image" class="view-image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required='required'>
                <img src="./product_images/<?php echo $product_image3; ?>" alt="product_image" class="view-image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price; ?>" name="product_price" class="form-control" required='required' autocomplete="off">
        </div>
        <div class="form-oultline mb-4 w-50 m-auto">
            <label for="product_stock" class="form-label">Product Stock</label>
            <input type="text" name="product_stock" id="product_stock" class="form-control" value="<?php echo $product_stock; ?>"  autocomplete="off" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" value="Update Product" name="edit_product" class="btn btn-primary px-3 mb-5 mt-4">
        </div>
    </form>
</div>