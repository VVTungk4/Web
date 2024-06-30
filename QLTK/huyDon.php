<?php $conn = new mysqli('localhost', 'root', '', 'webhangban');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} //
//Cbi câu lệnh sql
session_start();
$sql = "UPDATE orders SET status = 4 WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['q']);
$stmt->execute();
$stmt->get_result();
?>