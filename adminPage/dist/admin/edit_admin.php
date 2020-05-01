<?php
include('../includes/data.php');

?>

<?php
    if(isset($_GET['edit_admin'])){
        $id = $_GET['edit_admin'];
        $result = mysqli_query($connect,"SELECT * FROM users WHERE id = $id");
        $row = mysqli_fetch_array($result);
        echo'
        <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 10%;" >
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title " id="exampleModalLongTitle">Sửa thông quản trị viên</h5>
                <a href="../public/admin_manager.php">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </a>
            </div>
            <div class="modal-body">
           
                <form action="edit_admin.php?edit_admin='.$id.'" method="POST" enctype="multipart/form-data" class="bg-light p-3">
                   
                    <div class="form-group col-md-8">
                        <label class="col-form-label">Tên quản trị viên</label>
                        <input type="text" class="form-control" id="smartphoneName" name = "name_edit" value="'. $row['name'].'">
                    </div>
                    <div class="form-group col-md-8">
                        <label class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="smartphoneName" name = "email_edit" value="'. $row['email'].'">
                    </div>
                  
                    <div class="modal-footer">
                    <a href="../public/admin_manager.php">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </a>   
                            <input type="submit" value="lưu thay đổi" name="change_admin" class="btn btn-primary">
                       
                    </div>
                </form>
            
            </div>
            
        </div>
    </div>
        ';
    if(isset($_POST['change_admin'])){
        $name = $_POST['name_edit'];
        $email= $_POST['email_edit'];
        $isPassed= true;
        if($name =='' || $email == ''){
            echo '<script language="javascript">';
            echo 'alert("Không được để trống!")';
            echo '</script>';
            $isPassed = false;
        }
      
        if($isPassed){
            if($name != $row['name']){
                mysqli_query($connect,"UPDATE `users` SET `name` = '$name' WHERE id = $id");
                header('Location:../public/admin_manager.php');
            }
            if($email!= $row['email']){
                $validate = mysqli_query($connect,"SELECT email FROM users WHERE email = '$email' AND authorization =0");
                $num = mysqli_num_rows($validate);
                if($num>0){
                    echo '<script language="javascript">';
                    echo 'alert("Chú ý: Email này đã tồn tại!")';
                    echo '</script>';
                    $isPassed = false;
                }
                else{
                    mysqli_query($connect,"UPDATE `users` SET `email` = '$email' WHERE id = $id;");
                    header('Location:../public/admin_manager.php');
                }
               
            }
            
        }
    }
  
}
 if(isset($_GET['edit_pass'])){
    $id = $_GET['edit_pass'];
   
   
    echo'
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 10%;" >
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title " id="exampleModalLongTitle">Sửa thông tin quản trị viên</h5>
            <a href="../public/admin_manager.php">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </a>
        </div>
        <div class="modal-body">
       
            <form action="edit_admin.php?edit_pass='.$id.'" method="POST" enctype="multipart/form-data" class="bg-light p-3">
               
                <div class="form-group col-md-8">
                    <label class="col-form-label">Nhập mật khẩu cũ</label>
                    <input type="password" class="form-control" id="smartphoneName" name = "pass_pre">
                </div>
                <div class="form-group col-md-8">
                    <label class="col-form-label">Nhập mật khẩu mới</label>
                    <input type="password" class="form-control" id="smartphoneName" name = "pass_new">
                </div>
                <div class="form-group col-md-8">
                    <label class="col-form-label">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="smartphoneName" name = "pass_new_confirm">
                </div>
                <div class="modal-footer">
                <a href="../public/admin_manager.php">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </a>   
                        <input type="submit" value="lưu thay đổi" name="change_password" class="btn btn-primary">
                   
                </div>
            </form>
        
        </div>
        
    </div>
</div>
    ';
    $isPassed = true;
    if(isset($_POST['change_password'])){
        $password_pre = $pass_new = $pass_confirm='';
        $password_pre = $_POST['pass_pre'];
        $pass_new = $_POST['pass_new'];
        $pass_confirm = $_POST['pass_new_confirm'];
        if($password_pre==''|| $pass_new==''|| $pass_confirm==''){
            echo '<script language="javascript">';
            echo 'alert("Chú ý: Không được để trống!")';
            echo '</script>';
            $isPassed = false;
        }
        else{
            if(strlen($pass_new)<6){
                echo '<script language="javascript">';
                echo 'alert("Chú ý: Mật khẩu phải lớn hơn 6 kí tự!")';
                echo '</script>';
                $isPassed = false;
            }
        }
        $validate = mysqli_query($connect,"SELECT password FROM users WHERE id = $id AND password = '$password_pre'");
        $num = mysqli_num_rows($validate);
        if($num ==0){
            echo '<script language="javascript">';
            echo 'alert("Chú ý: Mật khẩu không chính xác!")';
            echo '</script>';
            $isPassed = false;
        }
        if($num>0&& $isPassed){
            if($pass_new != $pass_confirm){
                        
                echo '<script language="javascript">';
                echo 'alert("Chú ý: Xác nhận mật khẩu chưa chính xác!")';
                echo '</script>';
                $isPassed = false;
            }
            else{
                $check=mysqli_query($connect,"UPDATE `users` SET `password` = '$pass_new' WHERE id = $id;");
                if($check){
                    header('Location:../public/admin_manager.php');
                }

                //  header('Location:../public/admin_manager.php');
            }
        }
        
    }
 }
 include('../includes/header.php');
?>
<?php
include('../includes/footer.php');
?>