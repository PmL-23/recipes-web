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
$idusuario_ = $_GET['IDUsuario'];
$query = "SELECT usuarios.username, usuarios.nom_completo, usuarios.foto_usuario,  paises.ruta_imagen_pais FROM usuarios 
LEFT JOIN paises on usuarios.id_pais = paises.id_pais
WHERE usuarios.id_usuario =:ID_Usuario";
$stm = $conn->prepare($query);
$stm->bindParam(':ID_Usuario', $idusuario_);
$stm->execute();
$usuario = $stm->fetchAll(PDO::FETCH_ASSOC);


//se deberia traer tambien la tablas de seguidores y seguidos para devolverla en el json.



echo json_encode($usuario, JSON_PRETTY_PRINT);

?>