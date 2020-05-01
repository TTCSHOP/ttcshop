
<!-- sửa coursel -->
<!-- thành phần của phone -->


    <style type="text/css">
        body {
            font-family: "Open Sans", sans-serif;
        }
        
        .newitem h2 {
            color: #000;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
            position: relative;
            margin: 30px ;
        }

        .newitem h2 b {
            color: #ffc000;
        }

        

        .newitem .carousel {
            margin: 25px auto;
            padding: 0 70px;
           
        }

        .newitem .carousel .item {
            min-height: 330px;
            text-align: center;
            overflow: hidden;
            
        }

        .newitem .carousel .item .img-box {
            height: 160px;
            width: 100%;
            position: relative;
        }

        .newitem .carousel .item img {
            max-width: 100%;
            max-height: 100%;
            display: inline-block;
            position: absolute;
            bottom: 0;
            margin: 0 auto;
            left: 0;
            right: 0;
        }

        .newitem .carousel .item h4 {
            font-size: 18px;
            margin: 10px 0;
        }


        .newitem .carousel .item .btn:hover,
        .newitem .carousel .item .btn:focus {
            color: #fff;
            background: #000;
            border-color: #000;
            box-shadow: none;
        }

        .newitem .carousel .item .btn i {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
        }

        .newitem .carousel .thumb-wrapper {
            text-align: center;
            background-color: rgb(240, 245, 245);
            border-radius: 5px;
        }

        .newitem .carousel .thumb-content {
            padding: 15px;
        }

        .newitem .carousel .carousel-control {
            height: 100px;
            width: 40px;
            background: none;
            margin: auto 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .newitem .carousel .carousel-control i {
            font-size: 30px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -16px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            font-weight: bold;
        }

        .newitem .carousel .item-price {
            font-size: 13px;
            padding: 2px 0;
        }

        .newitem .carousel .item-price strike {
            color: #999;
            margin-right: 5px;
        }

        .newitem .carousel .item-price span {
            color: #86bd57;
            font-size: 110%;
        }

        .newitem .carousel .carousel-control.left i {
            margin-left: -3px;
        }

        .newitem .carousel .carousel-control.left i {
            margin-right: -3px;
        }

        .newitem .carousel .carousel-indicators {
            bottom: -50px;
        }

        .newitem .carousel-indicators li,
        .newitem .carousel-indicators li.active {
            width: 12px;
            height: 1px;
            margin: 5px;
            border-radius: 60%;
            border-color: transparent;
        }

        .newitem .carousel-indicators li {
            background: rgba(0, 0, 0, 0.2);
        }

        .newitem .carousel-indicators li.active {
            background: rgba(0, 0, 0, 0.6);
        }

        .newitem .star-rating li {
            padding: 0;
        }

        .newitem .star-rating i {
            font-size: 14px;
            color: #ffc000;
        }
    </style>


<?php
require('./includes/data.php');
$row[8] = null;
$result = mysqli_query($connect, "SELECT * FROM products");

?>


    <div class="newitem">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><img src="./images\hotsale1.jpg"> </h2>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>

                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="row">
                                    <?php

                                    for ($i = 1; $i <= 3; $i++) {
                                        $row[$i] =  mysqli_fetch_array($result);

                                        echo '   
                                        <div class="col-sm-4 ">
                                            <div class="thumb-wrapper" >
                                                <div class="img-box">
                                                <a  href="./phone/add_cart.php?buynow=' . $row[$i][0] . '">
                                                <img src="./images/' . $row[$i]['image'] . '" class="img-responsive img-fluid" >
                                                </a>
                                                
                                                </div>
                                               
                                                <div class="thumb-content">
                                                    <h4>' . $row[$i][1] . '</h4>
                                                    <h4 class="item-price">
                                                    <strike>'.floor($row[$i]['price']/1000000 + 2)  .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .'<sup>đ</sup></strike> 
                                               <span>' . floor($row[$i]['price']/1000000) .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .
                                               '<sup>đ</sup>' .'</span></h4>
                                                    <div class="star-rating">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                                     
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="item carousel-item ">
                                <div class="row">
                                    <?php
                                    for ($i = 4; $i <= 6; $i++) {
                                        $row[$i] =  mysqli_fetch_array($result);
                                        echo '   
                                        <div class="col-sm-4 ">
                                            <div class="thumb-wrapper" >
                                                <div class="img-box">
                                                <a  href="./phone/add_cart.php?buynow=' . $row[$i][0] . '">
                                                <img src="./images/' . $row[$i]['image'] . '" class="img-responsive img-fluid" >
                                                </a>
                                                
                                                </div>
                                               
                                                <div class="thumb-content">
                                                    <h4>' . $row[$i]['name'] . '</h4>
                                                    <h4 class="item-price">
                                                         <strike>'.floor($row[$i]['price']/1000000 + 2)  .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .'<sup>đ</sup></strike> 
                                                    <span>' . floor($row[$i]['price']/1000000) .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .
                                                    '<sup>đ</sup>' .'</span></h4>
                                                    <div class="star-rating">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                                     
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
