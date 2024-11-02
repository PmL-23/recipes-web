<?php
session_start();
include '../includes/conec_db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['username'])) {
    $usuarioId = intval($data['id']);
    $nuevoUsername = trim($data['username']);

    if (empty($nuevoUsername)) {
        echo json_encode(['success' => false, 'message' => 'El nombre de usuario no puede estar vacío.']);
        exit;
    }

    try {
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE username = :username AND id_usuario != :id_usuario");
        $checkStmt->bindParam(':username', $nuevoUsername);
        $checkStmt->bindParam(':id_usuario', $usuarioId, PDO::PARAM_INT);
        $checkStmt->execute();

        $usernameExists = $checkStmt->fetchColumn();

        if ($usernameExists) {
            echo json_encode(['success' => false, 'message' => 'El nombre de usuario ya está en uso.']);
            exit;
        }
        $stmt = $conn->prepare("UPDATE usuarios SET username = :username WHERE id_usuario = :id_usuario");
        
        $stmt->bindParam(':username', $nuevoUsername);
        $stmt->bindParam(':id_usuario', $usuarioId, PDO::PARAM_INT);


        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el nombre de usuario.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
}

?>
