<?php
include('../includes/header.php');

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Danh mục</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh mục</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">Các hình ảnh quảng cáo dưới đây sẽ hiển thị trên trang web</div>
            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Danh mục</div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <!-- <th> <button type="button" class="d-flex flex-row btn btn-success btn-rounded btn-sm " data-toggle="modal" data-target="#btn-add"><i class="fas fa-plus-square mr-2 mt-1"></i>Thêm&nbsp;&nbsp;</button></th> -->
                                <!-- <th>Sửa</th> -->
                                    <th>STT</th>
                                    <th>Tên hãng</th>
                                    <th>Ngày nhập</th>
                                    
                                  
                                    <!-- <th>Hình ảnh</th>
                                    <th>abc</th> -->
                                    <!-- <th> <button type="button " class="d-flex flex-row btn btn-success btn-rounded btn-sm "><i class="fas fa-plus-circle"></i>&nbsp;Add</button></th> -->
                                    

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <!-- <th>Sửa</th> -->
                                     <th>STT</th>
                                    <th>Tên hãng</th>
                                    <th>Ngày nhập</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                // $row[10] = null;
                                $result = mysqli_query($connect, "SELECT * FROM categories");// truy vấn orderdetails
                               
                                
                                $i=1;
                                while ($row =  mysqli_fetch_array($result)) {
                                    
                                    echo
                                        '<tr>
                                       
                                        <td>' . $row['id'] . '</td>
                                       
                                        <td>' . $row['name'] . '</td>
                                        
                                        <td>
                                            ' . $row['dateModified'] . '
                                       
                                        
                                        
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