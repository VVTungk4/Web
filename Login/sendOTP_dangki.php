<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
if (isset($_POST['oki'])) {
    $error = array();

    $email = $_POST['email'];
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

    if ($result->num_rows == 0) {
        //
        try {
            $email = $_POST['email'];
            //Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tuantang3433@gmail.com';
            $mail->Password = 'cmvhzlefsotglrvr';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Người nhận
            $mail->setFrom('tuantang3433@gmail.com', 'SONIC');
            $mail->addAddress($email, 'Khách hàng');

            //Nội dung email
            $otp = rand(10000, 99999); // Tạo mã OTP ngẫu nhiên
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body    = 'Your OTP code is: ' . $otp;

            //Gửi email
            $mail->send();

            //Lưu OTP vào ss
            if(!$mail->send()) {
                error_log('Mail could not be sent.');
                error_log('Mailer Error: ' . $mail->ErrorInfo);
            } else {
                error_log('Mail sent.');
                $_SESSION['email'] = $email;
                $_SESSION['otp'] = $otp;
                error_log('OTP saved to session: ' . $_SESSION['otp']);
            }

            //...

            header('location: ../Login/register.php');
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        header("Location: ../Login/Login.html?error=Email đã được sử dụng!");
        exit;
    }
    $conn->close();
    //
}
//
?>