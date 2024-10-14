<?php
require '../includes/conec_db.php';

$id_receta = isset($_POST['id_receta']) ? $_POST['id_receta'] : null;

if ($id_receta != null) {
    $sql = "SELECT num_paso, texto FROM paso_receta WHERE id_publicacion = :id_publicacion ORDER BY num_paso ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_publicacion', $id_receta, PDO::PARAM_INT);
    $stmt->execute();
    $pasos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($pasos) {
        echo json_encode($pasos, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]); // En caso de que no haya ID de receta
}