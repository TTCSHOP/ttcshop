<?php
 setcookie('currentPage', '../order/infor_customer.php', time() + 3600, '/', '', 0);
    include('../includes/head.php');
    include('./handler_order.php');
?>
 <div class= "error">
    <?php
        if(isset($_GET['error'])== true){
            echo '<script language="javascript">';
            echo 'alert("Không thành công!Nhập thông tin chính xác")';
            echo '</script>';
        }
    ?>
</div>
<div class="col-md-5 order-md-1 ml-5 mt-3">
                <h4 class="mb-3">Thông tin</h4>
                <form class="needs-validation" novalidate="" action="./handler_order.php" method="POST">
                    <div class="row">
                        <!-- <div class="col-md-6 mb-3">
                            <label for="firstName">Tên người nhận</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div> -->
                    </div>

                    <div class="mb-3">
                        <label for="username">Số điện thoại</label>
                        <div class="input-group">

                            <input type="int" name = "phoneNumber" class="form-control" id="username" placeholder="Phone number" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div> -->

                    <div class="mb-3">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name = "address" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <hr class="mb-4">

                    <hr class="mb-4">

                    <h4 class="mb-3">Thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                            <label class="custom-control-label" for="credit">&nbsp;&nbsp;&nbsp;&nbsp;Thẻ ngân hàng</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="paypal">&nbsp;&nbsp;&nbsp;&nbsp;Tiền mặt</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <a href="../phone/cart.php" class="btn btn-primary btn-lg btn-block">Xem lại giỏ hàng</a>
                    <button class="btn btn-primary btn-lg btn-block" name = "order" type="submit">Đặt hàng</button>
                </form>
            </div>

 <?php
    include('../includes/foot.php');
?>