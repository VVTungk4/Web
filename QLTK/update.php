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

    //
    //
    $conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    //
    if (!empty($fullname) && !empty($email) && !empty($phone) && !empty($address) && !empty($password)) {
        $sql = "UPDATE user SET fullname=?, phone_number=?, address=?, password=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        //
        if ($stmt !== false) {
            $stmt->bind_param("sssss", $fullname, $phone, $address, $password, $email);
            $stmt->execute();
        } else {
            // Xử lý lỗi
            echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
        }

        if ($stmt->affected_rows > 0) {
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);

            // Thực hiện câu lệnh
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Lấy dữ liệu
                $row = $result->fetch_assoc();
                $_SESSION['user_info'] = array(
                    'fullname' => $row['fullname'],
                    'email' => $row['email'],
                    'phone_number' => $row['phone_number'],
                    'address' => $row['address'],
                    'password' => $row['password'],
                    'created_at' => $row['created_at'],

                );
                header("location:QLTK.php");
                exit();
            } else {
                echo "Lỗi cập nhật bản ghi: " . $conn->error;
            }
        } else {
            header("location:QLTK.php");
        }
    }
}
?>