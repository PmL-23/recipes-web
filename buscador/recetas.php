<?php

require '../includes/conec_db.php';

$campo = isset($_POST['campo']) ? $_POST['campo'] : null;

$html = '';

if ($campo != null) {

    $sql = "
    SELECT *,publicaciones_recetas.id_publicacion, 
        AVG(valoraciones.puntuacion) AS valoracion_puntaje,
        MIN(imagenes.ruta_imagen) AS ruta_imagen
    FROM 
        publicaciones_recetas
    LEFT JOIN 
        valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion
    INNER JOIN 
        imagenes ON publicaciones_recetas.id_publicacion = imagenes.id_publicacion
    WHERE 
        publicaciones_recetas.titulo LIKE :campo
    GROUP BY 
        publicaciones_recetas.id_publicacion
    ";

    $stmt = $conn->prepare($sql);
    $campo = "%" . $campo . "%";
    $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
    $stmt->execute();
    $num_rows = $stmt->rowCount();

    if ($num_rows > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $imagen = !empty($row['ruta_imagen']) ? htmlspecialchars($row['ruta_imagen'], ENT_QUOTES, 'UTF-8') : "../html_paises/img/imgArg/default.jpg";

            $html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
            $html .= '<div class="card h-100 cursor-pointer">';
            $html .= '<a href="../recetas/receta-plantilla.php?id=' . $row['id_publicacion'] . '">';

            $html .= '<div class="card-img-wrapper d-flex justify-content-center align-items-center">'; // Contenedor para centrar la imagen
            $html .= '<img src="' . $imagen . '" class="card-img-top img-fluid" alt="' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '" style="object-fit: cover; height: 200px; width: 100%;">';
            $html .= '<div class="card-overlay">';
            $html .= '<div class="card-details">';
            $html .= '<p class="card-text dificultad">' . htmlspecialchars($row['dificultad'], ENT_QUOTES, 'UTF-8') . '</p>';
            $html .= '<p class="card-text minutos">' . htmlspecialchars($row['minutos_prep'], ENT_QUOTES, 'UTF-8') . ' min</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</a>';
            $html .= '<div class="card-body text-left">';
            $html .= '<div class="d-flex justify-content-between align-items-center">';
            $html .= '<h5 class="card-title receta-titulo m-0">' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '</h5>';

            $puntuacion = (int)$row['valoracion_puntaje'];
            $html .= '<div class="rating d-flex mb-2">';
            for ($i = 1; $i <= 5; $i++) {
                $html .= '<i class="bi bi-star-fill ' . ($i <= $puntuacion ? 'text-warning' : 'text-secondary') . '"></i>';
            }
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</div></div></div>';
        }
    } else {
        $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se encontraron resultados.</p></div>';
    }
} else {
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se ingresó ninguna búsqueda.</p></div>';
}

echo $html;