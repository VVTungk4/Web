<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Thêm hàm này
function updateProductQuantity($conn, $product_id, $size_id, $color_id, $quantity) {
    $update_query = "UPDATE product_size_color 
                     SET quantity = quantity - $quantity 
                     WHERE product_id = $product_id 
                     AND size_id = $size_id 
                     AND color_id = $color_id";
    return mysqli_query($conn, $update_query);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "./database_function.php";
    $conn = connectDatabase();

    if (isset($_SESSION['user_info'])) {
        $user_id = $_SESSION['user_info']['id'];
        $email =  $_SESSION['user_info']['email'];
        $fullname = $_SESSION['billing_address_full_name'];
        $phone = $_SESSION['billing_address_phone'];
        $address = $_SESSION['billing_address_address'];
        $note = $_SESSION['billing_address_note'];
        $order_date = date("Y-m-d");
        $status = 0;
        $total_price = $_SESSION['total_price'];

        $query_insert_bill = "INSERT INTO Orders (user_id, fullname, email, phone_number, address, note, order_date, status, total_money
        )
        VALUES ('$user_id', '$fullname', '$email', '$phone', '$address', '$note', '$order_date', '$status', '$total_price')";

        if (mysqli_query($conn, $query_insert_bill)) {

            $order_id = mysqli_insert_id($conn);
            //Lưu order_detail sử dụng DB
            // 1.Mở giỏ hàng lấy các data sản phẩm
            $sql_id_carts = "SELECT id FROM carts WHERE user_id = $user_id";
            $result = mysqli_query($conn, $sql_id_carts);
            if ($row = mysqli_fetch_assoc($result)) {
                $id_cart = $row['id'];
                //1.Lấy con vợ order_id ở bảng order_detail = id ở bảng order
                //1.1 Lấy con vợ id ở bảng order đã
                $sql = "SELECT MAX(id) AS max_id FROM orders";
                $result_od = mysqli_query($conn, $sql);
                if ($result_od->num_rows > 0) {
                    // Lấy giá trị ID lớn nhất từ kết quả truy vấn
                    $row = $result_od->fetch_assoc();
                    $order_id = $row['max_id'];
                    // Lấy dữ liệu từ bảng cart_items
                    $query = "SELECT product_id, size_id, color_id, quantity FROM cart_items where cart_id =  $id_cart ";
                    $results = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($results)) {
                        $product_id = $row['product_id'];
                        $size_id = $row['size_id'];
                        $color_id = $row['color_id'];
                        $quantity = $row['quantity'];
                        // Chuyển đổi dữ liệu SIZE
                        if ($size_id == 1) {
                            $size = "S";
                        };
                        if ($size_id == 2) {
                            $size = "M";
                        };
                        if ($size_id == 3) {
                            $size = "L";
                        };
                        if ($size_id == 4) {
                            $size = "XL";
                        };
                        //Chuyển đổi data COLOR
                        if ($color_id == 1) {
                            $color = "Red";
                        };
                        if ($color_id == 2) {
                            $color = "Blue";
                        };
                        if ($color_id == 3) {
                            $color = "Black";
                        };

                        // Lấy giá từ bảng products
                        $price_query = "SELECT after_discount FROM product WHERE id = $product_id";
                        $price_result = mysqli_query($conn, $price_query);
                        $price_row = mysqli_fetch_assoc($price_result);
                        $price = $price_row['after_discount'];

                        // Tính total_money
                        $total_money = $quantity * $price;
                        // Test DATA
                        // echo $product_id,"-",$size_id,"-", $color_id,"-", $quantity,"-", $total_money,"-",$order_id;
                        // echo "----------------------";
                        // Lưu vào bảng order_details
                        $insert_query = "INSERT INTO order_details (order_id, product_id, size, color, num, price, total_money)
                        VALUES ('$order_id','$product_id', '$size', '$color', '$quantity', '$price', '$total_money')";
                        if (mysqli_query($conn, $insert_query)) {
                            updateProductQuantity($conn, $product_id, $size_id, $color_id, $quantity);
                            header("location: ../QLTK/LS_muahang.php");
                        }
                    }
                }
            }
        } else {
            echo "Error: POST method required!";
        }
        //Xóa giỏ hàng
        // Xóa giỏ hàng
        $delete_carts_query = "DELETE FROM carts WHERE user_id = $user_id";
        mysqli_query($conn, $delete_carts_query);
        $delete_cart_items_query = "DELETE FROM cart_items WHERE cart_id = $id_cart";
        mysqli_query($conn, $delete_cart_items_query);
        // Đóng kết nối
        mysqli_close($conn);
    }
}
