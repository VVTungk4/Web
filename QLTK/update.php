<?php session_start(); // Bắt đầu phiên làm việc 
?>
<?php
if (isset($_POST['update'])) { //neu ton tai $_post['xacnhan']

    $error = array();
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date('Y-m-d');
    echo $date;
    //
    //
    $conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    //
    if (!empty($fullname) && !empty($email) && !empty($phone) && !empty($address) && !empty($password) && !empty($date)) {
        $sql = "UPDATE user SET fullname=?, phone_number=?, address=?, password=?, updated_at=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        //
        if ($stmt !== false) {
            $stmt->bind_param("ssssss", $fullname, $phone, $address, $password,$date, $email);
            $stmt->execute();
        } else {
            // Xử lý lỗi
            echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
        }

        if ($stmt->affected_rows > 0) {
         header("localhost:../QLTK/QLTK.php");
         exit();
        } else {
            echo "Lỗi cập nhật bản ghi: ". $conn->error;
        }
    }
}
?>