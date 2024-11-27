<?php
require '../includes/conec_db.php';

function obtenerRecetasPorHora($conn)
{
    date_default_timezone_set('America/Argentina/Buenos_Aires'); // Asegura la zona horaria correcta
    $hora = (int)date("H"); //hora actual

    if ($hora >= 6 && $hora < 11) {
        $etiquetaID = 18; // desayuno
    } elseif ($hora >= 11 && $hora < 15) {
        $etiquetaID = 19; // almuerzo
    } elseif ($hora >= 15 && $hora < 18) {
        $etiquetaID = 20; // merienda
    } elseif ($hora >= 18 && $hora < 23) {
        $etiquetaID = 21; // cena
    } else {
        $etiquetaID = 21; // cena
    }
    // sql
    $query = "
    SELECT 
        publicaciones_recetas.*, 
        valoraciones.puntuacion AS valoracion_puntaje, 
        AVG(valoraciones.puntuacion) OVER (PARTITION BY publicaciones_recetas.id_publicacion) AS promedio_valoracion 
    FROM 
        publicaciones_recetas
    INNER JOIN 
        etiquetas_recetas 
        ON publicaciones_recetas.id_publicacion = etiquetas_recetas.id_publicacion
    INNER JOIN 
        valoraciones 
        ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion
    WHERE 
        etiquetas_recetas.id_etiqueta = :etiquetaID
    GROUP BY 
        publicaciones_recetas.id_publicacion;
";
    $stm = $conn->prepare($query);
    $stm->bindParam(':etiquetaID', $etiquetaID, PDO::PARAM_INT);
    $stm->execute();
    $recetasSegunHora = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $recetasSegunHora;
}

$recetasSegunHora = obtenerRecetasPorHora($conn);
