<?php

$conn = new mysqli('localhost', 'root', '', 'webbanhang1');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$product_id = $_GET['product_id'];
$size_id = $_GET['size_id'];
$color_id = $_GET['color_id'];

$sql = "SELECT quantity FROM product_size_color WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
$result = $conn->query($sql);
$quantity = $result->fetch_assoc()['quantity'];

echo $quantity;

$conn->close();
