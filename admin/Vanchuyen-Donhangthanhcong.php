<?php
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
    $sql = "UPDATE orders SET status = 3 WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['q']);
    $stmt->execute();
    $stmt->get_result();
	$sql = "Select * From orders Where status = 2";
	$result = $conn->query($sql);
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
	<td ><button onclick='showchitiet(this)' id='btntable' class='btn btn-outline-success'><i class='bx bx-low-vision'></i></button></td>
	<td><button onclick='Thanhcong(this)' id='btntable' class='btn btn-outline-success'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
}}

?>