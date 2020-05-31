<?php
include('../includes/data.php');
    if(isset($_GET['edit'])){
       
       $id_edit = $_GET['edit'];
      
       $result_edit = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id_edit'");
      
       $edit_arr = mysqli_fetch_array($result_edit);// mảng của product
       $edit_details = mysqli_query($connect,"SELECT * FROM productdetails WHERE id = $id_edit");
       $row_edit_details = mysqli_fetch_array($edit_details);// mảng của productdetails
    }

        if(isset($_POST['change'])){
            $phonename = $category = $price = $br = $description =$quantity=$screen = $rom=$sim=$cpu=$camera =$ram = $pin='';
            $phonename = $_POST['name_edit'];
            $category = $_POST['category_edit'];
            $price = $_POST['price_edit'];
            $br = $_POST['brief_edit'];
            $screen = $_POST['screen_edit'];
            $camera = $_POST['camera_edit'];
            $cpu = $_POST['cpu_edit'];
            $pin = $_POST['pin_edit'];
            $ram = $_POST['ram_edit'];
            $rom = $_POST['rom_edit'];
            $sim = $_POST['sim_edit'];
            
            $quantity = $_POST['quantity_edit'];
            $youtube = $_POST['youtube_edit'];
            $file1 = $_FILES['file_edit1'];
            $fileNameDb1 = $_FILES['file_edit1']['name'];
            $fileName1 = '../../../images/'.$_FILES['file_edit1']['name'];
            $file2 = $_FILES['file_edit2'];
            $fileNameDb2 = $_FILES['file_edit2']['name'];
            $fileName2 = '../../../images/'.$_FILES['file_edit2']['name'];
            $file3 = $_FILES['file_edit3'];
            $fileNameDb3 = $_FILES['file_edit3']['name'];
            $fileName3 = '../../../images/'.$_FILES['file_edit3']['name'];
            $file4 = $_FILES['file_edit4'];
            $fileNameDb4 = $_FILES['file_edit4']['name'];
            $fileName4 = '../../../images/'.$_FILES['file_edit4']['name'];
        if($phonename == '' || $category == ''||$price ==''|| $brief =''||$quantity==''||$pin==''||$rom ==''||$ram ==''
            ||$screen ==''|| $cpu ==''||$camera==''||$sim==''){
            echo '<script language="javascript">';
            echo 'alert("Chú ý! Không được để trống")';
            echo '</script>';
        }
        else{
            if($phonename!= $edit_arr['name']){
                $edit_name = mysqli_query($connect,"UPDATE `products` SET `name` = '$phonename' WHERE `products`.`id` = $edit_arr[0];");
            }
            // if($code!= $edit_arr[9]){
            //     $edit_code = mysqli_query($connect,"UPDATE `products` SET `productCode` = '$code' WHERE `products`.`id` = $edit_arr[0];");
            // }
            if($category!= $edit_arr['category']){
                $edit_category = mysqli_query($connect,"UPDATE `products` SET `category` = '$category' WHERE `products`.`id` = $edit_arr[0];");
            }
            if($price!= $edit_arr['price']){
                $edit_price = mysqli_query($connect,"UPDATE `products` SET `price` = '$price' WHERE `products`.`id` = $edit_arr[0];");
            }
            if($br!= $edit_arr['brief_description']){
                $edit_br = mysqli_query($connect,"UPDATE `products` SET `brief description` = '$br' WHERE `products`.`id` = $edit_arr[0];");
            }
            // if($description!= $edit_arr[4]){
            //     $edit_des = mysqli_query($connect,"UPDATE `products` SET `description` = '$description' WHERE `products`.`id` = $edit_arr[0];");
            // }
            if($quantity!= $edit_arr['quantityInStock']){
                mysqli_query($connect,"UPDATE `products` SET `quantityInStock` = '$quantity' WHERE `products`.`id` = $edit_arr[0];");
            }
            if($screen!= $row_edit_details['screen']){
                 mysqli_query($connect,"UPDATE `productdetails` SET `screen` = '$screen' WHERE id = $edit_arr[0];");
            }
            if($camera!= $row_edit_details['camera']){
                mysqli_query($connect,"UPDATE `productdetails` SET `camera` = '$camera' WHERE id = $edit_arr[0];");
            }
            if($cpu!= $row_edit_details['cpu']){
                mysqli_query($connect,"UPDATE `productdetails` SET `cpu` = '$cpu' WHERE id = $edit_arr[0];");
            }
            if($rom!= $row_edit_details['rom']){
                mysqli_query($connect,"UPDATE `productdetails` SET `rom` = '$rom' WHERE id = $edit_arr[0];");
            }
            if($ram!= $row_edit_details['ram']){
                mysqli_query($connect,"UPDATE `productdetails` SET `ram` = '$ram' WHERE id = $edit_arr[0];");
            }
            if($pin!= $row_edit_details['pin']){
                mysqli_query($connect,"UPDATE `productdetails` SET `pin` = '$pin' WHERE id = $edit_arr[0];");
            }
            if($sim!= $row_edit_details['sim']){
                mysqli_query($connect,"UPDATE `productdetails` SET `sim` = '$sim' WHERE id = $edit_arr[0];");
            }
            if($youtube!= $row_edit_details['youtube']){
                mysqli_query($connect,"UPDATE `productdetails` SET `youtube` = '$youtube' WHERE id = $edit_arr[0];");
            }
            // if($quantity!= $edit_arr['quantityInStock']){
            //     $edit_quantity = mysqli_query($connect,"UPDATE `products` SET `quantityInStock` = '$quantity' WHERE `products`.`id` = $edit_arr[0];");
            // }
            if($_FILES['file_edit1']['name']!=''){
                if( move_uploaded_file($file1['tmp_name'],$fileName1)){
                     echo "ĐK thành công1";
                    mysqli_query($connect,"UPDATE `products` SET `image` = '$fileNameDb1' WHERE `products`.`id` = $edit_arr[0];");
                   
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Không thành công")';
                    echo '</script>';
                    header('Location:edit.php?edit='.$edit_arr[0].'');
                }
            }
            if($_FILES['file_edit2']['name']!=''){
                if( move_uploaded_file($file2['tmp_name'],$fileName2)){
                     echo "ĐK thành công2";
                    mysqli_query($connect,"UPDATE `productdetails` SET `image1` = '$fileNameDb2' WHERE id = $edit_arr[0];");
                   
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Không thành công")';
                    echo '</script>';
                    header('Location:edit.php?edit='.$edit_arr[0].'');
                }
            }
            if($_FILES['file_edit3']['name']!=''){
                if( move_uploaded_file($file3['tmp_name'],$fileName3)){
                     echo "ĐK thành công3";
                    mysqli_query($connect,"UPDATE `productdetails` SET `image2` = '$fileNameDb3' WHERE id = $edit_arr[0];");
                   
                }
                if($_FILES['file_edit4']['name']!=''){
                    if( move_uploaded_file($file4['tmp_name'],$fileName4)){
                         echo "ĐK thành công4";
                        mysqli_query($connect,"UPDATE `productdetails` SET `image3` = '$fileNameDb4' WHERE id = $edit_arr[0];");
                       
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Không thành công")';
                        echo '</script>';
                        header('Location:edit.php?edit='.$edit_arr[0].'');
                    }
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Không thành công")';
                    echo '</script>';
                    header('Location:edit.php?edit='.$edit_arr[0].'');
                }
            }
            
             header('Location:../public/tables.php');
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
               
                    <form action="edit.php?<?php echo 'edit='.$edit_arr[0]?>" method="POST" enctype="multipart/form-data" class="bg-light p-3">
                       
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="smartphoneName" name = "name_edit" value="<?php echo $edit_arr['name']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">Hãng sản phẩm</label>
                            <!-- <input type="text" class="form-control" id="category" name = "category_edit"value="<?php echo $edit_arr['category']?>"> -->
                            <select id="cars" name = "category_edit">
                                <option value="<?php echo $edit_arr['category']?>"><?php echo $edit_arr['category']?></option>
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
                                <input type="int" class="form-control" id="phonePrice"name = "price_edit" value="<?php echo $edit_arr['price']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Giới thiệu sản phẩm</label>
                            <?php $bri = $edit_arr['brief description'];?>
                            <input type="text"  class="form-control"style=" word-wrap: break-word;" name = "brief_edit" value="<?php echo $edit_arr['brief description']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="smartphoneName" class="col-form-label">Màn hình</label>
                            <input type="text" class="form-control" id="description" name = "screen_edit" value="<?php echo $row_edit_details['screen']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="smartphoneName" class="col-form-label">Camera</label>
                            <input type="text" class="form-control" id="description" name = "camera_edit" value="<?php echo $row_edit_details['camera']?>"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">CPU</label>
                                <input type="text" class="form-control" id="phonePrice"name = "cpu_edit" value="<?php echo $row_edit_details['cpu']?>">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Sim</label>
                                <input type="text" class="form-control" id="phonePrice"name = "sim_edit" value="<?php echo $row_edit_details['sim']?>">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Thời lượng Pin</label>
                                <input type="text" class="form-control" id="phonePrice"name = "pin_edit" value="<?php echo $row_edit_details['pin']?>">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Bộ nhớ trong</label>
                                <input type="text" class="form-control" id="phonePrice"name = "rom_edit" value="<?php  echo $row_edit_details['rom']?>">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Bộ nhớ ngoài</label>
                                <input type="text" class="form-control" id="phonePrice"name = "ram_edit" value="<?php  echo $row_edit_details['ram']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Số lượng trong kho</label>
                            <input type="int" class="form-control" id="quantityInStock" name= "quantity_edit"value="<?php echo $edit_arr['quantityInStock']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Link youtube</label>
                            <input type="text" class="form-control" id="quantityInStock" name= "youtube_edit"value="<?php echo $row_edit_details['youtube']?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Sửa ảnh đại diện</label>
                            <input type="file" name="file_edit1" id="fileToUpload">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Sửa ảnh 1</label>
                            <input type="file" name="file_edit2" id="fileToUpload">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Sửa ảnh 2</label>
                            <input type="file" name="file_edit3" id="fileToUpload">
                        </div>
                        <div class="form-group col-md-8">
                            <label  class="col-form-label ">Sửa ảnh 3</label>
                            <input type="file" name="file_edit4" id="fileToUpload">
                        </div>
                        <!-- Select image to upload: -->
                        <!-- <input type="file" name="file_edit1" id="fileToUpload">
                        <input type="file" name="file_edit2" id="fileToUpload">
                        <input type="file" name="file_edit3" id="fileToUpload">
                        <input type="file" name="file_edit4" id="fileToUpload"> -->
                        <div class="modal-footer">
                        <a href="../public/tables.php">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </a>   
                                <input type="submit" value="lưu thay đổi" name="change" class="btn btn-primary">
                           
                        </div>
                    </form>
                
                </div>
                
            </div>
        </div>