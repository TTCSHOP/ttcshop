<?php
include('../includes/header.php');

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
                                <th> <button type="button" class="d-flex flex-row btn btn-success btn-rounded btn-sm " data-toggle="modal" data-target="#btn-add"><i class="fas fa-plus-square mr-2 mt-1"></i>Thêm&nbsp;&nbsp;</button></th>
                                <!-- <th>Sửa</th> -->
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hãng sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Giới thiệu</th>
                                    <th>Màn hình</th>
                                    <th>Camera</th>
                                    <th>CPU</th>
                                    <th>Sim</th>
                                    <th>Thời lượng pin</th>
                                    <th>RAM</th>
                                    <th>ROM</th>
                                    <th>Số lượng</th>
                                    <!-- <th>Hình ảnh</th>
                                    <th>abc</th> -->
                                    <!-- <th> <button type="button " class="d-flex flex-row btn btn-success btn-rounded btn-sm "><i class="fas fa-plus-circle"></i>&nbsp;Add</button></th> -->
                                    

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <th>Sửa</th>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hãng sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Giới thiệu</th>
                                    <th>Màn hình</th>
                                    <th>Camera</th>
                                    <th>CPU</th>
                                    <th>Sim</th>
                                    <th>Thời lượng pin</th>
                                    <th>RAM</th>
                                    <th>ROM</th>
                                    <th>Số lượng</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                // $row[10] = null;
                                // $result = mysqli_query($connect, "SELECT * FROM products WHERE quantityInStock >0");
                                // $result_details = mysqli_query($connect, "SELECT * FROM productdetails WHERE isdeleted is NULL");
                                $result = mysqli_query($connect, "
                                SELECT p.*, pd.*
                                FROM products p 
                                JOIN productdetails pd 
                                ON p.id = pd.id
                                WHERE p.quantityInStock >=0 AND pd.isdeleted IS NULL
                                ");
                                $i=1;
                                while ($row =  mysqli_fetch_array($result)) {
                                    // $row_details = mysqli_fetch_array($result_details);
                                    echo
                                        '<tr>
                                        <td >
                                            <form action ="../handler/view.php" method="GET">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2 mt-2"style="background-color: rgb(163, 165, 43);"name="view" data-toggle="modal"data-target="#btn-edit" 
                                                value = "'.$row['id'].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xem&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                            <form action ="../handler/edit.php" method="GET">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2"name="edit" data-toggle="modal"data-target="#btn-edit" 
                                                value = "'.$row['id'].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Sửa&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                            <form action="../handler/delete.php" method="GET">
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"name="delete" data-toggle="modal"
                                                value = "'.$row['id'].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xóa&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                          
                                           
                                        </td>
                                        <td>' . $i . '</td>
                                        <td>
                                            <img src="../../../images/' . $row['image'] . '"style="width:200px">
                                        </td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['category'] . '</td>
                                        <td>' . $row['price'] . '</td>
                                        <td>' . $row['brief description'] . '</td>

                                        <td>
                                            ' . $row['screen'] . '
                                        <td>
                                            ' . $row['camera'] . '
                                        </td>
                                        <td>
                                            ' . $row['cpu'] . '
                                        </td>
                                        <td>
                                            ' . $row['sim'] . '
                                        </td>
                                        <td>
                                            ' . $row['pin'] . '
                                        </td>
                                        <td>
                                            ' . $row['ram'] . '
                                        </td>
                                        <td>
                                            ' . $row['rom'] . '
                                        </td>
                                        <td>' . $row['quantityInStock'] . '</td>
                                        
                                    </tr>';
                                    $i++;
                                }
                             include('../handler/add_product.php'); 
                            //  include('../handler/delete.php');    
                            //   include('../handler/edit.php');                
                        ?>
                                <!-- lồng vòng for của php vào để duyệt database -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
 
    include('../includes/footer.php');
    ?>
