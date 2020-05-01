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
                                    <th>Tên quản trị viên</th>
                                    <th>Email</th>
                                  
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php

                                // $row[10] = null;
                                $result = mysqli_query($connect, "SELECT * FROM users WHERE authorization =0");
                                
                                $i=1;
                                while ($row =  mysqli_fetch_array($result)) {
                                   
                                    echo
                                        '<tr>
                                        <td >
                                            <form action ="../admin/view_admin.php" method="GET">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2 mt-2"style="background-color: rgb(163, 165, 43);"name="view_admin" data-toggle="modal"data-target="#btn-edit" 
                                                value = "'.$row[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xem&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                            <form action ="../admin/edit_admin.php" method="GET">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2"name="edit_admin" data-toggle="modal"data-target="#btn-edit" 
                                                value = "'.$row[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Sửa&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                            <form action="../admin/delete_admin.php" method="GET">
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"name="delete_admin" data-toggle="modal"
                                                value = "'.$row[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xóa&nbsp&nbsp;&nbsp; </button>
                                            </form>
                                          
                                           
                                        </td>
                                        <td>' . $i . '</td>
                                       
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['email'] . '</td>
                                
                                    </tr>';
                                    $i++;
                                }
                             include('../admin/add_admin.php'); 
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