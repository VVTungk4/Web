<?php
session_start();
require_once "database_function.php";
$conn = connectDatabase();

if (isset($_SESSION['user_info']['id'])) {
    $user_id = $_SESSION['user_info']['id'];
    $query = "SELECT fullname, phone_number, address FROM `user` WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user_info = $result->fetch_assoc();
        echo json_encode($user_info);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'User not logged in']);
}

$conn->close();
?>