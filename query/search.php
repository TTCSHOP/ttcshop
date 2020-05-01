<?php
    require('../includes/data.php');
    if(isset($_POST['search'])){
        $searchtxt = $_POST['searchtext'];
        if($searchtxt== ''){
            header("Location:./notFound.php");
            exit();
        }
        else{
            $result = mysqli_query($connect,"
            SELECT * FROM products WHERE  name LIKE '%$searchtxt%'
                OR category LIKE '%$searchtxt%';
                 ");
            if($result){
                include('../includes/head.php');     
                $num = mysqli_num_rows($result);
                echo '<div class=" container mt-2 " id="content">';
                echo '<div class="content-card d-flex justify-content-between flex-wrap">';
                if($num >0 && $num <10){
                    for ($j = 1; $j <= $num; $j++) {
                        // $result = mysqli_query($connect, "SELECT * FROM products WHERE id=$i");
                    
                        $row[$j] =  mysqli_fetch_array($result);
                    
                        echo
                        '<div class="card mb-3 mr-ml-1" style="width: 270px;">
                        <a  href="../phone/add_cart.php?buynow=' . $row[$j][0] . '">
                            <img src="../images/' . $row[$j]['image'] . '" class="card-img-top" alt="..." >
                        
                            <div class="card-body">
                                    <h5 class="card-title"style="color:black">' . $row[$j]['name'] . '</h5></a>' .
                                    '<div class=row>'.
                            '<h5 class="price col-6"style="color:#86bd57">' . $row[$j]['price'] . '<sup>đ</sup></h5>' .
                            '<h6 class="price col-6"style="color:red"><del>' . ($row[$j][2]+1000000) . '</del></h6>'.
                            '</div>'.
                            '<p ><small>' . $row[$j]['brief description'] . '</small> </p>
                                    
                                </div>
                               
                            </div>';
                }
                    echo '</div></div>';
                }
                else{
                    header("Location:./notFound.php");
                    exit();
                 }
            }

         }
    }
    
    
   


?>
