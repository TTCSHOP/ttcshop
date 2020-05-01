<?php
include('../includes/data.php');
        if(isset($_POST['submit'])){
            $name = $email = $password=$passwordConfirm='';
            $name = $_POST['name_admin'];
            $email= trim($_POST['email_admin']);
            $password= trim($_POST['passw']);
            $passwordConfirm = trim($_POST['passConfirm']);
            $isPassed = true;
          
            if($name == '' || $email == ''||$password ==''|| $passwordConfirm==''||strlen($password)<6){
                echo '<script language="javascript">';
                echo 'alert("Chú ý: Không được để trống!")';
                echo '</script>';
                $isPassed = false;
            }
            else{
                if($password != $passwordConfirm){
                    
                    echo '<script language="javascript">';
                    echo 'alert("Chú ý: Xác nhận mật khẩu chưa chính xác!")';
                    echo '</script>';
                    $isPassed = false;
                }
                $validate = mysqli_query($connect,"SELECT email FROM users WHERE email = '$email' AND authorization =0");
                $num = mysqli_num_rows($validate);
                if($num>0){
                    echo '<script language="javascript">';
                    echo 'alert("Chú ý: Email này đã tồn tại!")'.$password.'';
                    echo '</script>';
                    $isPassed = false;
                }
               
                
            }
            if($isPassed){
                $result = mysqli_query($connect,"INSERT INTO `users`(`name`, `email`, `password`, `dateModified`, `authorization`)
                                             VALUES ('$name','$email','$password',NOW(),0)");
                if($result){
                    echo '<script language="javascript">';
                    echo 'alert("Thêm thành công!")';
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
                    <h5 class="modal-title " id="exampleModalLongTitle">Thêm quản trị viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="admin_manager.php" method="POST" enctype="multipart/form-data">
                       
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Tên quản trị viên</label>
                            <input type="text" class="form-control"  name = "name_admin">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="email" class="form-control"  name = "email_admin">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Mật khẩu(lớn hơn 6 kí tự)</label>
                                <input type="password" class="form-control" name = "passw">
                        </div>
                        <div class="form-group col-md-8">
                                <label for="smartphoneName" class="col-form-label">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name = "passConfirm">
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
