<?php
include '../includes/conec_db.php';

function obtenerRecetasPorHora($conn) {

    $hora = (int)date("H");//hora actual

    if ($hora >= 6 && $hora < 11) {
        $categoriaId = 1; // desayuno
    } elseif ($hora >= 11 && $hora < 15) {
        $categoriaId = 2; // almuerzo
    } elseif ($hora >= 15 && $hora < 18) {
        $categoriaId = 3; // merienda
    } elseif ($hora >= 18 && $hora < 23) {
        $categoriaId = 4; // cena
    } else {
        $categoriaId = 4; // madrugada
    }

    // sql
    $query = "SELECT publicaciones_recetas.*, valoraciones.puntuacion AS valoracion_puntaje,
        AVG(valoraciones.puntuacion) AS promedio_valoracion FROM publicaciones_recetas
        INNER JOIN categorias ON publicaciones_recetas.id_categoria = categorias.id_categoria
        INNER JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
        WHERE categorias.id_categoria = :categoriaId 
        GROUP BY publicaciones_recetas.id_publicacion;";

    $stm = $conn->prepare($query);
    $stm->bindParam(':categoriaId', $categoriaId, PDO::PARAM_INT);
    $stm->execute();
    $recetas = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $recetas;
}

$recetas = obtenerRecetasPorHora($conn);

