<?php

include '../includes/conec_db.php';

if (!isset($_GET['IDPublicacion'])) {
    echo json_encode([
        'success' => false,
        'error' => [
            'cliente' => [
                'No se especifico una IDPublicacion',
            ],
        ],
    ], JSON_PRETTY_PRINT);
    die();
}

$IDPublicacion_ = $_GET['IDPublicacion'];
$query = "SELECT paises.nombre, paises.ruta_imagen_pais FROM paises
LEFT JOIN paises_recetas ON paises.id_pais = paises_recetas.id_pais
LEFT JOIN publicaciones_recetas ON paises_recetas.id_publicacion = publicaciones_recetas.id_publicacion
WHERE publicaciones_recetas.id_publicacion = :PublicacionID";
$stm = $conn->prepare($query);
$stm->bindParam(':PublicacionID', $IDPublicacion_);
$stm->execute();
$Paises = $stm->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($Paises, JSON_PRETTY_PRINT);

?>

