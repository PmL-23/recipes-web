<?php
require '../includes/conec_db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !isset($data['descripcion'])) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos.']);
    exit();
}

$id = $data['id'];
$descripcion = trim($data['descripcion']);

try {
    $stmt = $conn->prepare("UPDATE usuarios SET descripcion = :descripcion WHERE id_usuario = :id_usuario");
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':id_usuario', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se realizaron cambios.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

?>
