<?php
   
if(isset($_POST['themsanpham'])){
    $error=array();
    $title =$_POST['title'];
    $id =$_POST['category']; 
    $price =$_POST['price'];
    $discount=$_POST['discount'];
    $description =$_POST['description'];
    $thumbnail =$_FILES['image']['name'];
    //ảnh 
    $delete=0;
    $target_dir = "../image/";
    $target_file = $target_dir . basename($thumbnail);
    $target_filethat ="image/".basename($thumbnail);
    if (file_exists($target_file)) {
        echo '<script language="javascript">alert("Xin lỗi, ảnh đã tồn tại."); window.location="admin.php";</script>';
      }
      else {
        move_uploaded_file($_FILES['image']['tmp_name'],$target_file) ;


        $conn=  mysqli_connect('localhost','root','') or die("Lỗi kết nối");
        mysqli_select_db($conn,'webhangban') or die('Not find DataBase');
        $themsanpham = "INSERT INTO product (title, category_id, deleted, price, discount, thumbnail, description) VALUES ('$title', $id, $delete, $price, $discount, '$target_file', '$description')";
        $conn->query($themsanpham);
           
        
       

        $idsanpham="SELECT id FROM product
        WHERE title = '$title'
          AND price = $price
          AND category_id = $id
          AND thumbnail = '$target_file';";
        $result=mysqli_query($conn,$idsanpham);
        $row=mysqli_fetch_assoc($result);
        $idsp=$row['id'];

		$themsoluong = "SELECT c.id as cid,s.id as sid,c.name as cname,s.name as sname	FROM colors c ,sizes s ";
					$result1 = $conn->query($themsoluong);

					while($row1=$result1->fetch_assoc()) {
                        $color_size =$row1['cname']."-".$row1['sname'];
                        $cid=$row1['cid'];
                        $sid=$row1['sid'];
                        $soluong =$_POST[$color_size];
                        echo $soluong."---".$cid."---".$idsp."---".$color_size;
                        if($soluong!=0){
                            $themtungcai = "INSERT INTO product_size_color (product_id, size_id, color_id,quantity) VALUES ($idsp,$sid,$cid,$soluong)";
                            $conn->query($themtungcai);

                        }
                           
					
					}           
   
      }   
   
}
echo '<script language="javascript">alert("Thêm Mới thành công!"); window.location="admin.php";</script>';
exit();
?>