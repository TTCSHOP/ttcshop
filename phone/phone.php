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
$result = mysqli_query($connect, "SELECT * FROM products");
for ($i = 1; $i <= 8; $i++) {
    // $result = mysqli_query($connect, "SELECT * FROM products");

    $row[$i] =  mysqli_fetch_array($result);

    echo
        '<div class="card mb-3 mr-ml-1" style="width: 270px;">
            <a  href="./phone/add_cart.php?buynow=' . $row[$i][0] . '">
                <img src="./images/' . $row[$i]['image'] . '" class="card-img-top" alt="..." >
            </a>
           
            <div class="card-body">
                    <h5 class="card-title">' . $row[$i]['name'] . '</h5>' .
                    '<div class=row>'.
            '<h5 class="price col-6">' . $row[$i]['price'] . '<sup>đ</sup></h5>' .
            '<h6 class="price col-6"><del>' . $row[$i][2] . '</del></h6>'.
            '</div>'.
            '<p ><small>' . $row[$i]['brief description'] . '</small> </p>
                    
                </div>
                <div class="collapse multi-collapse " id="desphone' . $i . '">
                    <div class="card card-body bg-primary text-light">' . $row[$i][4] . ' </div>
                        
                </div>
            </div>';
}
echo '</div></div>';
?>
<!-- <div class="container " >
    <img src="images/footads.jpg">
</div> -->
<div class="container mt-3" >
        <img src="./images/ads1.jpg" alt=""style="width:100% ">

    </div>
<?php
// xử lý form ở đây -> tự viết :D

$row[10] = null;
echo '<div class=" container mt-2 " id="content">';
echo '<div class="content-card d-flex justify-content-between flex-wrap">';
$result = mysqli_query($connect, "SELECT * FROM products");
for ($i = 1; $i <= 8; $i++) {
    

    $row[$i] =  mysqli_fetch_array($result);

    echo
        '<div class="card mb-3 mr-ml-1" style="width: 270px;">
        <a  href="./phone/add_cart.php?buynow=' . $row[$i][0] . '">
            <img src="./images/' . $row[$i]['image'] . '" class="card-img-top" alt="..." >
        </a>
            <div class="card-body">
                    <h5 class="card-title">' . $row[$i]['name'] . '</h5>' .
                    '<div class=row>'.
            '<h5 class="price col-6">' . $row[$i]['price'] . '<sup>đ</sup></h5>' .
            '<h6 class="price col-6"><del>' . $row[$i][2] . '</del></h6>'.
            '</div>'.
            '<p ><small>' . $row[$i]['brief description'] . '</small> </p>
                    
                </div>
                <div class="collapse multi-collapse " id="desphone' . $i . '">
                    <div class="card card-body bg-primary text-light">' . $row[$i][4] . ' </div>
                        
                </div>
            </div>';
}
echo '</div></div>';
?>