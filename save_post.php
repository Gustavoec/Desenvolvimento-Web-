<?php
header('Content-Type: application/json');
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $texto = trim($_POST['texto']);
    if (!empty($texto)) {
        $stmt = $conn->prepare("INSERT INTO publicacoes (texto) VALUES (?)");
        $stmt->bind_param("s", $texto);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false]);
    }
}
$conn->close();
?>
