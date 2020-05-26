<!-- admin page -->
<?php
include('./includes/data.php');
include('./manager/manager.php');
if (!isset($_COOKIE['userId'])) {
    header('Location:./admin/sign_in.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Trang chủ - TTC Admin</title>
    <link href="./css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-info">
        <a class="navbar-brand" href="index.php">TTC Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
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
                    <!-- <a class="dropdown-item" href="./admin/sign_in.php">Đăng xuất</a> -->
                    <?php
                    if (isset($_COOKIE['userId'])) {
                        // nếu đăng nhập r in ra mh
                        $result_sign = mysqli_query($connect, "SELECT name FROM users WHERE id = '{$_COOKIE['userId']}'");
                        $current = mysqli_fetch_array($result_sign);
                        echo ' <a class="dropdown-item" href="admin/log_out.php"><i class="fas fa-sign-in-alt"></i>Đăng xuất</a>';
                    }

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
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Trang chủ
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="./public/advertisement.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                            Quảng cáo
                        </a>

                        <div class="sb-sidenav-menu-heading">Edit</div>

                        <a class="nav-link" href="./public/tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Sản phẩm
                        </a>
                        <a class="nav-link" href="./public/orderdetails.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Chi tiết đơn hàng
                        </a>
                        <a class="nav-link" href="./public/admin_manager.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Quản trị viên
                        </a>

                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Đăng nhập:</div>
                        <?php echo $current['name'] ?>
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Trang chủ</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Trang chủ</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><strong>Tổng số mặt hàng</strong></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <!-- code php truy xuất số lượng mặt hàng -->
                                    <?php echo $total_product ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body"><strong>Tổng thu</strong> </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <!-- code php truy xuất số tiền bán hàng -->
                                    <?php echo floor($total_Money / 1000000)  . '.' .   $total_Money % 1000000 / 1000 . '.' . '000  VNĐ'  ; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><strong>Tổng chi</strong></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <!-- code php truy xuất số tiền vốn nhập hàng -->
                                    <?php echo floor($total_Money*0.7 / 1000000)  . '.' .   $total_Money*0.7 % 1000000 / 1000 . '.' . '000  VNĐ'  ; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body"><strong>Tăng trưởng hàng tháng %</strong> </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <!-- code php truy xuất lãi tháng này so với lãi tháng trc -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Doanh thu ngày gần đây</div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Doanh thu tháng</div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>



                    
                </div>
        </div> -->
    </div>
    </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"></div>
                <div>
                    <a href="#">Privacy Policy</a> &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="./assets/demo/datatables-demo.js"></script>
</body>

</html>