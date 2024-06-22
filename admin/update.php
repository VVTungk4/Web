<?php
session_start(); // Bắt đầu phiên làm việc
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['suataikhoan'])) { // Nếu tồn tại $_POST['suataikhoan']

    $error = array();
    $fullname = $_POST['fullname1'];
    $phone = $_POST['phone_number1'];
    $address = $_POST['address1'];
    $email = $_POST['email1'];
    $password = $_POST['password1'];
    $role_id = $_POST['role_id1'];
    $id = $_POST['userid'];
    //
    //
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    $sql = "UPDATE user SET fullname='$fullname', email='$email', phone_number='$phone', address='$address', password='$password', role_id='$role_id' WHERE id='$id'";

    if ($conn->query($sql)) {
        echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="admin.php";</script>';
        exit();
    } else {
        echo '<script language="javascript">alert("Có lỗi xảy ra, vui lòng thử lại!");</script>';
        exit();
    }
}
?>
