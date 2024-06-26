<?php
$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
$sql = "SELECT p.id,p.title  FROM product_size_color psc
INNER JOIN colors c ON c.id = psc.color_id
INNER JOIN sizes s ON s.id = psc.size_id
INNER JOIN product p ON psc.product_id = p.id
Where psc.quantity>0 GROUP BY p.id" ;
$result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
 while($row=$result->fetch_assoc()) {
   echo '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';
        }
    
 }
?>