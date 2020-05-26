<?php
include('../includes/data.php');
    if(isset($_GET['edit'])){
       
       $id_edit = $_GET['edit'];
      
       $result_edit = mysqli_query($connect,"SELECT * FROM advertisement WHERE id = '$id_edit'");
      
       $edit_arr = mysqli_fetch_array($result_edit);// mảng của advertisement
      
    }

        if(isset($_POST['change'])){
            $name_edit ='';
            $name_edit = $_POST['name_edit'];
            $pos = $_POST['pos_edit'];
            $file1 = $_FILES['file_edit1'];
            $fileNameDb1 = $_FILES['file_edit1']['name'];
            $fileName1 = '../../../images/'.$_FILES['file_edit1']['name'];
            
        if($name_edit == ''){
            echo '<script language="javascript">';
            echo 'alert("Chú ý! Không được để trống")';
            echo '</script>';
        }
        else{
            if($name_edit!= $edit_arr['name']){
                $edit_name = mysqli_query($connect,"UPDATE `advertisement` SET `name` = '$name_edit' WHERE `advertisement`.`id` = $edit_arr[0];");
            }
            
            if($pos!= $edit_arr['position']){
                $edit_category = mysqli_query($connect,"UPDATE `advertisement` SET `position` = '$pos' WHERE `products`.`id` = $edit_arr[0];");
            }
            if($_FILES['file_edit1']['name']!=''){
                if( move_uploaded_file($file1['tmp_name'],$fileName1)){
                     echo "ĐK thành công1";
                    mysqli_query($connect,"UPDATE `advertisement` SET `image` = '$fileNameDb1' WHERE `products`.`id` = $edit_arr[0];");
                   
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Không thành công")';
                    echo '</script>';
                    header('Location:edit.php?edit='.$edit_arr[0].'');
                }
            }
           
           
            
             header('Location:../public/advertisement.php');
        }
}

    include('../includes/header.php');
?>

</div>
    <!-- Modal -->
    <!-- <div  class="modal fade"id ="btn-edit"tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">  -->
        <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 10%;" >
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLongTitle">Sửa thông tin sản phẩm</h5>
                    <a href="../public/tables.php">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
                <div class="modal-body">
               
                    <form action="edit_ad.php?<?php echo 'edit='.$edit_arr[0]?>" method="POST" enctype="multipart/form-data" class="bg-light p-3">
                       
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Tên quảng cáo</label>
                            <input type="text" class="form-control" id="smartphoneName" name = "name_edit" value="<?php echo $edit_arr['name']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">Vị trí</label>
                            <!-- <input type="text" class="form-control" id="category" name = "phonecategory"> -->
                                <select id="cars" name = "pos_edit">
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
                            <label  class="col-form-label ">Sửa ảnh</label>
                            <input type="file" name="file_edit1" id="fileToUpload">
                        </div>
                       
                        <div class="modal-footer">
                        <a href="../public/advertisement.php">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </a>   
                                <input type="submit" value="lưu thay đổi" name="change" class="btn btn-primary">
                           
                        </div>
                    </form>
                
                </div>
                
            </div>
        </div>