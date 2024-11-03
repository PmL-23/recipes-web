<?php
include '../includes/conec_db.php'; 

function agregarNotificacion($conn, $idSeguidor, $idPublicacion, $idSeguido, $tipo) {
    try {
        $query = "INSERT INTO notificaciones (id_seguidor, id_publicacion, id_seguido, tipo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$idSeguidor, $idPublicacion, $idSeguido, $tipo]);
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
    }
}

function marcarNotificacionComoVista($conn, $idNotificacion) {
    try{
        $query = "UPDATE notificaciones SET visto = 1 WHERE id_notificacion = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$idNotificacion]);
    }catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
    }
}

function obtenerNotificacionesNoLeidas($conn, $idUsuario) {
    try {
        $queries = " SELECT notificaciones.*, usuarios.username, publicaciones_recetas.titulo
        FROM notificaciones
        JOIN usuarios ON notificaciones.id_seguido = usuarios.id_usuario
        JOIN publicaciones_recetas ON notificaciones.id_publicacion = publicaciones_recetas.id_publicacion
        WHERE notificaciones.id_seguidor = ? AND notificaciones.visto = 0
        ORDER BY notificaciones.fecha DESC ";
        $stmt = $conn->prepare($queries);
        $stmt->execute([$idUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
    }
}
?>
