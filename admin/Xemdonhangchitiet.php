<?php	
//chitiet đơn hàng	
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
			$iddata=$_GET['q'];
			$s=$_GET['giatri'];
			$sql = "SELECT p.id, p.title, od.color, od.size, od.num, od.total_money
			FROM order_details od
			INNER JOIN product p ON od.product_id = p.id
			WHERE od.product_id = p.id AND od.order_id = $iddata
			GROUP BY p.id, p.title, od.color, od.size, od.num";
			$result = mysqli_query($conn, $sql);
			$stt=1;
			if($s==0){
				$table='danger';
				$tt='Đang Chờ Xác Nhận';
			}
			else if($s==1){
				$table='warning';
				$tt='Đang Chuẩn Bị';
			}
			else if($s==2){
				$table='success';
				$tt='Đang Giao Hàng';	
				
				}
				else if($s==3){
					$table='info';
					$tt= 'Đã Hoàn Tất';
			};
			echo '<h3 style="text-align: center;margin-top: 20px; color:var(--dark);"  >CHI TIẾT ĐƠN HÀNG:#'.$iddata.'</h3>
			<p class="fst-italic text-decoration-underline text-center text-'.$table.'">Trạng Thái Đơn : '.$tt.'</p>
			<table class="table table-sm caption-top" style="margin-top:25px ;">
		 			<thead style="border-bottom: 1px solid var(--dark);" class="table-'.$table.'">
						<tr><th width="5%">STT</th>
			 				<th width="10%">Mã Sản Phẩm</th>
			 				<th width="15%">Tên Sản Phẩm</th>
			 				<th width="9%">Màu Sắc</th>
			 				<th width="9%">Size</th>
				 			<th width="10%">Số Lượng</th>
			 				<th width="20%">Tổng Tiền</th>	       			
						 </tr>
		 			</thead>
	 			<tbody>
			';
   			 if ($result->num_rows > 0) {
				
                //lưu biến
			// Kiểm tra số lượng bản ghi trả về
				
 			// Xuất dữ liệu của mỗi hàng
 			while($row=$result->fetch_assoc()) {
				
				echo "<tr><td>" . $stt. "</td><td>" .$row['id']. "</td><td>" .
                $row['title']. "</td><td>" . $row['color']. "</td><td>" .
                $row['size']."</td><td>" .  $row['num']."</td><td>" .  $row['total_money'].
				"</td></tr>";
				 $stt++;
			}
		echo '</tbody> </table>';
		} else {echo "0 results";
					$conn->close();}
        
        
	
?>
