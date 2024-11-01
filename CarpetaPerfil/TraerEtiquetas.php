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
$query = "SELECT etiquetas.titulo AS nombre_etiqueta
FROM etiquetas
LEFT JOIN etiquetas_recetas ON etiquetas.id_etiqueta = etiquetas_recetas.id_etiqueta
LEFT JOIN publicaciones_recetas ON etiquetas_recetas.id_publicacion = publicaciones_recetas.id_publicacion
WHERE publicaciones_recetas.id_publicacion = :PublicacionID";
$stm = $conn->prepare($query);
$stm->bindParam(':PublicacionID', $IDPublicacion_);
$stm->execute();
$Imagenes = $stm->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($Imagenes, JSON_PRETTY_PRINT);

?>



