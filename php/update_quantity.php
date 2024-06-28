<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_info'])) {
    echo json_encode(array('success' => false, 'message' => 'Bạn cần đăng nhập'));
    exit();
}

require_once 'database_function.php';

$user_id = $_SESSION['user_info']['id'];
$item_id = $_POST['item_id'];
$newQuantity = $_POST['new_quantity'];

$conn = connectDatabase();

// Fetch current item details
$query = "SELECT ci.quantity, ci.size_id, ci.color_id, p.after_discount
          FROM cart_items ci
          JOIN product p ON ci.product_id = p.id
          WHERE ci.id = '$item_id' AND ci.cart_id IN (SELECT id FROM carts WHERE user_id = '$user_id')";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Update quantity in the database
    $update_query = "UPDATE cart_items SET quantity = '$newQuantity' WHERE id = '$item_id'";
    if ($conn->query($update_query) === TRUE) {
        // Calculate new total price for the item
        $new_total = $row['after_discount'] * $newQuantity;

        echo json_encode(array('success' => true, 'new_total' => $new_total));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Lỗi cập nhật số lượng.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.'));
}

$conn->close();
