<?php		
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
            $iddata=$_GET['q'];
			$sql = "SELECT p.id, p.title, od.color, od.size, od.num
			FROM order_details od
			INNER JOIN product p ON od.product_id = p.id
			WHERE od.product_id = p.id AND od.order_id = $iddata";
			$result = mysqli_query($conn, $sql);
			$stt=1;
			$tt='Đang Chỉnh Sửa';
			echo'<h3 style="text-align: center;margin-top: 20px;color:var(--dark)" >CHỈNH SỬA ĐƠN HÀNG : #'.$iddata.'</h3>
			<p class="fst-italic text-decoration-underline text-center text-danger">Trạng Thái Đơn : '.$tt.'</p>
			<table class="table table-striped" style="margin-top:25px ;" >
			  	<thead style="border-bottom: 1px solid var(--dark);" class="table-danger">
       				<tr"><th width="5%">STT</th>
            			<th width="10%">Mã Sản Phẩm</th>
            			<th width="10%">Tên Sản Phẩm</th>
						<th width="10%">Màu Sắc</th>
						<th width="10%">Size</th>
           		 		<th width="20%">Số Lượng</th>
						<th width="4%">Xóa</th>          			
        			</tr>
   				</thead>
        			<tbody id="productTable">

       			';
   			 if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row=$result->fetch_assoc()) {
                $sql1 = "SELECT quantity FROM product_size_color psc
                INNER JOIN colors c ON c.id = psc.color_id
                INNER JOIN sizes s ON s.id = psc.size_id
                WHERE s.name = '{$row['size']}' AND c.name = '{$row['color']}' AND psc.product_id = '{$row['id']}'";
                $result1 = mysqli_query($conn, $sql1);
                $quantity = $result1->fetch_assoc()['quantity'];


				$sql2 = "SELECT num FROM order_details
                
                WHERE size = '{$row['size']}' AND color = '{$row['color']}' AND product_id = '{$row['id']}'";
				$result2 = mysqli_query($conn, $sql2);
				$num = $result2->fetch_assoc()['num'];

				echo "<tr><td>" . $stt. "</td><td>" . $row['id']. "</td><td>" .
                $row['title']. "</td><td>" . $row['color']. "</td><td>" .
                $row['size']."</td><td><input type='number' id='nhapso".$stt."' name='numberInput' min='0' max='".$quantity+$num."' oninput='validateInput(this)' value=".$row['num'].">
    			<p id='errorText' style='color: red;'></p><td><button onclick='deleteRow1(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-trash' style='color:#c63737'  ></i></button></td></tr>";
				 $stt++;
			}
		} echo "	 </tbody>
			</table><div style='display=block' id='toimuoncainay' class='".$iddata."'>Mã Đơn Hàng:".$iddata."</div><button onclick='sendData(this)' id='btntable' class='btn btn-outline-danger'><p style='color:var(--orange);'>Xác Nhận</p></button>";
				$conn->close();      
?>