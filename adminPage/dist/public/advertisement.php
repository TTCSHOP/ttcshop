<?php
include('../includes/header.php');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quảng cáo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Advertisement</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">Các hình ảnh dưới đây sẽ hiển thị trên trang web</div>
            </div>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Header ads</div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th> <button type="button" class="d-flex flex-row btn btn-success btn-rounded btn-sm " data-toggle="modal" data-target="#btn-add-ad"><i class="fas fa-plus-square mr-2 mt-1"></i>Thêm&nbsp;&nbsp;</button></th>
                                    <!-- <th>Sửa</th> -->
                                        <th>STT</th>
                                        <th>Tên quảng cáo</th>
                                        <th>Hình ảnh</th>
                                        <th>Vị trí</th>
                                        
                                        <th>Ngày thêm</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>STT</th>
                                        <th>Tên quảng cáo</th>
                                        <th>Hình ảnh</th>
                                        <th>Vị trí</th>
                                        
                                        <th>Ngày thêm</th>
                                    </tr>
                                </tfoot>
                                

                                <tbody>
                                <?php

                                // $row[10] = null;
                                $result = mysqli_query($connect, "SELECT * FROM advertisement");
                                
                                $i=1;
                                while ($row =  mysqli_fetch_array($result)) {
                                    
                                    echo
                                        '<tr>
                                            <td>
                                                <form action ="../handler/edit_ad.php" method="GET">
                                                    <button type="submit" class="btn btn-info btn-rounded btn-sm my-0 mb-2"name="edit" data-toggle="modal"data-target="#btn-edit" 
                                                    value = "'.$row['id'].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Sửa&nbsp&nbsp;&nbsp; </button>
                                                </form>
                                                <form action="../handler/delete_ad.php" method="GET">
                                                    <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"name="delete" data-toggle="modal"
                                                    value = "'.$row['id'].'" class="btn btn-primary" data-toggle="collapse"></i>&nbsp;Xóa&nbsp&nbsp;&nbsp; </button>
                                                </form>
                                            </td>
                                        <td>' . $i . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>
                                            <img src="../../../images/' . $row['image'] . '" style="width:200px">
                                        </td>
                                      
                                        <td>' . $row['position'] . '</td>
                                        <td>' . $row['dateModified'] . '</td>
                                       
                                    </tr>';
                                    $i++;
                                }
                                    
                        ?>
                                <!-- lồng vòng for của php vào để duyệt database -->
                            </tbody>     
                                        

                               
                            </tbody>
                        </table>
                       <?php include("../handler/add_ad.php");?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
include('../includes/footer.php');
?>
