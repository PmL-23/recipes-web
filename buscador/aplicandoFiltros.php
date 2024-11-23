<?php
require '../includes/conec_db.php';

$dificultad = isset($_POST['dificultad']) ? $_POST['dificultad'] : null ;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$tiempo = isset($_POST['tiempo']) ? $_POST['tiempo'] : null;
$valoraciones = isset($_POST['valoracion']) ? $_POST['valoracion']: null;
$etiquetas = isset($_POST['etiqueta']) ? $_POST['etiqueta']: null;
$ingredientes = isset($_POST['ingrediente']) ? $_POST['ingrediente'] : null;


$html = '';

// agrego condiciones segun cada filtro para la consulta
$conditions = [];
$params = [];

// dificultad
if ($dificultad != null) {
    $conditions[] = 'publicaciones_recetas.dificultad = :dificultad';
    $params[':dificultad'] = $dificultad;
}

// categoria
if ($categoria != null) {
    $conditions[] = 'categorias.titulo = :categoria';
    $params[':categoria'] = $categoria;
}

// tiempos
if ($tiempo === 'menos30') {
    $conditions[] = 'publicaciones_recetas.minutos_prep < 30';
} elseif ($tiempo === '30a60') {
    $conditions[] = 'publicaciones_recetas.minutos_prep BETWEEN 30 AND 60';
} elseif ($tiempo === 'mas60') {
    $conditions[] = 'publicaciones_recetas.minutos_prep > 60';
}

// valoraciones (en estrellas)
$order = '';
if ($valoraciones === 'menosValoradas') {
    $order = 'ORDER BY valoracion_puntaje ASC'; //uso el valoracion_puntaje que calcula el AVG
} elseif ($valoraciones === 'masValoradas') {
    $order = 'ORDER BY valoracion_puntaje DESC';
}

// todas las etiquetas segun las publicaciones que hay
if ($etiquetas != null) {
    $conditions[] = 'etiquetas.titulo = :etiqueta';
    $params[':etiqueta'] = $etiquetas;
}

// ordeno segun la cantidad de ingredientes
if ($ingredientes === 'masIngredientes') {
    $order = 'ORDER BY cantidad_ingredientes ASC';
} elseif ($ingredientes === 'menosIngredientes') {
    $order = 'ORDER BY cantidad_ingredientes DESC';
}

if (!empty($conditions) || !empty($order)) {

    $sql = "SELECT *, categorias.titulo,valoraciones.puntuacion AS valoracion_puntaje, 
    etiquetas_recetas.id_publicacion, etiquetas_recetas.id_etiqueta, etiquetas.titulo,etiquetas.id_etiqueta,
    COUNT(ingredientes_recetas.cantidad) AS cantidad_ingredientes, AVG(valoraciones.puntuacion) AS valoracion_puntaje 
    FROM publicaciones_recetas 
    INNER JOIN categorias ON publicaciones_recetas.id_categoria = categorias.id_categoria 
    INNER JOIN valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
    INNER JOIN etiquetas_recetas ON publicaciones_recetas.id_publicacion = etiquetas_recetas.id_publicacion 
    INNER JOIN etiquetas ON etiquetas_recetas.id_etiqueta = etiquetas.id_etiqueta 
    INNER JOIN ingredientes_recetas ON publicaciones_recetas.id_publicacion = ingredientes_recetas.id_publicacion";
    
    
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sql .= " GROUP BY publicaciones_recetas.id_publicacion $order";
    // agrego el agrupamiento y orden

    // praparo las consultas
    $stmt = $conn->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }
    $stmt->execute();
    $num_rows = $stmt->rowCount();
    // echo $sql;
    // die();
    // mostrar las cards
    if ($num_rows > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // consulta para obtener las rutas de las imágenes
            $sqlImagen = "SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :id";
            $stmtImagen = $conn->prepare($sqlImagen);
            $stmtImagen->bindParam(':id', $row['id_publicacion'], PDO::PARAM_INT);
            $stmtImagen->execute();
            $imagenData = $stmtImagen->fetchAll(PDO::FETCH_ASSOC);

            $imagenes = [];
            foreach ($imagenData as $imagen) {
                if (!empty($imagen['ruta_imagen'])) {
                    $imagenes[] = htmlspecialchars($imagen["ruta_imagen"], ENT_QUOTES, 'UTF-8');
                }
            }

            $html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
            $html .= '<div class="card h-100 cursor-pointer">';
            $html .= '<a href="../recetas/receta-plantilla.php?id=' . $row['id_publicacion'] . '">';
            
            $html .= '<div class="card-img-wrapper d-flex justify-content-center align-items-center">'; // Contenedor para centrar la imagen
            $html .= '<img src="' . (empty($imagenes) ? "../html_paises/img/imgArg/default.jpg" : $imagenes[0]) . '" class="card-img-top img-fluid" alt="' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '" style="object-fit: cover; height: 200px; width: 100%;">';
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
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>Por favor, aplique algún filtro para ver resultados.</p></div>';
}

echo $html;