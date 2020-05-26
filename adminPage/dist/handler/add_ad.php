<!-- xli quảng cáo -->
<?php
include('../includes/data.php');
        if(isset($_POST['submit'])){
            $name_ad = '';
            $name_ad = $_POST['name_ad'];
            $pos = $_POST['pos_ad'];
          
            $file1 = $_FILES['file1'];
            $fileNameDb1 = $_FILES['file1']['name'];
            $fileName1 = '../../../images/'.$_FILES['file1']['name'];
           
            if($name_ad==''){
                echo '<script language="javascript">';
                echo 'alert("Chú ý: Không được để trống!")';
                echo '</script>';
            }
            else{
                if( move_uploaded_file($file1['tmp_name'],$fileName1)){
                    $result = mysqli_query($connect,"INSERT INTO `advertisement`(`name`, `image`, `position`,`dateModified`)
                     VALUES ('$name_ad','$fileNameDb1','$pos',NOW())");// insert vao products
                 
                    
                    if($result){
                        echo '<script language="javascript">';
                        echo 'alert("Thành công")';
                        echo '</script>';
                     }
                     else{
                        echo '<script language="javascript">';
                        echo 'alert("Không thành công")';
                        echo '</script>';
                     }
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Không thành công!")';
                    echo '</script>';
                }
            }
         
    }
    
    
    ?>

    <!-- Modal -->
    <div class="modal fade" id="btn-add-ad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLongTitle">Quảng cáo mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="advertisement.php" method="POST" enctype="multipart/form-data">
                       
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Tên quảng cáo</label>
                            <input type="text" class="form-control" id="smartphoneName" name = "name_ad">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">Vị trí</label>
                            <!-- <input type="text" class="form-control" id="category" name = "phonecategory"> -->
                                <select id="cars" name = "pos_ad">
                                <!-- lấy ra các hãng sp(category) -->
                                <?php 
                                      for($i=1;$i<=5;$i++){
                                        
                                          echo'
                                            <option value="'.$i.'">'.$i.'</option>
                                          ';
                                      }
                                ?>
                        
                                </select>
                        </div>
                      
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Ảnh quảng cáo</label>
                            <input type="file" name="file1" id="fileToUpload">
                        </div>
                      
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <input type="submit" value="Lưu thay đổi"class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
