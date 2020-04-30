<?php
 setcookie('currentPage', '../phone/edit_cart.php', time() + 3600, '/', '', 0);
    include('../includes/data.php');
    include('../includes/head.php');
    if(!isset($_COOKIE['userId'])){
        header('Location:../user/sign_in.php');
       
    }
    
        if(isset($_COOKIE['userId'])){
            $user_id = $_COOKIE['userId'];
            if(isset($_GET['edit_cart'])){
                $id= $_GET['edit_cart'];
                $result = mysqli_query($connect,"SELECT * FROM products WHERE id = '$id'");
                $row = mysqli_fetch_array($result);
                $link = "../images/".$row['image'];
                $result = mysqli_query($connect, "SELECT * FROM products WHERE id = '$id'");
                $product_details = mysqli_query($connect, "SELECT * FROM productdetails WHERE id = '$id'");
                $row_details = mysqli_fetch_array($product_details);
                $num_of_product = mysqli_query($connect,"SELECT amount FROM cart WHERE product_id = '$id' AND user_id = '$user_id'");// số lượng của sp có $id trong giỏ hàng
                // // echo $link;
                $amount_of_product = mysqli_fetch_array($num_of_product);
                $amount = 0;
                // echo $amount_of_product['amount'];
                if($amount_of_product){
                    $amount = $amount_of_product['amount'];
                    // $replace = mysqli_query($connect,"UPDATE cart SET amount = $amount WHERE product_id = '$id'");
                }
            
        }
    }
        else{
           header('Location:../user/sign_in.php');
        }
       
        
    
?>
<div class= "error">
    <?php
        if(isset($_GET['error'])== true){
            echo "
            <div class='alert alert-danger' style='margin-top: 3px'>
                 <strong>Không thành công! </strong>Vui lòng chọn số lượng
            </div>
        ";
            exit();
        }
    ?> 
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="../CSS/demo.css" rel="stylesheet">
  </head>
  <body>
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content" >
                                <div class="tab-pane active" id="pic-1"> <img src="../images/<?php echo $row_details['image1'] ?>" style="height:70vh"/></div>
                                <div class="tab-pane" id="pic-2"><img src="../images/<?php echo $row_details['image2'] ?>" style="height:70vh"/></div>
                                <div class="tab-pane" id="pic-3"><img src="../images/<?php echo $row_details['image3'] ?>" style="height:70vh"/></div>
                                <!-- <div class="tab-pane" id="pic-4"><img src="../images/<?php echo $row['image'] ?>" /></div>
                                <div class="tab-pane" id="pic-5"><img src="../images/<?php echo $row['image'] ?>" /></div> -->
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs ml-10">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="../images/<?php echo $row_details['image1'] ?>" style="height:50px"/></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img src="../images/<?php echo $row_details['image2'] ?>" style="height:50px"/></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img src="../images/<?php echo $row_details['image3'] ?>" style="height:50px"/></a></li>
                                <!-- <li><a data-target="#pic-4" data-toggle="tab"><img src="../images/<?php echo $row['image'] ?>" /></a></li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img src="../images/<?php echo $row['image'] ?>" /></a></li> -->
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo $row['name'] ?></h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <p class="product-description"><?php echo $row['brief description'] ?></p>
                            <h4 class="price">Giá: <span><?php echo $row['price'] ?> &nbsp;đ</span></h4>
                            <p class="vote"><strong>91%</strong> người mua hài lòng về sản phẩm! <strong>(87 votes)</strong></p>

                            <div class="action">
                                <form action="./cart.php" method="GET">
                                    <input type="number" name="amount" value="<?php echo $amount ?>" style="width:100px;height:30px;border:none; margin-right:10px;text-align: center;background-color:#ff9f1a;">

                                    <button type="submit" name="edit_amount" value="<?php echo $id ?>" class="add-to-cart btn btn-default">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <p class="product-description">
                    <pre><?php echo $row['description'] ?></pre>
                </p> -->

            </div>

        </div>
        <div class="container d-flex flex-row mt-3 mb-3">
             <h5 class="col-md-7 text-danger">Video review</h5>
        <h5 class="col-md-6 ml-5 text-danger">Thông số kĩ thuật</h5>
        </div>
       
        <div class="container d-flex flex-row mt-3 mb-3">
            <iframe class="col-md-7" width="560" height="315" src="<?php echo $row_details['youtube']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-md-5 ml-4">
                <table class="table">
                
                    <tbody>
                        <tr>
                            <td style="width:200px">Màn hình:</td>
                            <td><?php echo $row_details['screen']?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">CPU:</td>
                            <td><?php echo $row_details['cpu']?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Camera:</td>
                            <td><?php echo $row_details['camera']?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Ram:</td>
                            <td><?php echo $row_details['ram']?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Rom:</td>
                            <td><?php echo $row_details['rom']?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Sim:</td>
                            <td><?php echo $row_details['sim']?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Pin:</td>
                            <td><?php echo $row_details['pin']?></td>
                        </tr>
                    </tbody>
            </table>
        </div>


</div>
<?php
include('../includes/foot.php');
?>
</body>
</html>
