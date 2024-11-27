<?php

require_once '../../includes/conec_db.php';


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

$query = "SELECT etiquetas.id_etiqueta, etiquetas.titulo FROM etiquetas
LEFT JOIN etiquetas_recetas on etiquetas.id_etiqueta = etiquetas_recetas.id_etiqueta
LEFT JOIN publicaciones_recetas on etiquetas_recetas.id_publicacion = publicaciones_recetas.id_publicacion
WHERE publicaciones_recetas.id_publicacion = :publicacion_id";
$stm = $conn->prepare($query);
$stm->bindParam(':publicacion_id', $PublicacionID);
$stm->execute();
$EtiquetasSeleccionadas = $stm->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($EtiquetasSeleccionadas, JSON_PRETTY_PRINT);
?>