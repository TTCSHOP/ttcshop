<?php
include('../includes/header.php');
if(isset($_GET['view_admin'])){
       
    $id_view = $_GET['view_admin'];
   
    $result_view = mysqli_query($connect,"SELECT * FROM users WHERE id = '$id_view'");
   
    $view_arr = mysqli_fetch_array($result_view);// mảng của users
   
 }

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quản trị viên</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản trị viên</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">Các hình ảnh quảng cáo dưới đây sẽ hiển thị trên trang web</div>
            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Chi tiết quản trị viên</div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tùy chọn</th>
                                    <th>Tên quản trị viên</th>
                                    <th>Email</th>
                                    <th>Ngày đăng kí</th>
                                   
                                </tr>
                            </thead>
                         
                            <tbody>
                                <?php

                                    echo
                                        '<tr>
                                        <td >
                                           
                                        <form action ="../admin/edit_admin.php" method="GET">
                                            <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2"name="edit_admin" data-toggle="modal"data-target="#btn-edit" 
                                            value = "'.$view_arr[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Sửa&nbsp&nbsp;&nbsp; </button>
                                        </form>
                                        <form action="../admin/delete_admin.php" method="GET">
                                            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"name="delete_admin" data-toggle="modal"
                                            value = "'.$view_arr[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xóa&nbsp&nbsp;&nbsp; </button>
                                        </form>
                                        <form action ="../admin/edit_admin.php" method="GET">
                                        <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2 mt-2" style="background-color: rgb(163, 165, 43);"name="edit_pass" data-toggle="modal"data-target="#btn-edit" 
                                        value = "'.$view_arr[0].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Đổi mật khẩu&nbsp&nbsp;&nbsp; </button>
                                    </form>
                                          
                                           
                                        </td>
                                       
                                        <td>' . $view_arr['name'] . '</td>
                                        <td>' . $view_arr['email'] . '</td>
                                        <td>' . $view_arr['dateModified'] . '</td>
                                       
                                    </tr>
                                    ';
                                  
                            
                        ?>
                                <!-- lồng vòng for của php vào để duyệt database -->
                            </tbody>
                        </table>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
 
    // include('../includes/footer.php');
    ?>