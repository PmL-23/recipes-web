<?php
include '../includes/conec_db.php';

session_start();
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit;
}
$id_usuario = $_SESSION['id']; 
$query = "DELETE FROM usuarios WHERE id_usuario = :id_usuario";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id_usuario", $id_usuario);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    echo json_encode(['success' => true, 'message' => 'Cuenta borrada']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al borrar la cuenta']);
}

