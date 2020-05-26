<?php
include('../includes/data.php');
        if(isset($_POST['submit'])){
            $phonename = $category = $price = $br = $description =$quantity=$screen = $rom=$sim=$cpu=$camera =$ram = $pin='';
            $phonename = $_POST['phonename'];
            $category = $_POST['phonecategory'];
            $price = $_POST['price'];
            $br = $_POST['brief'];
            $screen = $_POST['screen'];
            $camera = $_POST['camera'];
            $cpu = $_POST['cpu'];
            $pin = $_POST['pin'];
            $ram = $_POST['ram'];
            $rom = $_POST['rom'];
            $sim = $_POST['sim'];
            
            $quantity = $_POST['quantity'];
            $youtube = $_POST['youtube'];
            $file1 = $_FILES['file1'];
            $fileNameDb1 = $_FILES['file1']['name'];
            $fileName1 = '../../../images/'.$_FILES['file1']['name'];
            $file2 = $_FILES['file2'];
            $fileNameDb2 = $_FILES['file2']['name'];
            $fileName2 = '../../../images/'.$_FILES['file2']['name'];
            $file3 = $_FILES['file3'];
            $fileNameDb3 = $_FILES['file3']['name'];
            $fileName3 = '../../../images/'.$_FILES['file3']['name'];
            $file4 = $_FILES['file4'];
            $fileNameDb4 = $_FILES['file4']['name'];
            $fileName4 = '../../../images/'.$_FILES['file4']['name'];
            if($phonename == '' || $category == ''||$price ==''|| $brief =''||$quantity==''|| $camera
                ==''|| $sim ==''|| $screen ==''|| $ram ==''||$rom ==''|| $pin==''|| $cpu==''){
                echo '<script language="javascript">';
                echo 'alert("Chú ý: Không được để trống!")';
                echo '</script>';
            }
            else{
                if( move_uploaded_file($file1['tmp_name'],$fileName1)&&  move_uploaded_file($file2['tmp_name'],$fileName2)
                    && move_uploaded_file($file3['tmp_name'],$fileName3)&& move_uploaded_file($file4['tmp_name'],$fileName4)){
                    $result = mysqli_query($connect,"INSERT INTO `products`(`name`, `price`, `brief description`, `image`, `dateModified`, `category`, `quantityInStock`)
                     VALUES ('$phonename','$price','$br','$fileNameDb1',NOW(),'$category','$quantity')");// insert vao products
                     
                     // get id of products insert before
                     $last_id = mysqli_insert_id($connect);
                    //  echo $last_id;
                     $result_insertdetails = mysqli_query($connect,"INSERT INTO `productdetails`(`id`, `screen`, `camera`,
                      `cpu`, `ram`, `rom`, `sim`, `pin`, `image1`, `image2`, `image3`, `youtube`)
                       VALUES ($last_id,'$screen','$camera',
                       '$cpu','$ram','$rom','$sim','$pin','$fileNameDb2','$fileNameDb3','$fileNameDb4','$youtube')");// insert productdetails
                    if($result&& $result_insertdetails){
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
    <div class="modal fade" id="btn-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLongTitle">Sản phẩm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="tables.php" method="POST" enctype="multipart/form-data">
                       
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="smartphoneName" name = "phonename">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">Hãng sản phẩm</label>
                            <!-- <input type="text" class="form-control" id="category" name = "phonecategory"> -->
                                <select id="cars" name = "phonecategory">
                                <!-- lấy ra các hãng sp(category) -->
                                <?php $category = mysqli_query($connect,"SELECT * FROM categories");
                                      $total_category = mysqli_num_rows($category);
                                     
                                      for($i=0; $i<$total_category;$i++){
                                        $row_category = mysqli_fetch_array($category);
                                          echo'
                                            <option value="'.$row_category['name'].'">'.$row_category['name'].'</option>
                                          ';
                                      }
                                ?>
                        
                                </select>
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Giá sản phẩm</label>
                                <input type="int" class="form-control" id="phonePrice"name = "price">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Giới thiệu sản phẩm</label>
                            <textarea type="text" class="form-control" id="briefDescription" name = "brief"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="smartphoneName" class="col-form-label">Màn hình</label>
                            <textarea type="text" class="form-control" id="description" name = "screen"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="smartphoneName" class="col-form-label">Camera</label>
                            <textarea type="text" class="form-control" id="description" name = "camera"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">CPU</label>
                                <input type="text" class="form-control" id="phonePrice"name = "cpu">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Sim</label>
                                <input type="text" class="form-control" id="phonePrice"name = "sim">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Thời lượng Pin</label>
                                <input type="text" class="form-control" id="phonePrice"name = "pin">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Bộ nhớ trong</label>
                                <input type="text" class="form-control" id="phonePrice"name = "rom">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Bộ nhớ ngoài</label>
                                <input type="text" class="form-control" id="phonePrice"name = "ram">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Số lượng trong kho</label>
                            <input type="int" class="form-control" id="quantityInStock" name= "quantity">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Link youtube</label>
                            <input type="text" class="form-control" id="quantityInStock" name= "youtube">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Tải ảnh đại diện</label>
                            <input type="file" name="file1" id="fileToUpload">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Ảnh 1</label>
                            <input type="file" name="file2" id="fileToUpload">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Ảnh 2</label>
                            <input type="file" name="file3" id="fileToUpload">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Ảnh 3</label>
                            <input type="file" name="file4" id="fileToUpload">
                        </div>
                        <!-- Select image to upload: -->
                        <!-- <input type="file" name="file1" id="fileToUpload">
                        <input type="file" name="file2" id="fileToUpload">
                        <input type="file" name="file3" id="fileToUpload">
                        <input type="file" name="file4" id="fileToUpload"> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <input type="submit" value="Lưu thay đổi"class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
