<?php
    
require '../includes/conec_db.php';

$querySaladas = "SELECT * FROM categorias WHERE seccion = 'saladas'";
$stmSaladas = $conn->prepare($querySaladas);
$stmSaladas->execute();
$saladas = $stmSaladas->fetchAll(PDO::FETCH_ASSOC);

$queryEspecial = "SELECT * FROM categorias WHERE seccion = 'ocasiones-especiales'";
$stmEspecial = $conn->prepare($queryEspecial);
$stmEspecial->execute();
$especiales = $stmEspecial->fetchAll(PDO::FETCH_ASSOC);

$queryDieta = "SELECT * FROM categorias WHERE seccion = 'dietas-especiales'";
$stmDieta = $conn->prepare($queryDieta);
$stmDieta->execute();
$dietas = $stmDieta->fetchAll(PDO::FETCH_ASSOC);

$queryBebida = "SELECT * FROM categorias WHERE seccion = 'bebidas'";
$stmBebida = $conn->prepare($queryBebida);
$stmBebida->execute();
$bebidas = $stmBebida->fetchAll(PDO::FETCH_ASSOC);

$queryDulce = "SELECT * FROM categorias WHERE seccion = 'dulces'";
$stmDulce = $conn->prepare($queryDulce);
$stmDulce->execute();
$dulces = $stmDulce->fetchAll(PDO::FETCH_ASSOC);