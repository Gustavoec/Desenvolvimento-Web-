<?php
header('Content-Type: application/json');
include 'db_connect.php';

$result = $conn->query("SELECT * FROM publicacoes ORDER BY data_criacao DESC");
$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}
echo json_encode(['success' => true, 'posts' => $posts]);
$conn->close();
?>
