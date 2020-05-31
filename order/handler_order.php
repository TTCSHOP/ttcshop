<?php
    include('../includes/data.php');
    if(!isset($_COOKIE['userId'])){
        header('Location:../user/sign_in.php');
       
    }
    else{
        $userId = $_COOKIE['userId'];
        if(isset($_POST['order'])){
            $phoneNumber = trim($_POST['phoneNumber']);
            $address = trim($_POST['address']);
        
            $isPassed = true;
            if($phoneNumber ==''|| $address ==''){
                echo '<script language="javascript">';
                echo 'alert("Không để trống thông tin!")';
                echo '</script>';
                $isPassed = false;
            }
            if($isPassed){
       
                    // xử lí bảng orders và orderdetails
                    if(isset($_SESSION['cart'])){ 
                        $insert_infor = mysqli_query($connect,"INSERT INTO orders(user_id,dateModified,phoneNumber,address)
                        VALUES('$userId',NOW(),'$phoneNumber','$address')");
                        $last_id = mysqli_insert_id($connect);
                   
                        foreach($_SESSION['cart'] as $id => $value) {
                            $result_pro = mysqli_query($connect,"SELECT * FROM products WHERE id = $id");
                            $row_pro = mysqli_fetch_array($result_pro);
                            if($value['num']<= $row_pro['quantityInStock']){
                                $amount = $value['num'];
                                $quantity_remain = $row_pro['quantityInStock'] - $amount;
                                // echo 'quan'.$quantity_remain.'<br>';
                                $price = $row_pro['price'];
                                // echo 'price'.$price.'<br>';
                                mysqli_query($connect,"UPDATE `products` SET `quantityInStock` = '$quantity_remain' WHERE id = $id");
                                $insert_orderdetails = mysqli_query($connect,"INSERT INTO orderdetails(product_id,amount,priceEach,orderID,status)
                                VALUES('$id','$amount','$price','$last_id',NOW())");
                                // if($insert_orderdetails){
                                //     echo 'ok'.'<br>';
                                // }
                                // else{
                                //     echo 'fail'.'<br>';
                                // }
                            }
                            else{

                                echo '<script language="javascript">';
                                echo 'alert("Không thành công! Sản phẩm'.$row['name'].' không còn đủ số lượng, vui lòng chọn lại số lượng!")';
                                echo '</script>';
                                exit();
                            }

                         }

                    echo '<script language="javascript">';
                    echo 'alert("Thành công! Đơn hàng của bạn sẽ sớm được giao")';
                    echo '</script>';
                   
                    unset($_SESSION['cart']);
                    
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Giỏ hàng của bạn đang trống,Vui lòng thêm sản phẩm vào giỏ hàng")';
                    echo '</script>';
                }
            }
        else{
            // echo "fail order";
        }
    }

}


?>
