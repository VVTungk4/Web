<?php
	
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
            $q=$_GET['q'];
            if($q==3){
                $sql = "Select * From orders Where status = $q";
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
				<td ><button onclick='showchitiet(this,\"3\")' id='btntable' class='btn btn-outline-info'><i class='bx bx-low-vision'></i></button></td>
				<td><button onclick='Inhoadon(this)' id='btntable' class='btn btn-outline-info'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
			}} 
            }
			
			
            if($q==0){
                $sql = "Select * From orders Where status = 0";
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
				<td ><button onclick='showchitiet(this,\"0\")' id='btntable' class='btn btn-outline-danger'><i class='bx bx-low-vision'></i></button></td> 
                <td><button onclick='suadonhang(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bxs-pencil' style='color:#1cce55'  ></i></button></td>
				<td><button onclick='xacnhansanpham(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td>
				<td><button onclick='deleteRow(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-trash' style='color:#c63737'  ></i></button></td></tr>";
			}}
            }
            if($q==1){
                $sql = "Select * From orders Where status = 1";
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
				<td ><button onclick='showchitiet(this,\"1\")' id='btntable' class='btn btn-outline-warning'><i class='bx bx-low-vision'></i></button></td>
				<td><button onclick='chuyensanggiaohang(this)' id='btntable' class='btn btn-outline-warning'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
			}}
            }
            if($q==2){
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
				<td ><button onclick='showchitiet(this,\"2\")' id='btntable' class='btn btn-outline-success'><i class='bx bx-low-vision'></i></button></td>
				<td><button onclick='Thanhcong(this)' id='btntable' class='btn btn-outline-success'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
			}}
            }
            $conn->close();
?>