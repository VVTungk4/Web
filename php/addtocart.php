<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'webhangban');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem product_id, size_id và color_id có tồn tại trong POST không
if (isset($_POST['product_id']) && isset($_POST['size_id']) && isset($_POST['color_id'])) {
    // Lấy product_id, size_id và color_id từ POST
    $product_id = $_POST['product_id'];
    $size_id = $_POST['size_id'];
    $color_id = $_POST['color_id'];

    // Kiểm tra xem số lượng sản phẩm được chọn
    if (isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0) {
        // Lấy số lượng sản phẩm từ form
        $quantity = intval($_POST['quantity']); // Chuyển đổi thành số nguyên

        // Thêm sản phẩm vào giỏ hàng của người dùng
        if (!isset($_SESSION['cart'])) {
            // Nếu giỏ hàng chưa tồn tại, khởi tạo giỏ hàng
            $_SESSION['cart'] = array();
        }

        // Tạo một key duy nhất cho từng sự kết hợp của product_id, size_id và color_id
        $product_key = $product_id . '_' . $size_id . '_' . $color_id;

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (array_key_exists($product_key, $_SESSION['cart'])) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cộng thêm số lượng mới vào số lượng đã có
            $_SESSION['cart'][$product_key]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $_SESSION['cart'][$product_key] = array(
                'product_id' => $product_id,
                'size_id' => $size_id,
                'color_id' => $color_id,
                'quantity' => $quantity
            );
        }

        // Trả về kết quả thành công
        echo "success";
        exit();
    }
}

$conn->close();
?>
