<?php
include '../includes/conec_db.php'; 

function agregarNotificacion($conn, $idSeguidor, $idPublicacion, $idSeguido, $tipo) {
    try {
        $query = "INSERT INTO notificaciones (id_seguidor, id_publicacion, id_seguido, visto, tipo) VALUES (?, ?, ?, 0 , ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$idSeguidor, $idPublicacion, $idSeguido, $tipo]);
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
    }
}

function obtenerNotificacionesNoLeidas($conn, $idUsuario) {
    try {

        $queries = "
            SELECT notificaciones.*, usuarios.username, publicaciones_recetas.titulo, publicaciones_recetas.id_publicacion
            FROM notificaciones
            LEFT JOIN usuarios ON notificaciones.id_seguidor = usuarios.id_usuario
            LEFT JOIN publicaciones_recetas ON notificaciones.id_publicacion = publicaciones_recetas.id_publicacion
            WHERE notificaciones.id_seguido = :idUsuario AND notificaciones.visto = 0
            ORDER BY notificaciones.fecha DESC
        ";

        $stmt = $conn->prepare($queries);

        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);


        $stmt->execute();


        $notificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $notificaciones;
    } catch (Exception $e) {

        error_log('Error: ' . $e->getMessage());
    }
}



function getNotificationMessage($tipo, $titulo = '') {
    switch ($tipo) {
        case 'nuevo_comentario':
            return "comentó en tu receta: <em>" . $titulo . "</em>";
        case 'nuevo_seguidor':
            return "te ha seguido";
        case 'nueva_publicacion':
            return "publicó una nueva receta: <em>" . $titulo . "</em>";
        default:
            return "tiene una nueva notificación";
    }
}
?>
