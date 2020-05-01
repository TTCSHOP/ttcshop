<!-- connect database -->
<?php
include('data.php');
if (!isset($_COOKIE['userId'])) {
    header('Location:../admin/sign_in.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dashboard - TTC Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-info">
        <a class="navbar-brand" href="../index.php">TTC Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="../admin/sign_in.php">Đăng xuất</a> -->
                    <?php
                    if (isset($_COOKIE['userId'])) {
                        // nếu đăng nhập r in ra mh
                        $result_sign_in = mysqli_query($connect, "SELECT name FROM users WHERE id = '{$_COOKIE['userId']}'");
                        $currentUser = mysqli_fetch_array($result_sign_in);
                        echo ' <a class="dropdown-item" href="admin/log_out.php"><i class="fas fa-sign-in-alt"></i>Đăng xuất</a>';
                    }
                    // else{
                    //     echo '<a class="dropdown-item" href="user/sign_in.php"><i class="fas fa-user-plus"></i>Đăng nhập</a>';
                    //     echo '<a class="dropdown-item" href="user/sign_up.php"><i class="fas fa-user-plus"></i>Đăng kí</a>';
                    // }
                    ?>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Trang chủ
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="../public/advertisement.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                            Quảng cáo
                        </a>

                        <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                </div>
                            </nav>
                        </div> -->
                        <div class="sb-sidenav-menu-heading">Edit</div>

                        <a class="nav-link" href="../public/tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Sản phẩm
                        </a>
                        <a class="nav-link" href="../public/orderdetails.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Chi tiết đơn hàng
                        </a>
                        <a class="nav-link" href="../public/admin_manager.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Quản trị viên
                        </a>

                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Đăng nhập:</div>
                        <?php echo $currentUser['name'] ?>
                    </div>
            </nav>
        </div>
    