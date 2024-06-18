<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['oce'])) {
    $error = array();
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $otp_n = $_POST['otp_n'];
    // Lấy data ss
    if (isset($_SESSION['email']) && $_SESSION['otp']) {
        $email = $_SESSION['email'];
        $otp = $_SESSION['otp'];
//

//
    if ($password != $repass) {

        echo '<script language="javascript">alert("Không trùng password!" echo $otp;); window.location="../Login/repass.html";</script>';
        die();
    } else {
        if ($otp_n != $otp) {
            echo $otp;

            die();
        } else {
            $conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

            mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
            // Dùng isset để kiểm tra Form

            // Tiếp tục xử lý với OTP
            $sql = "UPDATE user SET password=? WHERE email=?";
            $stmt = $conn->prepare($sql);
            //
            if ($stmt !== false) {
                $stmt->bind_param("ss", $password, $email);
                $stmt->execute();
                session_unset();
                session_destroy();
                header('location: ../Login/Login.html');
                exit();
            } else {
                // Xử lý lỗi
                echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
            }
            $conn->close();
        }
    }
}
}