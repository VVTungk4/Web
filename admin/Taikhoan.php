<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['themtaikhoan'])){
    $error=array();
    $fullname =$_POST['fullname'];
    $phone =$_POST['phone_number'];
    $address = $_POST['address'];
    $email =$_POST['email'];
    $role=$_POST['role_id'];
    $password =$_POST['password'];
   
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
    echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.html";</script>';
    // Dừng chương trình
    die ();
    } else {
        $sql = "INSERT INTO user (fullname, email, phone_number, address, password,role_id) VALUES ('$fullname','$email','$phone','$address','$password','$role')";
    
        if($conn->query($sql)){
            echo '<script language="javascript">alert("Thêm mới thành công!"); window.location="admin.html";</script>';
            exit();
        } else { 
            echo '<script language="javascript">alert("Có lỗi xảy ra, vui lòng thử lại!")";</script>';
            exit();
        }
    }
}
?>