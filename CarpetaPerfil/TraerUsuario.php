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
$query = "SELECT * FROM usuarios WHERE id_usuario = :usuario_id";
$stm = $conn->prepare($query);
$stm->bindParam(':usuario_id', $UsuarioID);
$stm->execute();
$usuario = $stm->fetchAll(PDO::FETCH_ASSOC);


//se deberia traer tambien la tablas de seguidores y seguidos para devolverla en el json.



echo json_encode($usuario, JSON_PRETTY_PRINT);

?>