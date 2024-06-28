<?php
session_start(); // Bắt đầu phiên làm việc
header('Content-Type: text/html; charset=utf-8');
if (isset($_GET['q'])) { // Nếu tồn tại $_POST['suataikhoan']

   
    $id = $_GET['q'];
    //
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    $sql = "UPDATE user SET deleted = 0 WHERE id = $id";
    $conn->query($sql);
}
?>