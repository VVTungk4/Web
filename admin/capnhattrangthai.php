<?php
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    $sql = "UPDATE orders SET status = 1 WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['q']);
    $stmt->execute();
    $stmt->get_result();
    if ($stmt->get_result()) {
        echo '<script language="javascript">alert("Cập nhật thành công! Đơn Hàng Đang Chuẩn Bị");</script>';
        exit();
    } else {
        echo '<script language="javascript">alert("Có lỗi xảy ra, vui lòng thử lại!");</script>';
        exit();
    }


?>