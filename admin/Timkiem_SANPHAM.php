<?php
	
	// Kết nối cơ sở dữ liệu
	$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
	mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
	// Truy vấn lấy dữ liệu
    $tukhoa=$_GET['tukhoa'];
    $sql = "SELECT
    p.id,
    p.title,
    p.thumbnail,
    cate.name as cate,
    p.price,
    p.discount,
    p.deleted,
    psc.quantity,
    s.name as size,
    c.name as color
FROM
    product AS p
JOIN
    product_size_color AS psc ON p.id = psc.product_id
JOIN
    colors AS c ON psc.color_id = c.id
JOIN
    sizes AS s ON psc.size_id = s.id
JOIN 
    category AS cate ON cate.id = p.category_id
WHERE
    p.title LIKE '%$tukhoa%'
ORDER BY
    p.id ASC;";
		$result = $conn->query($sql);
	// Kiểm tra số lượng bản ghi trả về
		if ($result->num_rows > 0) {
	 // Xuất dữ liệu của mỗi hàng
	 
	 while($row = $result->fetch_assoc()) {
		if($row["deleted"]==0&&$row["quantity"]>0){
			$status="<td style='color:var(--blue);'>Còn Hàng</td>";
		}
		else if($row["deleted"]==0||$row["quantity"]==0){
			$status="<td style='color:var(--red);'>Hết Hàng</td>";
		}
		else{
			$status="<td style='color:var(--grey);'>Đã Dừng Bán</td>";
			}
		echo "<tr>
		<td>".$row["id"]."</td>
		<td><img src='../".$row["thumbnail"]. "' style='width:60px;height:60px;'></td>
		<td>".$row["title"]."</td>
		<td>".$row["cate"]."</td>
		<td>".$row["size"]."</td>
		<td>".$row["color"]."</td>
		<td>".$row["price"]."đ</td> 
		<td>".$row["discount"]."%</td>
		<td>".$row["quantity"]."</td>
		".$status."
		<td><a href='#' >Sửa</a></td>
        <td><a href='#' >Xóa</a></td></tr>";
	}} else {
        echo "Không tìm thấy sản phẩm phù hợp!";
    }
			$conn->close();?>