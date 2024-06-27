<?php
//sau khi bấm xác nhận đơn hàng
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    $sql = "UPDATE orders SET status = 1 WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['q']);
    $stmt->execute();
    $stmt->get_result();
        $sql1 = "Select * From orders Where status = 0";
				$result = $conn->query($sql1);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" .
				$row["id"]. "</td><td>" .
				$row["fullname"]. "</td><td>" . 
				$row["phone_number"]."</td><td>" . 
				$row["address"]."</td><td>" .  
				$row["order_date"]."</td>
				<td ><button onclick='showchitiet(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-low-vision'></i></button></td> 
				<td><button onclick='suadonhang(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bxs-pencil' style='color:#1cce55'  ></i></button></td>	
				<td><button onclick='xacnhansanpham(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td>
				<td><button onclick='deleteRow(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-trash' style='color:#c63737'  ></i></button></td></tr>";
			}} else {echo "0 results";}
?>