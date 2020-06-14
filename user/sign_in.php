
<?php
    // xử lý form ở đây -> tự viết :D
    require('../includes/data.php');
    $name = $email = $passwordConfirmation =$password="";
    if(isset($_POST['signIn'])){     
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $isPassed = true;
        if(trim($email) == ''){
            //  echo "nhập email";
            $isPassed = false;
        }
        if(trim($password) == ''){
            // echo "Nhập vào MK<br>";
            $isPassed = false;
        }
        if($isPassed){
           // search exist email
            $result = mysqli_query($connect,"
                SELECT * FROM users WHERE email = '$email' AND password = '$password';
            ");
            $num = mysqli_num_rows($result);
            if($num >0){
                // echo "ĐN thành công";
                // ghi nhớ ĐN, 
                $row = mysqli_fetch_array($result);
                // set cookie
                setcookie('userId', $row['id'], time() + 3600, '/', '', 0);
                // $currentPage = (isset($_COOKIE['currentPage'])) ? $_COOKIE['currentPage'] : '../index.php';
                header("Location: ../index.php"); 
                exit();
                
              
            }
            else{
            //    echo "ko thành công";
               header("Location:./sign_in.php?error=1");
              
            }
        }
        else{
            header("Location:./sign_in.php?error=1");
            exit();
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
                     <strong>Chú ý!</strong> Đăng nhập không thành công
                </div>
            ";
        }
    ?>
</div>

<div class="container col-5" style="margin-top: 80px">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="bg-light p-3">
        <h3>Đăng nhập</h3>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Nhập vào email" id="email">
        </div>

        <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu" id="pwd">
        </div>

        <!-- <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
            </label>
        </div> -->
        <button type="submit" name="signIn" class="btn btn-primary">Đăng nhập</button>
        <a class="btn btn-danger"  href="sign_up.php"> Đăng kí</a>
    </form>
</div>
<?php
    include('../includes/foot.php');
?>