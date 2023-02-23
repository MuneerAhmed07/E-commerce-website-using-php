<h3 class="text-center">All Brands</h3>
<table class="table table-bordered table-striped w-50 m-auto text-center mt-5">
    <thead class="bg-primary text-white">
        <th>Sl no</th>
        <th>Brands title</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
    
    <?php
    $select_brand = "SELECT * FROM brands";
    $result_brand = mysqli_query($connection, $select_brand);
    $number = 0;
    while($row = mysqli_fetch_assoc($result_brand)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        $number++;
    ?>

        <tr>
            <td> <?php echo $number++; ?> </td>
            <td> <?php echo $brand_title; ?> </td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>' class='text-dark'><i class='fa-solid fa-pen-to-square text-primary'></i></a></td>
            <td><a href='index.php?delete_brands=<?php echo $brand_id; ?>' class='text-dark' type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fa-solid fa-trash text-danger'></i></a></td>
        </tr>

    <?php
    }
    ?>
    </tbody>
</table>

<!-- Button trigger modal -->
<div>
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="py-3 text-danger">Are you sure you want to delete this?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <a href="index.php?view_brands" class="text-decoration-none text-white">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brands=<?php echo $brand_id; ?>' class='text-decoration-none text-white'>Yes</a></button>
      </div>
    </div>
  </div>
</div>
</div>