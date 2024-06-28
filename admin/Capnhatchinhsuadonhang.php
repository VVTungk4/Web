<?php
 $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
 mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $receivedData = json_decode(file_get_contents("php://input"), true);
    $id = $receivedData[0];
    // Thực hiện xử lý với $currentElement
    //xóa đơn hàng cũ để cập nhật lại
    $iddon= $id['iddonhang'];
    $sql = "DELETE FROM order_details
    WHERE order_id = $iddon";
    $result = mysqli_query($conn, $sql);
    $length = count($receivedData); // Hoặc có thể dùng sizeof($receivedData)

    // Sử dụng vòng lặp while để duyệt qua các phần tử
    $i = 0;
    while ($i < $length) {
        $currentElement = $receivedData[$i];
        // Thực hiện xử lý với $currentElement
        $iddonhang = $currentElement['iddonhang'];
        $productID = $currentElement['productID'];
        $productSize = $currentElement['productSize'];
        $productColor = $currentElement['productColor'];
        $productQuantity = $currentElement['productQuantity'];
        
        $sql1="SELECT after_discount From product Where id=$productID";
        $result1 = mysqli_query($conn, $sql1);
        $dongia = $result1->fetch_assoc()['after_discount'];
        $tongtien=$dongia*$productQuantity;
        //sql để cập nhật lại tt 
        if($productQuantity!=0){
             $sql2 = "INSERT INTO order_details (product_id,price ,color, size, num, order_id,total_money)
        VALUES (?, ?,?,?, ?, ?,?)";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("iissiii", $productID,$dongia,$productColor,$productSize,$productQuantity,$iddonhang,$tongtien);
        $stmt->execute();
        $stmt->get_result();
        //cập nhật lại tổng tiền bên orders
        $sql3="UPDATE orders
        SET total_money = (
            SELECT SUM(od.total_money)
            FROM order_details od
            WHERE od.order_id = $iddonhang
        )
        WHERE id = $iddonhang";
        $result3 = mysqli_query($conn, $sql3);
        }
       

        
        // Tăng biến đếm
        $i++;
    }}
    $conn->close();
?>