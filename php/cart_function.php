<?php
session_start();
require_once "./database_function.php";
$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $size_id = $_POST['size_id'];
    $color_id = $_POST['color_id'];
    $quantity = $_POST['quantity']; // Chuyển đổi thành số nguyên để tránh lỗi định dạng

    // Tạo một key duy nhất cho từng sự kết hợp của product_id, size_id và color_id
    $product_key = $product_id . '_' . $size_id . '_' . $color_id;

    if ($quantity == 0) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION['cart'][$product_key]);
    } else {
        // Thêm hoặc cập nhật sản phẩm trong giỏ hàng
        $_SESSION['cart'][$product_key] = [
            'product_id' => $product_id,
            'size_id' => $size_id,
            'color_id' => $color_id,
            'quantity' => $quantity,
        ];
    }

    // Tính lại tổng giá trị
    $total_price = calculateTotalPrice($_SESSION['cart']);

    // Trả về phản hồi JSON với tổng giá trị đã cập nhật
    echo json_encode(['total_price' => $total_price]);
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Method Not Allowed";
}

$conn->close();

function calculateTotalPrice($cart) {
    $total_price = 0;
    foreach ($cart as $item) {
        $total_price += $item['quantity'] * getProductPrice($item['product_id']);
    }
    return $total_price;
}

function getProductPrice($product_id) {
    require_once "./database_function.php";
    $conn = connectDatabase();
    $query = "SELECT after_discount FROM Product WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['after_discount'];
    } else {
        // Trường hợp không tìm thấy giá của sản phẩm
        return 0;
    }
}
?>
