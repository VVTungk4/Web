<?php
//
session_start();

if (isset($_POST['xacnhan'])) { //neu ton tai $_post['xacnhan']


    $error = array();

    $email = $_POST['email'];

    $password = $_POST['password'];
    //----------------------------
    if (isset($email)) {
        $conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

        mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    }
    // Chuẩn bị câu lệnh SQL để ngăn chặn SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Thực hiện câu lệnh
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy dữ liệu
        $row = $result->fetch_assoc();

        // So sánh mật khẩu trực tiếp (không an toàn)
        if ($row['password'] == $password && $row['role_id'] == 1) {

            header('location: ../admin/admin.html');
            exit();
        } else if (($row["email"] == $email) && $row['password'] == $password && $row['role_id'] == 2) {
            $_SESSION['user_info'] = array(
                'id' => $row['id'],
                'fullname' => $row['fullname'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
                'address' => $row['address'],
                'password' => $row['password'],
                'created_at'=> $row['created_at'],
              
            );
            header('location:../index.html');
            exit();
        } else {
            // Mật khẩu không đúng, hiển thị thông báo lỗi

            header("location:../Login/Login.html?error=Sai mật khẩu!");
            exit();
        }
    } else {

        header("Location: ../Login/Login.html?error=Không tìm thấy tài khoản!");
        exit;
    }
   
    $conn->close();
}
?>
