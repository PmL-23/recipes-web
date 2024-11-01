<?php

include '../includes/conec_db.php';

if (!isset($_GET['IDUsuario'])) {
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
$UsuarioID = $_GET['IDUsuario'];
$query = "SELECT publicaciones_recetas.*, categorias.titulo AS nombre_categoria
FROM publicaciones_recetas
LEFT JOIN categorias ON publicaciones_recetas.id_categoria = categorias.id_categoria
WHERE publicaciones_recetas.id_usuario_autor = :usuario_id";
$stm = $conn->prepare($query);
$stm->bindParam(':usuario_id', $UsuarioID);
$stm->execute();
$Publicacion = $stm->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($Publicacion, JSON_PRETTY_PRINT);

?>