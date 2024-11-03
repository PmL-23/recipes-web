<?php
session_start();
include '../includes/conec_db.php';

if (isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];

    $queries = "
        SELECT notificaciones.*, usuarios.username, publicaciones_recetas.titulo
        FROM notificaciones
        JOIN usuarios ON notificaciones.id_seguido = usuarios.id_usuario
        JOIN publicaciones_recetas ON notificaciones.id_publicacion = publicaciones_recetas.id_publicacion
        WHERE notificaciones.id_seguidor = ? AND notificaciones.visto = 0
        ORDER BY notificaciones.fecha DESC
    ";
    
    $stmt = $conn->prepare($queries);
    $stmt->execute([$idUsuario]);
    $notificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($notificaciones);
} else {
    echo json_encode([]);
}
?>

