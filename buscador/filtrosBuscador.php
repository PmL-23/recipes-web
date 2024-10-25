<?php
    
require '../includes/conec_db.php';

$query = "SELECT DISTINCT dificultad FROM publicaciones_recetas WHERE dificultad IS NOT NULL";
$stm = $conn->prepare($query);
$stm->execute();
$dificultades = $stm->fetchAll(PDO::FETCH_ASSOC);

$queryCategorias = "SELECT titulo FROM categorias";
$stmCategorias = $conn->prepare($queryCategorias);
$stmCategorias->execute();
$categorias = $stmCategorias->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['dificultades' => $dificultades, 'categorias' => $categorias]);
