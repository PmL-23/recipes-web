<?php
require '../includes/conec_db.php';
$id_receta = isset($_POST['id_receta']) ? $_POST['id_receta'] : null;

if ($id_receta != null) {
    // Obtener los ingredientes y sus cantidades para la receta
    $sql = "SELECT i.nombre, pi.cantidad 
            FROM publicacion_ingrediente pi 
            JOIN ingredientes i ON pi.id_ingrediente = i.id_ingrediente 
            WHERE pi.id_publicacion = :id_publicacion";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_publicacion', $id_receta, PDO::PARAM_INT);
    $stmt->execute();
    $ingredientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($ingredientes) {
        echo json_encode($ingredientes, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([]); // No se encontraron ingredientes
    }
} else {
    echo json_encode([]); // En caso de que no haya ID de receta
}