<?php

require '../includes/conec_db.php';

$tabla = 'publicaciones_recetas';
$col = [
    'publicaciones_recetas.id_publicacion',
    'publicaciones_recetas.id_categoria',
    'publicaciones_recetas.id_usuario_autor',
    'publicaciones_recetas.titulo',
    'publicaciones_recetas.descripcion',
    'publicaciones_recetas.fecha_publicacion',
    'publicaciones_recetas.dificultad',
    'publicaciones_recetas.minutos_prep',
    'valoraciones.puntuacion AS valoracion_puntaje',
    'ingredientes_recetas.ingrediente AS ingrediente_nombre'
];

// todos los campos
$campos = [
    'campo2' => isset($_POST['campo2']) ? $_POST['campo2'] : null,
    'campo3' => isset($_POST['campo3']) ? $_POST['campo3'] : null,
    'campo4' => isset($_POST['campo4']) ? $_POST['campo4'] : null,
    'campo5' => isset($_POST['campo5']) ? $_POST['campo5'] : null,
];

// filtrar solo los campos que tienen valores
$filtros = array_filter($campos, fn($value) => !is_null($value) && $value !== '');

$html = '';

if (!empty($filtros)) {
    // construyo las condiciones de la consulta de acuerdo a los campos llenados
    $condiciones = [];
    $parametros = [];

    // agrego las condiciones para cada ingrediente
    foreach ($filtros as $key => $value) {
        $condiciones[] = "ingredientes_recetas.ingrediente LIKE :$key";
        $parametros[":$key"] = "%" . $value . "%";
    }

    // unir condiciones
    $condicionSQL = implode(' AND ', $condiciones);

    // obtener las recetas
    $sql = "SELECT " . implode(", ", $col) . "
            FROM $tabla
            LEFT JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion
            LEFT JOIN ingredientes_recetas ON publicaciones_recetas.id_publicacion = ingredientes_recetas.id_publicacion
            WHERE $condicionSQL
            GROUP BY publicaciones_recetas.id_publicacion";
    
    $stmt = $conn->prepare($sql);
    foreach ($parametros as $key => $value) {
        $stmt->bindParam($key, $value, PDO::PARAM_STR);
    }
    $stmt->execute();
    $num_rows = $stmt->rowCount();

    //cards de recetas
    if ($num_rows > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $imagen = '../html_paises/img/imgArg/' . $row['titulo'] . '.jpg';
            if (!file_exists($imagen)) {
                $imagen = '../html_paises/img/imgArg/default.jpg';
            }

            $html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
            $html .= '<div class="card h-100 cursor-pointer">';
            $html .= '<a href="../recetas/receta-plantilla.php?id=' . $row['id_publicacion'] . '">';
            $html .= '<div class="card-img-wrapper">';
            $html .= '<img src="' . $imagen . '" class="card-img-top" alt="' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '">';
            $html .= '<div class="card-overlay">';
            $html .= '<div class="card-details">';
            $html .= '<p class="card-text dificultad">' . htmlspecialchars($row['dificultad'], ENT_QUOTES, 'UTF-8') . '</p>';
            $html .= '<p class="card-text minutos">' . htmlspecialchars($row['minutos_prep'], ENT_QUOTES, 'UTF-8') . ' min</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div></a>';
            $html .= '<div class="card-body text-left">';
            $html .= '<div class="d-flex justify-content-between align-items-center">';
            $html .= '<h5 class="card-title receta-titulo m-0">' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '</h5>';
            $puntuacion = (int)$row['valoracion_puntaje'];
            $html .= '<div class="rating d-flex mb-2">';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $puntuacion) {
                    $html .= '<i class="bi bi-star-fill text-warning"></i>';
                } else {
                    $html .= '<i class="bi bi-star-fill text-secondary"></i>';
                }
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
