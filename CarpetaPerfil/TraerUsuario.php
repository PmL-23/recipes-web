<?php

include '../includes/conec_db.php';

if (!isset($_GET['NombreUsuario'])) {
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
$Nombre_Usuario_ = $_GET['NombreUsuario'];
$query = "SELECT usuarios.*, paises.ruta_imagen_pais FROM usuarios 
LEFT JOIN paises on usuarios.id_pais = paises.id_pais
WHERE usuarios.username = :NombreUsuario_";
$stm = $conn->prepare($query);
$stm->bindParam(':NombreUsuario_', $Nombre_Usuario_);
$stm->execute();
$usuario = $stm->fetchAll(PDO::FETCH_ASSOC);


//se deberia traer tambien la tablas de seguidores y seguidos para devolverla en el json.



echo json_encode($usuario, JSON_PRETTY_PRINT);

?>