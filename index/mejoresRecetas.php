<?php
include '../includes/conec_db.php';

$queryMasValoradas = "SELECT publicaciones_recetas.*, AVG(valoraciones.puntuacion) AS valoracion_puntaje FROM publicaciones_recetas 
LEFT JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
GROUP BY publicaciones_recetas.id_publicacion HAVING valoracion_puntaje > 4 
ORDER BY valoracion_puntaje DESC;";
$stmMasValoradas = $conn->prepare($queryMasValoradas);
$stmMasValoradas->execute();
$masValoradas = $stmMasValoradas->fetchAll(PDO::FETCH_ASSOC);

