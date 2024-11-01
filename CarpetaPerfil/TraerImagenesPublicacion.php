<?php

include '../includes/conec_db.php';

if (!isset($_GET['IDPublicacion'])) {
    echo json_encode([
        'success' => false,
        'error' => [
            'cliente' => [
                'No se especifico una categoria',
            ],
        ],
    ], JSON_PRETTY_PRINT);
    die();
}

$IDPublicacion_ = $_GET['IDPublicacion'];
$query = "SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :PublicacionID";
$stm = $conn->prepare($query);
$stm->bindParam(':PublicacionID', $IDPublicacion_);
$stm->execute();
$Imagenes = $stm->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($Imagenes, JSON_PRETTY_PRINT);

?>



