<?php
//xóa data rác lúc thêm hàng mà ko lưu
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
   
    $sql = "DELETE FROM order_details WHERE num = 0";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>