<?php

if (isset($_GET['edit_category'])) {
    $edit_category = $_GET['edit_category'];

    $get_categories = "SELECT * FROM categories WHERE category_id = $edit_category";
    $result = mysqli_query($connection, $get_categories);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
}

//Update Category 
if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['category_title'];

    $update_query = "UPDATE categories SET category_title = '$cat_title' WHERE category_id = $edit_category";
    $result_cat = mysqli_query($connection, $update_query);
    if($result_cat){
        echo "<script>alert('Category is been Updated Successfully.');</script>";
        echo "<script> window.open('./index.php?view_categories', '_self') ;</script>";
    }
}

?>


<div class="container mt-5 mb-5">
    <h3 class="text-center">Edit Category</h3>
    <form action="" method="post" class="pb-5">
        <div class="d-flex w-50 m-auto">
            <div class="form-outline w-75">
                <label for="category-title">Category Title</label>
                <input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $category_title;?>" required="required" autocomplete="off">
            </div>
            <div class="form-outline m-auto btn-margin">
                <input type="submit" value="Update Category" name="edit_cat" class="btn btn-primary ms-3"/>
            </div>
        </div>
    </form>

</div>