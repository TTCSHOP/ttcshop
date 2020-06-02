<?php
require('../includes/data.php');

if (isset($_POST['search'])) {
    $searchtxt = $_POST['searchtext'];
    if ($searchtxt == '') {
        header("Location:./notFound.php");
        exit();
    } else {
        $result_pr = mysqli_query($connect, "
            SELECT * FROM products WHERE  (name LIKE '%$searchtxt%'
                OR category LIKE '%$searchtxt%') AND quantityInStock>=0;
                 ");
        if ($result_pr) {
            $num = mysqli_num_rows($result_pr);
            if ($num > 0 && $num < 10) {
                include('../includes/head.php');
                require('../includes/advertisement.php');
                echo '<div class=" container mt-5 " id="content">';
                echo '<div class="content-card d-flex justify-content-between flex-wrap">';
                
                for ($j = 1; $j <= $num; $j++) {
                    // $result = mysqli_query($connect, "SELECT * FROM products WHERE id=$i");

                    $row[$j] =  mysqli_fetch_array($result_pr);
                   
                    echo
                        '<div class="card mb-3 mr-ml-1" style="width: 270px;">
                        <a  href="../phone/add_cart.php?buynow=' . $row[$j][0] . '">
                            <img src="../images/' . $row[$j]['image'] . '" class="card-img-top" alt="..." >
                        
                            <div class="card-body">
                                    <h5 class="card-title"style="color:black">' . $row[$j]['name'] . '</h5></a>' .
                            '<div class=row>' .
                            '<h5 class="price col-6"style="color:#86bd57">' . floor($row[$j]['price'] / 1000000) . '.' .   $row[$j]['price'] % 1000000 / 1000 . '.' . '000'  . '<sup>đ</sup></h5>' .
                            '<h6 class="price col-6"style="color:red"><del>' . floor($row[$j]['price'] / 1000000 + 2)  . '.' .   $row[$j]['price'] % 1000000 / 1000 . '.' . '000' . '</del></h6>' .
                            '</div>' .
                            '<p ><small>' . $row[$j]['brief description'] . '</small> </p>
                                    
                                </div>
                               
                            </div>';
                }
                echo '</div></div>';
               
            } 
        }
            else {
                header("Location:./notFound.php");
                exit();
            }
            include('../includes/foot.php');
        // }
    }
}
