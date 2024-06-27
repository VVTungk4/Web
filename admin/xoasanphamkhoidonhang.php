<?php
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
   
    $sql = "DELETE FROM order_details WHERE product_id = ? AND color = ? AND size = ? AND order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $_GET['idsanpham'], $_GET['mausanpham'], $_GET['sizesanpham'], $_GET['iddonhang']);
    $stmt->execute();
    
    $iddata=$_GET['iddonhang'];
    //tra lai du lieu
    $sql2 = "SELECT p.id, p.title, od.color, od.size, od.num
    FROM order_details od
    INNER JOIN product p ON od.product_id = p.id
    WHERE od.product_id = p.id AND od.order_id = $iddata";
    $result = mysqli_query($conn, $sql2);
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
        <p id='errorText' style='color: red;'></p><td id=\"trash\"><button onclick='xoasanphamkhoidonhang(this)' id='btntable'><i class='bx bx-trash' style='color:#c63737'  ></i></button></td></tr>";
         $stt++;
    }echo "<div style='display=block' id='toimuoncainay' class='".$iddata."'>Mã Đơn Hàng:".$iddata."</div>";
}
?>