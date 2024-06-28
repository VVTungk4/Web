<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icon.png" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>IN HÓA ĐƠN</title>
</head>
<body >
<?php	
//Hóa Đơn
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
			$iddata=$_GET['q'];
			$sql = "SELECT p.id, p.title, od.color, od.size, od.num, od.total_money
			FROM order_details od
			INNER JOIN product p ON od.product_id = p.id
			WHERE od.product_id = p.id AND od.order_id = $iddata
			GROUP BY p.id, p.title, od.color, od.size, od.num";
			$result = mysqli_query($conn, $sql);
			$stt=1;
			$tongtien=0;
			$thongtin = "SELECT * FROM orders
            WHERE id=$iddata";
            $result10 = mysqli_query($conn, $thongtin);
			while($row = $result10->fetch_assoc()){	
				$ten =$row['fullname'];
				$diachi =$row['address'];
				$sdt =$row['phone_number'];
			}
           
			echo '<h3 style="text-align: center;margin-top: 20px; color:var(--dark);"  >CHI TIẾT ĐƠN HÀNG:#'.$iddata.'</h3>
			<p class="fst-italic text-decoration-underline text-center text-info">Họ Tên:'.$ten.'<br>Địa Chỉ :'.$diachi.'  SĐT :'.$sdt.'</p>
			<table class="table table-sm caption-top" style="margin-top:25px ;">
		 			<thead style="border-bottom: 1px solid var(--dark);" class="table-info">
						<tr><th width="5%">STT</th>
			 				<th width="10%">Mã Sản Phẩm</th>
			 				<th width="20%">Tên Sản Phẩm</th>
			 				<th width="9%">Màu Sắc</th>
			 				<th width="9%">Size</th>
				 			<th width="10%">Số Lượng</th>
			 				<th width="15%">Tổng Tiền</th>	       			
						 </tr>
		 			</thead>
	 			<tbody>
			';
   			 if ($result->num_rows > 0) {
				
 			while($row=$result->fetch_assoc()) {
				$tongtien=$tongtien+$row['total_money'];
				
				echo "<tr><td>" . $stt. "</td><td>" .$row['id']. "</td><td>" .
                $row['title']. "</td><td>" . $row['color']. "</td><td>" .
                $row['size']."</td><td>" .  $row['num']."</td><td>" .  $row['total_money'].
				"</td></tr>";
				 $stt++;
			}
		echo '</tbody> </table><p class="text-end fs-3">Thành Tiền : '.$tongtien.' $</p>';
		} else {echo "0 results";
					$conn->close();}
        
        
	
?>
</body>