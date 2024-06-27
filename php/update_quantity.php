<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_info'])) {
    echo json_encode(array('success' => false, 'message' => 'Bạn cần đăng nhập để sử dụng chức năng giỏ hàng.'));
    exit();
}

require_once 'database_function.php';

$user_id = $_SESSION['user_info']['id'];
$item_id = $_POST['item_id'];
$change_type = $_POST['change_type']; // 'increase' or 'decrease'

$conn = connectDatabase();

// Fetch current item quantity from database
$query = "SELECT quantity FROM cart_items WHERE id = '$item_id' AND cart_id IN (SELECT id FROM carts WHERE user_id = '$user_id')";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $currentQuantity = $row['quantity'];

    if ($change_type === 'increase') {
        $newQuantity = $currentQuantity + 1;
    } elseif ($change_type === 'decrease' && $currentQuantity > 1) {
        $newQuantity = $currentQuantity - 1;
    } else {
        echo json_encode(array('success' => false, 'message' => 'Không thể giảm số lượng.'));
        exit();
    }

    // Update quantity in the database
    $update_query = "UPDATE cart_items SET quantity = '$newQuantity' WHERE id = '$item_id'";
    if ($conn->query($update_query) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Lỗi cập nhật số lượng.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.'));
}

$conn->close();
