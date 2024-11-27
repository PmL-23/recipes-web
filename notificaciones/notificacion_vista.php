<?php
session_start();
include '../includes/conec_db.php';
function marcarNotificacionComoVista($conn, $idNotificacion) {
    try {
        if (!$idNotificacion || !is_numeric($idNotificacion)) {
            return false;
        }

        $query = "UPDATE notificaciones SET visto = 1 WHERE id_notificacion = :id_notificacion";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_notificacion', $idNotificacion, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    } catch (Exception $e) {
        error_log('Error al marcar la notificación como vista: ' . $e->getMessage());
        return false;
    }
}

if (isset($_GET['id_notificacion'])) {
    $idNotificacion = $_GET['id_notificacion'];

    if (!is_numeric($idNotificacion)) {
        echo json_encode(['success' => false, 'message' => 'ID de notificación no válido']);
        exit;
    }

    $success = marcarNotificacionComoVista($conn, $idNotificacion);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se pudo marcar la notificación como vista']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Faltó el ID de la notificación']);
}
?>

