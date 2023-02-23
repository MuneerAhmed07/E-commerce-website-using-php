<?php
    $get_user = "SELECT * FROM user_table";
    $result = mysqli_query($connection, $get_user);
    $row_count = mysqli_num_rows($result);
    
    if($row_count == 0) {
        echo "<div class='text-center pb-5'>
        <img src='../products/records.png' alt='not-found' class='w-25'>
        <h2 class='text-danger text-center mt-2'>No Users received Yet.</h2>
        </div>";
    } else {


        echo "
        <h3 class='text-center'>All Users</h3>
        <table class='table table-bordered mt-5 text-center'>
        <thead class='bg-primary text-white'>
        <tr>
        <th>Sl No</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>";

        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id = $row_data['user_id'];
            $user_name = $row_data['user_name'];
            $user_email = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;

            echo "
            <tr class='body-row'>
            <td>$number</td>
            <td>$user_name </td>
            <td>$user_email</td>
            <td><img src='../User/User_images/$user_image' alt='$user_name' class='list-user-image' /></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_user=$user_id'><i class='fa-solid fa-trash text-danger'></i></a></td>
            </tr>";
        }
    }

    ?>

    </tbody>
</table>