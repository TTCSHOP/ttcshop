<?php
include('../includes/header.php');

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Đơn hàng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Đơn hàng</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">Các hình ảnh quảng cáo dưới đây sẽ hiển thị trên trang web</div>
            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Chi tiết đơn hàng</div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <!-- <th> <button type="button" class="d-flex flex-row btn btn-success btn-rounded btn-sm " data-toggle="modal" data-target="#btn-add"><i class="fas fa-plus-square mr-2 mt-1"></i>Thêm&nbsp;&nbsp;</button></th> -->
                                <!-- <th>Sửa</th> -->
                                    <th>OrderCode</th>
                                    <th>Tên người đặt hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Tên mặt hàng</th>
                                    <th>Số lượng</th>
                                    <th>Số tiền</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                  
                                    <!-- <th>Hình ảnh</th>
                                    <th>abc</th> -->
                                    <!-- <th> <button type="button " class="d-flex flex-row btn btn-success btn-rounded btn-sm "><i class="fas fa-plus-circle"></i>&nbsp;Add</button></th> -->
                                    

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <!-- <th>Sửa</th> -->
                                     <th>OrderCode</th>
                                    <th>Tên người đặt hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Tên mặt hàng</th>
                                    <th>Số lượng</th>
                                    <th>Số tiền</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                // $row[10] = null;
                                $result = mysqli_query($connect, "SELECT * FROM orderdetails");// truy vấn orderdetails
                               
                                
                                $i=1;
                                while ($row =  mysqli_fetch_array($result)) {
                                    $orderID = $row['orderID'];
                                    $result_order = mysqli_query($connect, "SELECT * FROM orders WHERE id = $orderID");// truy vẫn orders
                                    $row_order = mysqli_fetch_array($result_order);
                                    $userID = $row_order['user_id'];
                                    $result_user = mysqli_query($connect, "SELECT * FROM users WHERE id = $userID");// truy vấn users
                                    $row_user = mysqli_fetch_array($result_user);
                                    // select tất cả mặt hàng mà userid đặt
                                    $product_id = $row['product_id'];
                                    $result_products =  mysqli_query($connect, "SELECT * FROM products WHERE id = $product_id");
                                    $row_products = mysqli_fetch_array($result_products);
                                    echo
                                        '<tr>
                                       
                                        <td>' . $row_order['id'] . '</td>
                                       
                                        <td>' . $row_user['name'] . '</td>
                                        <td>' . $row_order['phoneNumber'] . '</td>
                                        <td>' . $row_order['address'] . '</td>
                                        <td>'.$row_products['name'] .'</td>
                                        <td>'.$row['amount'] .'</td>
                                        <td>'.$row['totalMoney']. '</td>
                                        <td>
                                            ' . $row_order['dateModified'] . '
                                        <td>
                                            ' . $row['status'] . '
                                        </td>
                                        
                                        
                                    </tr>';
                                    // if($row_pre =  mysqli_fetch_array($result)){
                                    //     $row['orderID'] != $row_pre['orderID'];
                                    //     $i++;
                                    // }
                                }
                            //  include('../handler/add_product.php'); 
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