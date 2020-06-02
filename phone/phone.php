<div class="  container  mt-4 ">
    <div class="row">
        <img src="images\new-arrival.jpg">
        <h2 class="mt-3 ml-3" style="font-family: broadway;text-shadow: rgb(255,0,0) -2px -2px 0.5em;"> New Item</h2>
    </div>

</div>

<?php
// xử lý form ở đây -> tự viết :D
require('./includes/data.php');
$row[10] = null;
echo '<div class="card-group container mt-2" id="content">';
echo '<div class="content-card d-flex justify-content-between flex-wrap">';
$result = mysqli_query($connect, "SELECT * FROM products WHERE quantityInStock >0");
$num=mysqli_num_rows($result);
for ($i = 1; $i <=8; $i++) {
    // $result = mysqli_query($connect, "SELECT * FROM products");

    $row[$i] =  mysqli_fetch_array($result);

    echo
        '<div class="card mb-3 mr-ml-1" style="width: 270px;">
            <a  href="./phone/add_cart.php?buynow=' . $row[$i][0] . '">
                <img src="./images/' . $row[$i]['image'] . '" class="card-img-top" alt="..." >
            
           
            <div class="card-body">
                    <h5 class="card-title" style="color:black">' . $row[$i]['name'] . '</h5></a>' .
                    '<div class=row>'.
                        '<h5 class="price col-7" style="color:#86bd57">' .
                        floor($row[$i]['price']/1000000) .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .
                        '<sup>đ</sup></h5>' .
                        '<h6 class="price " style="color:red"><del>' .
                        floor($row[$i]['price']/1000000 + 2)  .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .'<sup>đ</sup></h5>' .
                         '</del></h6>'.
                        '</div>'.
            '<p ><small>' . $row[$i]['brief description'] . '</small> </p>
                    
                </div>
                <div class="collapse multi-collapse " id="desphone' . $i . '">
                    <div class="card card-body bg-primary text-light">' . $row[$i][4] . ' </div>
                        
                </div>
            </div>
            ';
            
}
echo '</div></div>';
?>
<!-- <div class="container " >
    <img src="images/footads.jpg">
</div> -->
<div class="container mt-3" >
<?php 
            $qc5 = mysqli_query($connect,"SELECT * FROM advertisement WHERE position =5 ORDER BY dateModified DESC");
           
            for($i=0; $i<1;$i++){
                $row_qc5 = mysqli_fetch_array($qc5);
                echo '
                <img src="./images/'.$row_qc5['image'].'" alt=""style="width:100% ">

                ';
            }
        ?>
        <!-- <img src="./images/ads1.jpg" alt=""style="width:100% "> -->

    </div>
<?php
// xử lý form ở đây -> tự viết :D

$row[10] = null;
echo '<div class="card-group container mt-2" id="content">';
echo '<div class="content-card d-flex justify-content-between flex-wrap">';
$result = mysqli_query($connect, "SELECT * FROM products WHERE quantityInStock >0");
for ($i = 1; $i <= $num; $i++) {
    // $result = mysqli_query($connect, "SELECT * FROM products");

    $row[$i] =  mysqli_fetch_array($result);

    echo
        '<div class="card mb-3 mr-ml-1" style="width: 270px;">
            <a  href="./phone/add_cart.php?buynow=' . $row[$i][0] . '">
                <img src="./images/' . $row[$i]['image'] . '" class="card-img-top" alt="..." >
            
           
            <div class="card-body">
                    <h5 class="card-title" style="color:black">' . $row[$i]['name'] . '</h5></a>' .
                    '<div class=row>'.
                        '<h5 class="price col-md-7" style="color:#86bd57">' .
                        floor($row[$i]['price']/1000000) .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .
                        '<sup>đ</sup></h5>' .
                        '<h6 class="price " style="color:red"><del>' .
                        floor($row[$i]['price']/1000000 + 2)  .'.'.   $row[$i]['price']%1000000/1000 .'.'. '000' .'<sup>đ</sup></h5>' .
                         '</del></h6>'.
                        '</div>'.
            '<p ><small>' . $row[$i]['brief description'] . '</small> </p>
                    
                </div>
                <div class="collapse multi-collapse " id="desphone' . $i . '">
                    <div class="card card-body bg-primary text-light">' . $row[$i][4] . ' </div>
                        
                </div>
            </div>
            ';
            
}
echo '</div></div>';
?>