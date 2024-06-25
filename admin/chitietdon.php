<?php		
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
			}} else {echo "0 results";
					$conn->close();}
        
        
	
?>
