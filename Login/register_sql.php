<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['signup'])) {
    //
    if (isset($_SESSION['email']) && $_SESSION['otp']) {
        $email = $_SESSION['email'];
        $otp = $_SESSION['otp'];
        //
        //
        $error = array();
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $repeat = $_POST['repeat'];
        $otp_n = $_POST['otp_n'];
        try {
            if ($password != $repeat) {
                echo '<script language="javascript">alert("Không trùng password!"); window.location="register.php";</script>';
                die();
            } else if (($otp_n != $otp)) {
                echo '<script language="javascript">alert("Sai OTP!"); window.location="email_dangki.php";</script>';
                die();
            } else {
                $conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

                mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
                // Dùng isset để kiểm tra Form

                $sql = "INSERT INTO user (fullname, email, phone_number, address, password) VALUES ('$fullname','$email','$phone','$address','$password')";

                if ($conn->query($sql)) {
                    session_unset();
                    session_destroy();
                    header("location: ../Login/Login.php");
                    exit();
                } else {
                    session_unset();
                    session_destroy();
                    header("location:../Login/register.php");
                    exit();
                }
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
