<?php 

include("../includes/connect.php");

if(isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // select data from database
    $select_query = "SELECT * FROM categories WHERE category_title='$category_title'";
    $result_select = mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number > 0) {
        echo "<script>alert('This category is present inside the database.');</script>";
    } else {

        // Insert data into database
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result = mysqli_query($connection, $insert_query);

        if ($result) {
            echo "<script>alert('Category has been inserted successfully.');</script>";
        }
    }
}


?>

<h3 class="text-center mb-3">Insert Categories</h3>

<!-- Categories Form -->
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1" autocomplete="off">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-primary text-white border-0 rounded-3 p-2 my-3" name="insert_cat" value="Insert Categories">
    </div>
</form>