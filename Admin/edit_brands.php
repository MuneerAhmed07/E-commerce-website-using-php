<?php

if (isset($_GET['edit_brands'])) {
    $edit_brand = $_GET['edit_brands'];

    $get_brands = "SELECT * FROM brands WHERE brand_id = $edit_brand";
    $result = mysqli_query($connection, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}

//Update Category 
if(isset($_POST['edit_brand'])){
    $brand_title_1 = $_POST['brand_title'];

    $update_query = "UPDATE brands SET brand_title = '$brand_title_1' WHERE brand_id = $edit_brand";
    $result_brand = mysqli_query($connection, $update_query);
    if($result_brand){
        echo "<script>alert('Brands is been Updated Successfully.');</script>";
        echo "<script> window.open('./index.php?view_brands', '_self') ;</script>";
    }
}

?>


<div class="container mt-5 mb-5">
    <h3 class="text-center">Edit Brand</h3>
    <form action="" method="post" class="pb-5">
        <div class="d-flex w-50 m-auto">
            <div class="form-outline w-75">
                <label for="category-title">Brand Title</label>
                <input type="text" name="brand_title" id="category_title" class="form-control" value="<?php echo $brand_title;?>" required="required" autocomplete="off">
            </div>
            <div class="form-outline m-auto btn-margin">
                <input type="submit" value="Update Brand" name="edit_brand" class="btn btn-primary ms-3"/>
            </div>
        </div>
    </form>

</div>