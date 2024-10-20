<?php
session_start();
include '../includes/conec_db.php';

// Comprobación de la sesión
if (!isset($_SESSION['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'No autorizado']);
    exit();
}

if (isset($_POST['id'])) {
    $id_publicacion = intval($_POST['id']);
    
    try {
        $query = "DELETE FROM publicaciones_recetas WHERE id_publicacion = :id_publicacion AND id_usuario_autor = :id_usuario_autor";
        $stm = $conn->prepare($query); 
        $stm->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
        $stm->bindParam(':id_usuario_autor', $_SESSION['id'], PDO::PARAM_INT);

        if ($stm->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Publicación eliminada correctamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la publicación.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de publicación no proporcionado.']);
}
?>
