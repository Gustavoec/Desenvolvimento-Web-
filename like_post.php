<?php
header('Content-Type: application/json');
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("SELECT curtida FROM publicacoes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($curtida);
    $stmt->fetch();
    $stmt->close();

    $curtida = !$curtida;
    $stmt = $conn->prepare("UPDATE publicacoes SET curtida = ? WHERE id = ?");
    $stmt->bind_param("ii", $curtida, $id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    $stmt->close();
}
$conn->close();
?>
