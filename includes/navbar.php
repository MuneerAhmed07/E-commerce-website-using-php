<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <img src="./products/logo.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="first-nav nav-link active text-white" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="display_all.php">Products</a>
                </li>

                <?php
                if(isset($_SESSION['username'])) {
                    echo "
                    <li class='nav-item'>
                    <a class='first-nav nav-link text-white' href='./User/profile.php'>My Account</a>
                </li>";
                }else {
                    echo "
                    <li class='nav-item'>
                    <a class='first-nav nav-link text-white' href='./User/user_registration.php'>Register</a>
                </li>";
                }
                ?>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="./cotact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="cart.php"><i
                            class="fa-solid fa-cart-shopping"></i><sup>&nbsp;<?php cart_item_number(); ?></sup></a>
                </li>
                <li class="nav-item">
                    <a class="first-nav nav-link text-white" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                </li>
            </ul>
            <form class="d-flex" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="search_data" autocomplete="off">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
    </div>
</nav>