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
                header("Location:./infor_customer.php?error=1");
                $isPassed = false;
            }
            if($isPassed){
                $insert_infor = mysqli_query($connect,"INSERT INTO orders(user_id,dateModified,phoneNumber,address)
                VALUES('$userId',NOW(),'$phoneNumber','$address')");
                if($insert_infor){
                    include('../includes/head.php');
                    echo '<div class="alert alert-success">
                                <strong>Thành công!</strong> Đơn hàng của bạn sẽ sớm được giao
                          </div>';
                    // chuyển thông tin giỏ hàng sang orderdetails
                    $get_order = mysqli_query($connect,"SELECT * FROM orders WHERE user_id = $userId");// lấy thông tin từ order
                   
                    $get_order_array = mysqli_fetch_array($get_order);
                    $orderID = $get_order_array['id'];
                    // $insert_orderdetails = mysqli_query($connect,"INSERT INTO orderdetails(orderID,status)
                    // VALUES('$orderID','Xác nhận đơn hàng')");// insert vào orderdetails
                    $get_cart = mysqli_query($connect,"SELECT * FROM cart WHERE user_id = $userId");// lấy thông tin từ giỏ hàng
                   
                    $num_cart = mysqli_num_rows($get_cart);// số sp có trong giỏ hàng
                    
                    for($j=1; $j<=$num_cart;$j++){
                        $get_cart_array = mysqli_fetch_array($get_cart);
                        $product_id = $get_cart_array['product_id'];
                        $amount = $get_cart_array['amount'];// lấy số lượng của sp có trong giỏ hàng
                        $result_quantiyInStock = mysqli_query($connect,"SELECT * FROM products WHERE id = $product_id");// ktra sl tồn kho
                        $quantity = mysqli_fetch_array($result_quantiyInStock);// lấy ra sl tồn kho

                        $totalMoney = $get_cart_array['totalMoney'];
                        
                        $insert_orderdetails = mysqli_query($connect,"INSERT INTO orderdetails(product_id,amount,totalMoney,orderID,status)
                        VALUES('$product_id','$amount','$totalMoney','$orderID',NOW())");
                        // cập nhật thông tin số lượng sp tồn kho
                        $quantity_remain = $quantity['quantityInStock'] - $amount;// số sp còn lại sau khi đặt hàng
                        mysqli_query($connect,"UPDATE `products` SET `quantityInStock` = '$quantity_remain' WHERE id = $product_id");
                    }   
                    
                   
                    // xóa giỏ hàng
                    $delete = mysqli_query($connect,"DELETE FROM cart WHERE user_id= $userId");
                    
                }
                else{
                    echo "fail order";
                }
            }
        
        }
    }
  
?>
