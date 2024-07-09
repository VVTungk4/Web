<?php
   
if(isset($_POST['capnhatsanpham'])){
    $error=array();
    $id=$_POST['masp'];
    $title =$_POST['title'];
    $price =$_POST['price'];
    $discount=$_POST['discount'];
    $description =$_POST['description'];
    $thumbnail =$_FILES['image']['name'];
    $trangthai=$_POST['trangthai'];
    //ảnh 
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (file_exists($target_file)) {
        echo '<script language="javascript">alert("Xin lỗi, ảnh đã tồn tại."); window.location="admin.php";</script>';
      }
      else if($thumbnail==null) {
        $conn=  mysqli_connect('localhost','root','') or die("Lỗi kết nối");
        mysqli_select_db($conn,'webhangban') or die('Not find DataBase');
        $capnhatsanpham = "UPDATE product SET title = '$title',
         deleted = $trangthai, price = $price, 
         discount = $discount,
         description = '$description' WHERE id = $id";;
    
       
        if ( $conn->query($capnhatsanpham)) {
            echo '<script language="javascript">alert("Sửa thành công!"); window.location="admin.php";</script>';
            exit();
        } else {
            echo '<script language="javascript">alert("Có lỗi xảy ra, vui lòng thử lại!");</script>';
            exit();
        }         
       
}
else{
    move_uploaded_file($_FILES['image']['tmp_name'],$target_file) ;
    $conn=  mysqli_connect('localhost','root','') or die("Lỗi kết nối");
    mysqli_select_db($conn,'webhangban') or die('Not find DataBase');
    $capnhatsanpham = "UPDATE product SET title = '$title',
     deleted = $trangthai, price = $price, 
     discount = $discount, thumbnail = '$target_file',
     description = '$description' WHERE id = $id";;

   
    if ( $conn->query($capnhatsanpham)) {
        echo '<script language="javascript">alert("Sửa thành công!"); window.location="admin.php";</script>';
        exit();
    } else {
        echo '<script language="javascript">alert("Có lỗi xảy ra, vui lòng thử lại!");</script>';
        exit();
    }         
      
   

}}

?>