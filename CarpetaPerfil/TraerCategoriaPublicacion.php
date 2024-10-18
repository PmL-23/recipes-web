<?php

include '../includes/conec_db.php';

if (!isset($_GET['IDCategoria'])) {
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

$IDCategoria = $_GET['IDCategoria'];
$query = "SELECT titulo FROM categorias WHERE id_categoria = :categoriaID";
$stm = $conn->prepare($query);
$stm->bindParam(':categoriaID', $IDCategoria);
$stm->execute();
$Categoria = $stm->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($Categoria, JSON_PRETTY_PRINT);

?>



