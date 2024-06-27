<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');

// Truy vấn lấy dữ liệu
    $s = $_GET['s'];

    // Use prepared statements or escape user input to prevent SQL injection
    $sql = "SELECT  p.thumbnail, p.id,p.title,c.name as colorname,s.name as sizename  FROM product_size_color psc
    INNER JOIN colors c ON c.id = psc.color_id
    INNER JOIN sizes s ON s.id = psc.size_id
    INNER JOIN product p ON psc.product_id = p.id
    WHERE psc.product_id=$s;";
    $result = mysqli_query($conn, $sql);
    $stt=1;
    if ($result->num_rows > 0) {
        while($row=$result->fetch_assoc()) {
            $sql1 = "SELECT quantity FROM product_size_color psc
            INNER JOIN colors c ON c.id = psc.color_id
            INNER JOIN sizes s ON s.id = psc.size_id
            WHERE s.name = '{$row['sizename']}' AND c.name = '{$row['colorname']}' AND psc.product_id = {$row['id']}";
            $result1 = mysqli_query($conn, $sql1);
            $quantity = $result1->fetch_assoc()['quantity'];
                echo "<table id='bangdonhang' class='table table-striped table-bordered'>
                <tr><td width='10%'><img src='../" .$row['thumbnail']. "' style='width:70px;height:50px'></td><td width='7%'>" . $row['id']. "</td><td width='20%'>" .
                $row['title']. "</td><td width='5%'>" . $row['colorname']. "</td><td width='5%'>" .
                $row['sizename']."</td><td width='10%'>Còn: ".$quantity."</td><td width='10%'><button onclick='themsanphamvaodonhang(this)' id='btntable' class='btn btn-outline-danger' style='color:var(--dark);'>Thêm Vào Đơn</button></td></tr>";
                $stt++;
             
          
               }
           
        }


$conn->close();
?>
