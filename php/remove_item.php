<?php
session_start();

if (!isset($_SESSION['user_info']['id']) || !isset($_POST['item_id'])) {
    echo "Dữ liệu không hợp lệ.";
    exit();
}

$user_id = $_SESSION['user_info']['id'];
$item_id = $_POST['item_id'];

$conn = new mysqli('localhost', 'root', '', 'webhangban');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xóa sản phẩm khỏi giỏ hàng
$delete_query = "DELETE cart_items FROM cart_items 
                 JOIN carts ON cart_items.cart_id = carts.id 
                 WHERE cart_items.id = '$item_id' AND carts.user_id = '$user_id'";

if ($conn->query($delete_query) === TRUE) {
    echo "success";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
