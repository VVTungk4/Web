<?php
//
session_start();

if (isset($_POST['timkiem'])) { //neu ton tai $_post['search']


    $error = array();

    $search = $_POST['tt_timkiem'];

    //----------------------------
    if (isset($search)) {
        $conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

        mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');

        // Chuẩn bị câu lệnh SQL để ngăn chặn SQL injection
        // Chuẩn bị câu lệnh SQL để ngăn chặn SQL injection
        //Tìm kiếm like: lỗi sml----------------------------------------
        // $search = '%' . $search . '%'; // Bổ sung ký tự % cho biến search
        // $sql = "SELECT * FROM product WHERE title LIKE '$search'";

        // // Thực hiện câu lệnh
        // $result = $conn->query($sql);
        //---------------------------------------------------------------
        //Tìm kiếm chính xác
        // Bổ sung ký tự % cho biến search
        $sql = "SELECT * FROM product WHERE title = ?";

        // Thực hiện câu lệnh
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $search); // Sử dụng bind_param để tránh SQL injection
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Lấy dữ liệu
            $row = $result->fetch_assoc();
            while ($row = $result->fetch_assoc()) {
                // Lưu giá trị vào session
                $_SESSION['id'] = $row['id'];
            }
            header('location:product_search.php');
            exit();
        } else {
            // Mật khẩu không đúng, hiển thị thông báo lỗi

            header("location:product_emty.php");
            exit();
        }
        $conn->close();
    }
}
