<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "./database_function.php";
    $conn = connectDatabase();

    if (isset($_SESSION['user_info'])) {
        $user_id = $_SESSION['user_info']['id'];
        $fullname = $_SESSION['billing_address_full_name'];
        $phone = $_SESSION['billing_address_phone'];
        $address = $_SESSION['billing_address_address'];
        $note = isset($_SESSION['note']) ? $_SESSION['note'] : '';
        $order_date = date("Y-m-d");
        $status = 0;
        $total_money = isset($_SESSION['total_money']) ? $_SESSION['total_money'] : 0;
    
        $query_insert_bill = "INSERT INTO Orders (user_id, fullname, phone_number, address, note, order_date, status, total_money)
        VALUES ('$user_id', '$fullname', '$phone', '$address', '$note', '$order_date', '$status', '$total_money')";
    
        if (mysqli_query($conn, $query_insert_bill)) {
    
            $order_id = mysqli_insert_id($conn);
    
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                // Lặp qua từng sản phẩm trong giỏ hàng
                foreach ($_SESSION['cart'] as $product_key => $item) {
                    $product_id = $item['product_id'];
                    $size_id = $item['size_id'];
                    $color_id = $item['color_id'];
                    $quantity = $item['quantity'];
            

                    echo $product_id;
                    // Truy vấn để lấy số lượng hiện tại trong kho từ bảng product_size_color
                    $query_stock = "SELECT quantity FROM product_size_color WHERE product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
                    $result_stock = mysqli_query($conn, $query_stock);
                    
                    if (empty($product_id) || empty($size_id) || empty($color_id)) {
                        // Xử lý khi một trong các giá trị rỗng
                        echo "Có sản phẩm không có đầy đủ thông tin (product_id, size_id, color_id).";
                        continue; // Bỏ qua sản phẩm này và chuyển sang sản phẩm tiếp theo
                    }

                    if ($result_stock && mysqli_num_rows($result_stock) > 0) {
                        $row_stock = mysqli_fetch_assoc($result_stock);
                        $current_stock = $row_stock['quantity'];
            
                        // Kiểm tra số lượng tồn kho trước khi cập nhật
                        if ($current_stock >= $quantity) {
                            // Tính toán số lượng mới trong kho
                            $new_stock = $current_stock - $quantity;
            
                            // Cập nhật số lượng mới vào bảng product_size_color
                            $update_stock_query = "UPDATE product_size_color SET quantity = $new_stock WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
                            mysqli_query($conn, $update_stock_query);
                        } else {
                            // Xử lý khi số lượng tồn kho không đủ (có thể làm gì đó ở đây)
                            echo "Sản phẩm $product_id - Size $size_id - Color $color_id không đủ hàng trong kho.";
                            // Nếu không đủ hàng, bạn có thể xử lý theo yêu cầu của bạn.
                        }
                    } else {
                        // Xử lý khi không tìm thấy số lượng tồn kho (có thể làm gì đó ở đây)
                        echo "Không tìm thấy thông tin số lượng tồn kho cho sản phẩm $product_id - Size $size_id - Color $color_id.";
                        // Nếu không tìm thấy, bạn có thể xử lý theo yêu cầu của bạn.
                    }
            
                    // Sau khi xử lý, bạn có thể chèn dữ liệu vào bảng Order-Detail như bạn đã làm.
                    // Chèn dữ liệu vào bảng Order-Detail
                    $price = @$item['price'];
                    $total_money = $price * $quantity;
                    $insert_query = "INSERT INTO `Order_Details` (order_id, product_id, price, num, total_money, size, color) 
                                     VALUES ('$order_id', '$product_id', '$price', '$quantity', '$total_money', '$size', '$color')";
                    mysqli_query($conn, $insert_query);
                }
            
                // Xóa các session sau khi xử lý đơn hàng
                unset($_SESSION['cart']);
                unset($_SESSION['total_price']);
                unset($_SESSION['billing_address_address']);
                unset($_SESSION['billing_address_phone']);
                unset($_SESSION['billing_address_full_name']);
                
                header("Location: ../index.html");
                // Đóng kết nối CSDL
                $conn->close();


            }
    
    
        }
    }
    else{
        $fullname = $_SESSION['billing_address_full_name'];
        $phone = $_SESSION['billing_address_phone'];
        $address = $_SESSION['billing_address_address'];
        $note = isset($_SESSION['note']) ? $_SESSION['note'] : '';
        $order_date = date("Y-m-d");
        $status = 0;
        $total_money = isset($_SESSION['total_money']) ? $_SESSION['total_money'] : 0;
    
        $query_insert_bill = "INSERT INTO Orders (fullname, phone_number, address, note, order_date, status, total_money
        )
        VALUES ('$fullname', '$phone', '$address', '$note', '$order_date', '$status', '$total_money')";
    
        if (mysqli_query($conn, $query_insert_bill)) {
    
            $order_id = mysqli_insert_id($conn);
    
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                // Lặp qua từng sản phẩm trong giỏ hàng
                foreach ($_SESSION['cart'] as $product_key => $item) {
                    $product_id = $item['product_id'];
                    $size_id = $item['size_id'];
                    $color_id = $item['color_id'];
                    $quantity = $item['quantity'];
            

                    echo $product_id;
                    // Truy vấn để lấy số lượng hiện tại trong kho từ bảng product_size_color
                    $query_stock = "SELECT quantity FROM product_size_color WHERE product_id = '$product_id' AND size_id = '$size_id' AND color_id = '$color_id'";
                    $result_stock = mysqli_query($conn, $query_stock);
                    
                    if (empty($product_id) || empty($size_id) || empty($color_id)) {
                        // Xử lý khi một trong các giá trị rỗng
                        echo "Có sản phẩm không có đầy đủ thông tin (product_id, size_id, color_id).";
                        continue; // Bỏ qua sản phẩm này và chuyển sang sản phẩm tiếp theo
                    }

                    if ($result_stock && mysqli_num_rows($result_stock) > 0) {
                        $row_stock = mysqli_fetch_assoc($result_stock);
                        $current_stock = $row_stock['quantity'];
            
                        // Kiểm tra số lượng tồn kho trước khi cập nhật
                        if ($current_stock >= $quantity) {
                            // Tính toán số lượng mới trong kho
                            $new_stock = $current_stock - $quantity;
            
                            // Cập nhật số lượng mới vào bảng product_size_color
                            $update_stock_query = "UPDATE product_size_color SET quantity = $new_stock WHERE product_id = $product_id AND size_id = $size_id AND color_id = $color_id";
                            mysqli_query($conn, $update_stock_query);
                        } else {
                            // Xử lý khi số lượng tồn kho không đủ (có thể làm gì đó ở đây)
                            echo "Sản phẩm $product_id - Size $size_id - Color $color_id không đủ hàng trong kho.";
                            // Nếu không đủ hàng, bạn có thể xử lý theo yêu cầu của bạn.
                        }
                    } else {
                        // Xử lý khi không tìm thấy số lượng tồn kho (có thể làm gì đó ở đây)
                        echo "Không tìm thấy thông tin số lượng tồn kho cho sản phẩm $product_id - Size $size_id - Color $color_id.";
                        // Nếu không tìm thấy, bạn có thể xử lý theo yêu cầu của bạn.
                    }
            
                    // Sau khi xử lý, bạn có thể chèn dữ liệu vào bảng Order-Detail như bạn đã làm.
                    // Chèn dữ liệu vào bảng Order-Detail
                    $price = @$item['price'];
                    $total_money = $price * $quantity;
                    $insert_query = "INSERT INTO `Order_Details` (order_id, product_id, price, num, total_money, size, color) 
                                     VALUES ('$order_id', '$product_id', '$price', '$quantity', '$total_money', '$size', '$color')";
                    mysqli_query($conn, $insert_query);
                }
            
                // Xóa các session sau khi xử lý đơn hàng
                unset($_SESSION['cart']);
                unset($_SESSION['total_price']);
                unset($_SESSION['billing_address_address']);
                unset($_SESSION['billing_address_phone']);
                unset($_SESSION['billing_address_full_name']);
                
                header("Location: ../index.html");
                // Đóng kết nối CSDL
                $conn->close();


            }
    
    
        }
    }

    
    
} else {
    echo "Error: POST method required!";
}
?>
