<?php
    include('./includes/data.php');
    $product = mysqli_query($connect, "SELECT * FROM categories");
    $total_product= mysqli_num_rows($product);// tính tổng loại mặt hàng
    
    // tính tổng số tiền đơn hàng p/s: còn chỉnh sửa
    // $order = mysqli_query($connect, "SELECT * FROM orderdetails");

    // tăng trưởng
    // Tháng hiện tại
    $total = mysqli_query($connect,"
        SELECT SUM(totalMoney)
        FROM orders o
        JOIN orderdetails od
        ON o.id = od.id
        WHERE MONTH(o.dateModified) = 
                (SELECT MONTH(MAX(o.dateModified))
                FROM orders)
        AND YEAR(o.dateModified) = 
                (SELECT YEAR(MAX(o.dateModified))
                FROM orders)
    ");
    $row = mysqli_fetch_array($total);
    $total_Money = $row['0'];
//    lãi
    $lai = $total_Money - $total_Money*0.7;
    
?>