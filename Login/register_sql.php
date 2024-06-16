<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['xacnhan'])){
    $error=array();
    $fullname =$_POST['fullname'];
    $phone =$_POST['phone'];
    $address = $_POST['address'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $repeat =$_POST['repeat'];
    if($password != $repeat){
        echo '<script language="javascript">alert("Không trùng password!"); window.location="register.html";</script>';
        die();
        
       
    } else {
        $conn=  mysqli_connect('localhost','root','') or die("Lỗi kết nối");
 
        mysqli_select_db($conn,'webhangban') or die('Not find DataBase');
        // Dùng isset để kiểm tra Form
        
    
    // Kiểm tra username hoặc email trong CSDL có trùng không
    $sql = "SELECT * FROM user WHERE email = '$email'";
    
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
    
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
    // Sử dụng javascript để thông báo
    echo '<script language="javascript">alert("Email đã tồn tại"); window.location="register.html";</script>';
    // Dừng chương trình
    die ();
    } else {
        $sql = "INSERT INTO user (fullname, email, phone_number, address, password) VALUES ('$fullname','$email','$phone','$address','$password')";
    
        if($conn->query($sql)){ header("location: ../index.html"); exit();}
        else { 
            header("location:../Login/register.html");
            exit();
        }
       
    }
    }
    
    }

  
?>