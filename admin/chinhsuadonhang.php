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
 			// Xuất dữ liệu của mỗi hàng
 			while($row=$result->fetch_assoc()) {
                $sql1 = "SELECT quantity FROM product_size_color psc
                INNER JOIN colors c ON c.id = psc.color_id
                INNER JOIN sizes s ON s.id = psc.size_id
                WHERE s.name = '{$row['size']}' AND c.name = '{$row['color']}' AND psc.product_id = '{$row['id']}'";
                $result1 = mysqli_query($conn, $sql1);
                $quantity = $result1->fetch_assoc()['quantity'];
				echo "<tr><td>" . $stt. "</td><td>" . $row['id']. "</td><td>" .
                $row['title']. "</td><td>" . $row['color']. "</td><td>" .
                $row['size']."</td><td><input type='number' id='nhapso".$stt."' name='numberInput' min='1' max='".$quantity."' oninput='validateInput(this)' value=".$row['num'].">
    			<p id='errorText' style='color: red;'></p></td><td>" . $row['total_money'].
                "<td id=\"trash\"><button onclick='deleteRow(this)' id='btntable'><i class='bx bx-trash' style='color:#c63737'  ></i></button></td></tr>";
				 $stt++;
			}} else {echo "0 results";
				$conn->close();}         
?>