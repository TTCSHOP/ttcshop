<?php
include('./includes/data.php');
// $imageSrc = mysqli_query($connect, "SELECT 'Image' FROM products WHERE ID = 1");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TTCShop</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- <script src="jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/style.css">



</head>


<body>

    <!-- Thanh nav -->
    <div class="header ">

        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg double-nav navbar-dark bg-info">
            <div class="float-left">
                <a href="index.php"> <img class="ml-5% mr-5% " src="images\logoWeb.png"></a>
                <a class="navbar-brand t" href="index.php">
                    <strong>TTC Shop</strong> </a>
            </div>



            <ul class="nav navbar-nav nav-flex-icons ">
                <li class="nav-item">

                    <form action="./query/search.php" method="POST">
                        <div class="input-group ml-5 " style="width: 40vw; ">
                            <input type="text" class="form-control" style="width: 30vw" name="searchtext" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" />
                            <div class="input-group-append">
                                <button type="submit" name="search" class="btn btn-danger" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="nav-item  ">
                    <div class="btn btn-info ml-5 col-md-5">
                        <!-- <a class="text-dark " href="phone/cart.php" style="text-decoration: none;"><i class="fa fa-cart-plus"></i> Giỏ hàng</a> -->
                        <a class="text-dark" href="phone/cart.php"><i class="fa fa-cart-plus"></i> <span class="clearfix d-none d-sm-inline-block">Giỏ hàng</span></a>
                    </div>
                </li>

                <li class="nav-item ">
                    <div class="btn btn-info ">
                        <a class="text-dark " href="./support/support.php"><i class="fas fa-question-circle text-dark"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>

                        <!-- <a class="text-dark " href="./support/support.php" style="text-decoration: none;"><i class="fas fa-question-circle text-dark"></i> Support</a> -->
                    </div>

                </li>

                <li>
                    <div class="dropdown ">
                        <button class="btn btn-info dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user-circle"></i>Tài khoản
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            if (isset($_COOKIE['userId'])) {

                                $result = mysqli_query($connect, "SELECT name FROM users WHERE id = '{$_COOKIE['userId']}'");
                                $currentUser = mysqli_fetch_array($result);
                                echo ' <a class="dropdown-item" href="user/log_out.php"><i class="fas fa-sign-in-alt"></i>Đăng xuất</a>';
                            } else {
                                echo '<a class="dropdown-item" href="user/sign_in.php"><i class="fas fa-user-plus"></i>Đăng nhập</a>';
                                echo '<a class="dropdown-item" href="user/sign_up.php"><i class="fas fa-user-plus"></i>Đăng kí</a>';
                            }
                            ?>



                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg double-nav navbar-dark bg-info">

            <div class="float-left">
                <a href="index.php"> <img class="ml-5% mr-5% " src="images\logoWeb.png"></a>
                <a class="navbar-brand t" href="index.php">
                    <strong>TTC Shop</strong> </a>
            </div>
          

            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Account</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </nav> -->
    </div>