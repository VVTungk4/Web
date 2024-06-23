<?php
// Bắt đầu phiên làm việc
session_start();

// Xóa tất cả các biến phiên làm việc
session_unset();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập
header("Location: Login.php");
exit;
?>
