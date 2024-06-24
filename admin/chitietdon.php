<?php		
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
			$sql = "SELECT p.id, p.title, od.color, od.size, od.num, od.total_money
			FROM order_details od
			INNER JOIN product p ON od.product_id = p.id
			WHERE od.product_id = p.id AND od.order_id = ?
			GROUP BY p.id, p.title, od.color, od.size, od.num";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("i", $_GET['q']);
			$stmt->execute();
			$stmt->get_result();
			
			$stmt->bind_result($id, $name, $color, $size, $num, $total);

			
				$stt=1;
                //lưu biến
			// Kiểm tra số lượng bản ghi trả về
				if ($stmt->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($stmt->fetch()>=0) {
				
				echo "<tr><td>" . $stt. "</td><td>" . $id. "</td><td>" .
                $name. "</td><td>" . $color. "</td><td>" .
                $size."</td><td>x" .  $num."</td><td>" .  $total.
				"</td></tr>";
				 $stt++;
			}} else {echo "0 results";
					$conn->close();}
        
        
	
?>
