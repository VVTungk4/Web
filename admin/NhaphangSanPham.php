<?php
   
if(isset($_POST['nhaphang'])){
    $error=array();
    $idsp =$_POST['masp1']; 
    
        $conn=  mysqli_connect('localhost','root','') or die("Lỗi kết nối");
        mysqli_select_db($conn,'webhangban') or die('Not find DataBase');
		$themsoluong = "SELECT c.id as cid,s.id as sid,c.name as cname,s.name as sname	FROM colors c ,sizes s ";
		$result1 = $conn->query($themsoluong);

					while($row1=$result1->fetch_assoc()) {
                        $color_size =$row1['cname']."-".$row1['sname'];
                        $cid=$row1['cid'];
                        $sid=$row1['sid'];
                        $sql = "SELECT COUNT(*) as count FROM product_size_color Where color_id=$cid AND size_id=$sid AND product_id=$idsp";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $dem= $row['count'];
                        $soluong =$_POST[$color_size];
                        echo $soluong."---".$cid."---".$idsp."---".$color_size."---".$dem;
                        if($soluong!=0&&$dem==0){
                            $themtungcai = "INSERT INTO product_size_color (product_id, size_id, color_id,quantity) VALUES ($idsp,$sid,$cid,$soluong)";
                            $conn->query($themtungcai);

                        }
                        else if($soluong!=0&&$dem>0){
                            $themtungcai = "UPDATE product_size_color SET quantity=quantity+$soluong WHERE product_id=$idsp AND color_id=$cid AND size_id= $sid";
                            $conn->query($themtungcai);
                        }
                           
					
					}           
   
      }   
   


?>