<?php
session_start();
require_once "./database_function.php";
$conn = connectDatabase();

// Kiểm tra nếu product_key được gửi từ Ajax request
if (isset($_POST['product_key'])) {
    $product_key = $_POST['product_key'];

    // Xóa sản phẩm khỏi giỏ hàng
    unset($_SESSION['cart'][$product_key]);

    // Tính toán lại tổng tiền
    $total_price = 0;
    foreach ($_SESSION['cart'] as $key => $item) {
        if (isset($item['product_id'], $item['quantity'])) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];

            // Thực hiện truy vấn để lấy giá của sản phẩm từ cơ sở dữ liệu
            $query = "SELECT price FROM Product WHERE id = '$product_id'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $total_price += $row['price'] * $quantity;
                }
            }
        }
    }

    // Gửi tổng tiền mới về cho trang web
    echo number_format($total_price, 0, ',', '.') . '₫';
    exit();
}
?>
