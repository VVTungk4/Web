<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'webhangban');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_info'])) {
    echo "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.";
    exit();
}

$user_id = $_SESSION['user_info']['id'];

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

        // Tạo hoặc lấy giỏ hàng của người dùng
        $cart_query = "SELECT id FROM carts WHERE user_id = '$user_id'";
        $cart_result = $conn->query($cart_query);

        if ($cart_result->num_rows > 0) {
            $cart_row = $cart_result->fetch_assoc();
            $cart_id = $cart_row['id'];
        } else {
            $conn->query("INSERT INTO carts (user_id) VALUES ('$user_id')");
            $cart_id = $conn->insert_id;
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $item_query = "SELECT * FROM cart_items WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
        $item_result = $conn->query($item_query);

        if ($item_result->num_rows > 0) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $update_query = "UPDATE cart_items SET quantity = quantity + '$quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
            if ($conn->query($update_query) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $insert_query = "INSERT INTO cart_items (cart_id, product_id, size_id, color_id, quantity) VALUES ('$cart_id', '$product_id', '$size_id', '$color_id', '$quantity')";
            if ($conn->query($insert_query) === TRUE) {
                echo "success";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }
        exit();
    }
}

$conn->close();
