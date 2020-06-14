<?php
// setcookie('currentPage', '../phone/add_cart.php', time() + 3600, '/', '', 0);
include('../includes/data.php');
include('../includes/head.php');

$amount = 1;
if (isset($_COOKIE['userId'])) {
    if (isset($_GET['buynow'])) {
        $id = $_GET['buynow'];
        $result = mysqli_query($connect, "SELECT * FROM products WHERE id = '$id'"); // lấy của products
        $product_details = mysqli_query($connect, "SELECT * FROM productdetails WHERE id = '$id'"); // lấy của productdetails
        $row = mysqli_fetch_array($result); // mảng của products
        $row_details = mysqli_fetch_array($product_details); // mảng của products details
        $link = "../images/" . $row['image'];
        $max = $row['quantityInStock'];
        if($max>=5){
            $max = 5;
        }
        else{
            $max = $row['quantityInStock'];
        }
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            if(array_key_exists($id,$cart)){
                $amount = (int)$_SESSION['cart'][$id]['num'];
                // echo $amount;
            }
        }
       
    }
} else {
    if (isset($_GET['buynow'])) {
        $id = $_GET['buynow'];
        $result = mysqli_query($connect, "SELECT * FROM products WHERE id = '$id'");
        $product_details = mysqli_query($connect, "SELECT * FROM productdetails WHERE id = '$id'");
        $row_details = mysqli_fetch_array($product_details);
        $row = mysqli_fetch_array($result);
        $link = "../images/" . $row['image'];
        $num_of_product = 0; // số lượng của sp có $id trong giỏ hàng
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            if(array_key_exists($id,$cart)){
                $amount = (int)$_SESSION['cart'][$id]['num'];
                // echo $amount;
            }
        }
    }
}
?>
<div class="error">
    <?php
    if (isset($_GET['error']) == true) {
        echo "
            <div class='alert alert-danger' style='margin-top: 3px'>
                 <strong>Không thành công! </strong>Vui lòng chọn số lượng
            </div>
        ";
        exit();
    }
    ?>



    <html>

    <head>
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
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"> <img src="../images/<?php echo $row_details['image1'] ?>" style="height:65vh;" /></div>
                                <div class="tab-pane" id="pic-2"><img src="../images/<?php echo $row_details['image2'] ?>" style="height:65vh;" /></div>
                                <div class="tab-pane" id="pic-3"><img src="../images/<?php echo $row_details['image3'] ?>" style="height:65vh;" /></div>
                                <!-- <div class="tab-pane" id="pic-4"><img src="../images/<?php echo $row['image'] ?>" /></div>
                                <div class="tab-pane" id="pic-5"><img src="../images/<?php echo $row['image'] ?>" /></div> -->
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs ml-10">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="../images/<?php echo $row_details['image1'] ?>" style="height:50px" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img src="../images/<?php echo $row_details['image2'] ?>" style="height:50px" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img src="../images/<?php echo $row_details['image3'] ?>" style="height:50px" /></a></li>
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
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <p class="product-description"><?php echo $row['brief description'] ?></p>
                            <h4 class="price">Giá niêm yết: <span><?php echo  ' <del> ' .
                                                                        floor($row['price'] / 1000000 + 2)  . '.' .   $row['price'] % 1000000 / 1000 . '.' . '000'  .
                                                                        '</del>' ?> &nbsp;đ</span></h4>
                            <h4 class="price text-danger">Giá khuyến mãi: <span><?php echo floor($row['price'] / 1000000) . '.' .   $row['price'] % 1000000 / 1000 . '.' . '000' ?> &nbsp;đ</span></h4>

                            <p class="vote"><strong>91%</strong> người mua hài lòng về sản phẩm! <strong>(87 votes)</strong></p>
                            <strong style="margin-bottom: 2px">Số lượng: <?php echo $row['quantityInStock']?></strong>
                            <div class="action">
                                <form action="./cart.php" method="GET">
                                    <input type="number" min="1" max="<?php echo $max?>" name="amount" value="<?php echo $amount ?>" style="width:100px;height:30px;border:none; margin-right:10px;text-align: center;background-color:#ff9f1a;">

                                    <button type="submit" name="add_cart" value="<?php echo $id ?>" class="add-to-cart btn btn-default">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            <div class="f-left mt-4 ">
                                <a class="btn btn-success " style="width:49.5%;display:inline-block;">
                                    <strong>TRẢ GÓP 0%</strong>
                                    <br>
                                    (Xét duyệt qua điện thoại)
                                </a>
                                <a class="btn btn-primary" onclick="tragop()" style="width:49.5%;display:inline-block;">
                                    <strong>TRẢ GÓP 0% QUA THẺ</strong>
                                    <br>
                                    (Visa, Master Card, JCB)
                                </a>
                            </div>
                            <div style="margin-top: 10px; text-align: center; color: #3c3d41;float: left;width: 100%;">
                                <a href="https://cellphones.com.vn/tra-gop/mpos" target="_blank">Trả góp 0% với thẻ tín dụng tại cửa hàng - Xem chi tiết </a><br>
                                Gọi miễn phí: <b>1800.2097</b>
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
            <iframe class="col-md-7" width="560" height="315" src="<?php echo $row_details['youtube'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="col-md-5 ml-4">
                <table class="table">

                    <tbody>
                        <tr>
                            <td style="width:200px">Màn hình:</td>
                            <td><?php echo $row_details['screen'] ?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">CPU:</td>
                            <td><?php echo $row_details['cpu'] ?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Camera:</td>
                            <td><?php echo $row_details['camera'] ?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Ram:</td>
                            <td><?php echo $row_details['ram'] ?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Rom:</td>
                            <td><?php echo $row_details['rom'] ?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Sim:</td>
                            <td><?php echo $row_details['sim'] ?></td>
                        </tr>
                        <tr>
                            <td style="width:200px">Pin:</td>
                            <td><?php echo $row_details['pin'] ?></td>
                        </tr>

                    </tbody>
                </table>
                <div class="item"></div>
                <button type="button"  class="btn border-info rounded-pill " data-toggle="modal" data-target="#thanks">
                More
                </button>

                <!-- Modal -->
                <div class="modal fade" id="thanks" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cảm ơn quý khách đã quan tâm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                TTC Shop cam kết mọi sản phẩm của shop đều là hàng chính hãng mới 100% new seal. Tất cả đều được shop bảo hành ít nhất 12 tháng,
                                với những mẫu cá biệt được bảo hành đến 18 tháng. TTC mua sự hài lòng của quý khách, cảm ơn quý khách đã ghé qua trang web của cửa hàng.

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- abc -->

        </div>


        <?php

        include('../includes/foot.php');
        ?>
    </body>

    </html>