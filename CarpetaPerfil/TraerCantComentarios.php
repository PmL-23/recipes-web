<?php

include '../includes/conec_db.php';

if (!isset($_GET['IDPublicacion'])) {
    echo json_encode([
        'success' => false,
        'error' => [
            'cliente' => [
                'No se especifico un usuario',
            ],
        ],
    ], JSON_PRETTY_PRINT);
    die();
}
$PublicacionID = $_GET['IDPublicacion'];

$query = "SELECT id_publicacion FROM comentarios WHERE id_publicacion = :publicacion_id";
$stm = $conn->prepare($query);
$stm->bindParam(':publicacion_id', $PublicacionID);
$stm->execute();
$Comentarios = $stm->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($Comentarios, JSON_PRETTY_PRINT);
?>