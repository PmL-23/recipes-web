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
$query = "SELECT p.*
FROM publicaciones_recetas p
JOIN favoritos f ON p.id_publicacion = f.id_publicacion
JOIN usuarios u ON u.id_usuario = f.id_usuario
WHERE u.id_usuario = :usuario_id";

$stm = $conn->prepare($query);
$stm->bindParam(':usuario_id', $UsuarioID);
$stm->execute();
$Publicacion = $stm->fetchAll(PDO::FETCH_ASSOC);

//se deberia traer tambien la tablas de seguidores y seguidos para devolverla en el json.



echo json_encode($Publicacion, JSON_PRETTY_PRINT);
?>