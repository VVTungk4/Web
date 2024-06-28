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

    // Kiểm tra số lượng sản phẩm được chọn
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
            // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $item_row = $item_result->fetch_assoc();
            $current_quantity_in_cart = $item_row['quantity'];

            // Lấy số lượng còn lại của sản phẩm từ bảng product_size_color
            $quantity_available_query = "SELECT quantity FROM product_size_color WHERE product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
            $quantity_available_result = $conn->query($quantity_available_query);

            if ($quantity_available_result && $quantity_available_result->num_rows > 0) {
                $quantity_available_row = $quantity_available_result->fetch_assoc();
                $quantity_available = $quantity_available_row['quantity'];

                $quantity_extra = $quantity_available - $current_quantity_in_cart;

                // Kiểm tra tổng số lượng trong giỏ hàng và số lượng người dùng muốn thêm vào
                if ($quantity + $current_quantity_in_cart <= $quantity_available) {
                    // Cập nhật số lượng trong giỏ hàng
                    $update_query = "UPDATE cart_items SET quantity = quantity + '$quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
                    if ($conn->query($update_query) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    // Cập nhật số lượng trong giỏ hàng với số lượng tối đa có thể thêm được
                    $update_query = "UPDATE cart_items SET quantity = quantity + '$quantity_extra' WHERE cart_id = '$cart_id' AND product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
                    if ($conn->query($update_query) === TRUE) {
                        echo "Bạn đã thêm quá số lượng trong giỏ hàng, hãy kiểm tra giỏ hàng của bạn.";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
            } else {
                echo "Không tìm thấy thông tin sản phẩm.";
            }
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào
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
