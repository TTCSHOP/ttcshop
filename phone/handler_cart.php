<?php

include('../includes/data.php');

    // session_start();  //Session có thể sử dụng sau khi chèn đoạn này
    // ob_start();  //Sử dụng được hàm header();
    if(!isset($_COOKIE['userId'])){
        header('Location:../user/sign_in.php');
       
    }
    else{
        // xli add_cart
        $user_id = $_COOKIE['userId'];
        if(isset($_GET['add_cart'])){
            $id= $_GET['add_cart'];
           
              $amount = $_GET['amount'];
            // if($amount <=0){
            //     header('Location:./add_cart.php?error=1');
            //     exit();
            // }
            // print_r($_SESSION);
                 
    $sql_s="SELECT * FROM products 
    WHERE id='$id'"; 
    $query_s=mysqli_query($connect,$sql_s); 
    if(mysqli_num_rows($query_s)!=0){ 
    $row_s=mysqli_fetch_array($query_s); 
            if(!isset($_SESSION['cart'])){ 
                $cart = array();
                $cart[$id] = array(
                    // 'id' => $id,
                    'name' =>$row_s['name'],
                    'des' =>$row_s['brief description'],
                    'num' => $amount,
                    'price' => $row_s['price'],
                    'image' => $row_s['image']

                );
            }else{ 
                $cart = $_SESSION['cart'];
                if(array_key_exists($id,$cart)){
                    $cart[$id] = array(
                        // 'id' => $id,
                        'name' =>$row_s['name'],
                        'des' =>$row_s['brief description'],
                        'num' => $amount,
                        'price' => $row_s['price'],
                        'image' => $row_s['image']
                    );
                }
                else{
                    $cart[$id] = array(
                        // 'id' => $id,
                        'name' =>$row_s['name'],
                        'des' =>$row_s['brief description'],
                        'num' => $amount,
                        'price' => $row_s['price'],
                        'image' => $row_s['image']
                    );
                }
            }
            $_SESSION['cart'] = $cart;
           
        }
    }
}


            
            // $check_in_cart = mysqli_query($connect,"SELECT * FROM cart WHERE product_id = '$id' AND user_id = '$user_id'");// ktra xem giỏ hàng có sp đang xem hay ko
            // $product_in_cart = mysqli_fetch_array($check_in_cart);// cho sp nếu có trong giỏ hàng vào mảng
            
    //         if($product_in_cart){
    //             $result_quantiyInStock = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id'");// ktra sl tồn kho
    //             $quantity = mysqli_fetch_array($result_quantiyInStock);
    //             $amount_in_cart = $product_in_cart['amount'];// sl sp trong giỏ hàng hiện có
    //             if(($amount_in_cart+$amount)> $quantity['quantityInStock']){
    //                 $amount = $amount_in_cart;
    //                 echo '<script language="javascript">';
    //                 echo 'alert("Sản phẩm không còn đủ số lượng!")';
    //                 echo '</script>';
    //             }
    //             else{
    //                 $amount+= $amount_in_cart;
    //             }
               
    //             // echo $amount_in_cart;
    //             $replace = mysqli_query($connect,"UPDATE cart SET amount = $amount WHERE product_id = '$id'");
    //             if($replace){
    //                 // echo "ok";
    //             }
    //             else{
    //                 echo "no";
    //             }
    //         }
    //         else{
    //             $result = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id'");
    //             $row = mysqli_fetch_array($result);
    //             // $price = $row['price'];
    //             $totalMoney = $row['price']*$amount;
    //             // $_SESSION['id'] = $id;
    //             // $_SESSION['amount'] = $amount;

    //             $insert = mysqli_query($connect,"INSERT INTO cart(product_id,amount,totalMoney,user_id,dateModified) VALUES(
    //                 '$id','$amount','$totalMoney','$user_id',NOW()
    //             )");
    //         }
    //      }
    //     if(isset($_GET['edit_amount'])){
    //         $id= $_GET['edit_amount'];
    //         $amount = $_GET['amount'];
    //         if($amount <=0){
    //             header('Location:./add_cart.php?error=1');
    //             exit();
    //         }
    //         $check_in_cart = mysqli_query($connect,"SELECT * FROM cart WHERE product_id = '$id' AND user_id = '$user_id'");// ktra xem giỏ hàng có sp đang xem hay ko
    //         $product_in_cart = mysqli_fetch_array($check_in_cart);// cho sp nếu có trong giỏ hàng vào mảng
    //         $result_quantiyInStock = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id'");// ktra sl tồn kho
    //         $quantity = mysqli_fetch_array($result_quantiyInStock);
    //         if($product_in_cart){
    //             // $amount_in_cart = $product_in_cart['amount'];// sl sp trong giỏ hàng hiện có
    //             if($amount> $quantity['quantityInStock']){
    //                 echo '<script language="javascript">';
    //                 echo 'alert("Sản phẩm không còn đủ số lượng!")';
    //                 echo '</script>';
    //             }
    //             else{
    //             // echo $amount_in_cart;
    //             $replace = mysqli_query($connect,"UPDATE cart SET amount = $amount WHERE product_id = '$id'");
    //             if($replace){
    //                 // echo "ok";
    //             }
    //             else{
    //                 echo "no";
    //             }
    //         }
    //     }
    // }
         if(isset($_POST['delete_in_cart'])){
            $id_del = $_POST['delete_in_cart'];//lấy id của sp xóa có trong giỏ hàng
            unset($_SESSION['cart'][$id_del]);
           
         }
         if(isset($_POST['delete_all_cart'])){
            unset($_SESSION['cart']);
         }
    // }
?>