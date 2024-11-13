<?php
    
require '../includes/conec_db.php';

$querySaladas = "SELECT publicaciones_recetas.*, valoraciones.puntuacion AS valoracion_puntaje, AVG(valoraciones.puntuacion)
AS promedio_valoracion FROM publicaciones_recetas INNER JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
INNER JOIN ingredientes_recetas ON publicaciones_recetas.id_publicacion = ingredientes_recetas.id_publicacion 
INNER JOIN ingredientes ON ingredientes_recetas.id_ingrediente = ingredientes.id_ingrediente 
WHERE ingredientes.nombre LIKE '%Sal%' GROUP BY publicaciones_recetas.id_publicacion;";
$stmSaladas = $conn->prepare($querySaladas);
$stmSaladas->execute();
$saladas = $stmSaladas->fetchAll(PDO::FETCH_ASSOC);

$queryEspecial = "SELECT publicaciones_recetas.*, valoraciones.puntuacion AS valoracion_puntaje, AVG(valoraciones.puntuacion)
 AS promedio_valoracion FROM publicaciones_recetas INNER JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
 INNER JOIN etiquetas_recetas ON publicaciones_recetas.id_publicacion = etiquetas_recetas.id_publicacion 
 INNER JOIN etiquetas ON etiquetas_recetas.id_etiqueta = etiquetas.id_etiqueta WHERE etiquetas.titulo LIKE '%#enFamilia%' 
 GROUP BY publicaciones_recetas.id_publicacion;";
$stmEspecial = $conn->prepare($queryEspecial);
$stmEspecial->execute();
$especiales = $stmEspecial->fetchAll(PDO::FETCH_ASSOC);