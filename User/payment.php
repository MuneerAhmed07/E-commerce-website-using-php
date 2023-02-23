<?php

include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment Page</title>

    <!-- CSS bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS file Link -->
    <link rel="stylesheet" href="../style.css">

</head>
    <!-- PHP code to access user id -->
    <?php

    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM user_table WHERE user_ip = '$user_ip'";
    $result = mysqli_query($connection, $get_user);
    $run_query = mysqli_fetch_array($result);

    $user_id = $run_query['user_id'];

    ?>

    <div class="container">
        <h2 class="text-center my-5">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mb-5">
            <!-- <div class="col-md-6">
                <a href="https://www.paypal.com" ><h2 class="me-5 text-end">Paypal</h2></a>
            </div> -->
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2>Pay offline</h2></a>
            </div>
        </div>
    </div>
    
</body>
</html>