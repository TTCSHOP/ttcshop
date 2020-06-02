
<?php
session_start();
include('./includes/head_index.php');
include('./includes/data.php');
?>
<div class="body">
    <!-- quảng cáo -->
    <div class="ads ml-5 ">
        <div class="container-fluid d-inline-flex mt-3">
            <div class="col-7  ml-4 mt-3">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="4"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner mt-4">
                    <?php 
                        $qc1 = mysqli_query($connect,"SELECT * FROM advertisement WHERE position =1 ORDER BY dateModified DESC");
                        
                        for($i=0; $i<4;$i++){
                            $row_qc1 = mysqli_fetch_array($qc1);
                            if($i==0){
                                echo '
                                    <div class="carousel-item active">
                                        <img src="./images/'.$row_qc1['image'].'" style="width: 100%;">
                                    </div>
                                ';
                            }
                            else{
                                echo '
                                    <div class="carousel-item">
                                        <img src="./images/'.$row_qc1['image'].'" style="width: 100%;">
                                    </div>
                                ';
                            }
                        }
                    ?>
                        
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                    <a class="carousel-control-next" href="#demo" data-slide="next"><span class="carousel-control-next-icon"></span></a>

                </div>
            </div>
            <div class="col-4">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner mt-4">
                    <?php 
                        $qc2 = mysqli_query($connect,"SELECT * FROM advertisement WHERE position =2 ORDER BY dateModified DESC");
                        
                        for($i=0; $i<2;$i++){
                            $row_qc2 = mysqli_fetch_array($qc2);
                            if($i==0){
                                echo '
                                    <div class="carousel-item active">
                                        <img src="./images/'.$row_qc2['image'].'" class="d-block w-100" alt="...">
                                    </div>
                                ';
                            }
                            else{
                                echo '
                                <div class="carousel-item">
                                    <img src="./images/'.$row_qc2['image'].'" class="d-block w-100" alt="...">
                                </div>
                            ';
                            }
                        }
                    ?>
                       


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="media mt-2">
                <?php 
                        $qc3 = mysqli_query($connect,"SELECT * FROM advertisement WHERE position =3 ORDER BY dateModified DESC");
                        $row_qc3 = mysqli_fetch_array($qc3);
                        for($i=0; $i<1;$i++){
                            echo '
                                <img src="./images/'.$row_qc3['image'].'" style="width:100%; ">
                            ';
                        }
                    ?>
                   
                </div>
            </div>


        </div>

    </div>
    <div class="container mt-3">
        <?php 
            $qc4 = mysqli_query($connect,"SELECT * FROM advertisement WHERE position =4 ORDER BY dateModified DESC");
            
            for($i=0; $i<1;$i++){
                $row_qc4 = mysqli_fetch_array($qc4);
                echo '
                <img src="./images/'.$row_qc4['image'].'" style="width:100% ">
                ';
            }
        ?>
       

    </div>
  <!-- hot sale -->
    <?php
    include_once('phone/newItem.php');
    ?>
    <!-- các mẫu điện thoại -->
    <?php
    include('phone/phone.php');
    ?>

    </body>
    <?php include('./includes/foot.php'); ?>

    </html>