<?php
include('../includes/header.php');
if(isset($_GET['view'])){
       
    $id_view = $_GET['view'];
   
    $result_view = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id_view'");
   
    $view_arr = mysqli_fetch_array($result_view);// mảng của product
    $view_details = mysqli_query($connect,"SELECT * FROM productdetails WHERE id = $id_view");
    $row_view_details = mysqli_fetch_array($view_details);// mảng của productdetails
 }
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">Các hình ảnh quảng cáo dưới đây sẽ hiển thị trên trang web</div>
            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Chi tiết mặt hàng</div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tùy chọn</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hãng sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Giới thiệu</th>
                                    <th>Màn hình</th>
                                    <th>Camera</th>
                                    <th>CPU</th>
                                    <th>Sim</th>
                                    <th>Thời lượng pin</th>
                                    <th>Bộ nhớ ngoài</th>
                                    <th>Bộ nhớ trong</th>
                                    <th>Số lượng</th>

                                </tr>
                            </thead>
                         
                            <tbody>
                                <?php

                                    echo
                                        '<tr>
                                        <td >
                                           
                                            <form action ="../handler/edit.php" method="GET">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2"name="edit" data-toggle="modal"data-target="#btn-edit" 
                                                value = "'.$view_arr[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Sửa&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                            <form action="../handler/delete.php" method="GET">
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"name="delete" data-toggle="modal"
                                                value = "'.$view_arr[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xóa&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                          
                                           
                                        </td>
                                       
                                        <td>' . $view_arr['name'] . '</td>
                                        <td>' . $view_arr['category'] . '</td>
                                        <td>' . $view_arr['price'] . '</td>
                                        <td>' . $view_arr['brief description'] . '</td>

                                        <td>
                                            ' . $row_view_details['screen'] . '
                                        <td>
                                            ' . $row_view_details['camera'] . '
                                        </td>
                                        <td>
                                            ' . $row_view_details['cpu'] . '
                                        </td>
                                        <td>
                                            ' . $row_view_details['sim'] . '
                                        </td>
                                        <td>
                                            ' . $row_view_details['pin'] . '
                                        </td>
                                        <td>
                                            ' . $row_view_details['ram'] . '
                                        </td>
                                        <td>
                                            ' . $row_view_details['rom'] . '
                                        </td>
                                        <td>' . $view_arr['quantityInStock'] . '</td>
                                   
                                    </tr>
                                    ';
                                  
                            
                        ?>
                                <!-- lồng vòng for của php vào để duyệt database -->
                            </tbody>
                        </table>
                        <div class="container"><h5>Hình ảnh sản phẩm</h5>
                            <div class="row">
                                <div class="col-3">
                                    <small>Ảnh đại diện</small>
                                    <img src="../../../images/<?php echo $view_arr['image'] ?>" style="width:200px">
                                </div> 
                                <div class="col-3">
                                    <small>Ảnh 1</small>
                                    <img src="../../../images/<?php echo $row_view_details['image1'] ?>" style="width:200px">
                                </div>
                                <div class="col-3">
                                    <small>Ảnh 2</small>
                                    <img src="../../../images/<?php echo $row_view_details['image2'] ?>" style="width:200px">
                                </div>
                                <div class="col-3">
                                    <small>Ảnh 3</small>
                                    <img src="../../../images/<?php echo $row_view_details['image3'] ?>" style="width:200px">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
 
    // include('../includes/footer.php');
    ?>