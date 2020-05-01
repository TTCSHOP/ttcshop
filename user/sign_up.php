 
<?php
include('../includes/data.php');
// xử lý form ở đây -> tự viết :D
    $username = $email = $passwordConfirmation =$password="";
    if(isset($_POST['signUp'])){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $passwordConfirmation = trim($_POST['passwordConfirmation']);
        $isPassed = true;
        if(trim($username) == ''){
            echo '<script language="javascript">';
            echo 'alert("Chú ý:  Không được để trống!")';
            echo '</script>';
            $isPassed = false;
        }
        if(trim($email) == ''){
            echo '<script language="javascript">';
            echo 'alert("Chú ý:  Không được để trống!")';
            echo '</script>';
            $isPassed = false;
        }
        if(trim($password) == ''&& strlen($password)>6){
            echo '<script language="javascript">';
            echo 'alert("Chú ý: Không được để trống, mật khẩu phải trên 6 kí tự!")';
            echo '</script>';
            $isPassed = false;
        }
        if(trim($passwordConfirmation) == ''){
            echo '<script language="javascript">';
                    echo 'alert("Chú ý: Không được để trống!")';
                    echo '</script>';
            $isPassed = false;
        }

        else{
            if($password!= $passwordConfirmation){
                echo '<script language="javascript">';
                echo 'alert("Chú ý: Xác nhận mật khẩu chưa chính xác!")';
                echo '</script>';
                $isPassed = false;
            }
        }

        if($isPassed){
           // search exist email
            $result = mysqli_query($connect,"
                SELECT email FROM users WHERE email = '$email'
            ");
        //     $check_username = mysqli_query($connect,"
        //     SELECT *FROM users WHERE name = '$username'
        // ");
            $num = mysqli_num_rows($result);
            // $num_user = mysqli_num_rows($check_username);
            if($num >0){
                echo '<script language="javascript">';
                echo 'alert("Chú ý: email này đã tồn tại!")';
                echo '</script>';
            }
            else{
                 $result = mysqli_query($connect,"INSERT INTO users(name,email,password,authorization,dateModified) VALUES('$username','$email','$password','1',NOW())");
                if($result){
                    $user = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email'");
                    $row = mysqli_fetch_array($user);
                    setcookie('userId', $row['id'], time() + 3600, '/', '', 0);
                    header('Location:../index.php'); 
                    exit();
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Chú ý:  Không thành công!")';
                    echo '</script>';
                }
            }
            
        }
        mysqli_close($connect);
    }
 ?>
 <?php
    include('../includes/head.php');
 ?>
 <div class= "error">
    <?php
        if(isset($_GET['error'])== true){
            echo "
                <div class='alert alert-danger' style='margin-top: 3px'>
                     <strong>Chú ý!</strong> Đăng kí không thành công
                </div>
            ";
        }
    ?>
</div>
<div class="container col-5" style="margin-top: 80px">
<form action="sign_up.php" method="POST" class="bg-light p-3">
    <h3>Đăng kí</h3>
    <div class="form-group">
        <label for="email">Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" placeholder="Nhập vào tên" id="username">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Nhập vào email" id="email">
    </div>

    <div class="form-group">
        <label for="pwd">Mật khẩu(phải lớn hơn 6 kí tự):</label>
        <input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu" id="pwd">
    </div>

    <div class="form-group">
        <label for="pwd">Xác nhận mật khẩu:</label>
        <input type="password" name="passwordConfirmation" class="form-control" placeholder="Nhập vào mật khẩu" id="pwd">
    </div>

    <button type="submit" name ='signUp' class="btn btn-primary">Đăng kí</button>
</form>
</div>
<?php
include('../includes/foot.php');
?>