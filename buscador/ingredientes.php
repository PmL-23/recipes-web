<?php

require '../includes/conec_db.php';

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

    $ingredientes = array_values($filtros);
    $placeholders = implode(',', array_fill(0, count($ingredientes), '?'));

    $sql = "
        SELECT 
            publicaciones_recetas.*,
            AVG(valoraciones.puntuacion) AS valoracion_puntaje ,
            COUNT(DISTINCT ingredientes.nombre) AS ingredientes_encontrados, 
            GROUP_CONCAT(DISTINCT ingredientes.nombre) AS ingredientes_encontrados_lista 
        FROM 
            publicaciones_recetas 
        INNER JOIN 
            categorias ON publicaciones_recetas.id_categoria = categorias.id_categoria 
        LEFT JOIN 
            valoraciones ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
        INNER JOIN 
            ingredientes_recetas ON publicaciones_recetas.id_publicacion = ingredientes_recetas.id_publicacion 
        INNER JOIN 
            ingredientes ON ingredientes_recetas.id_ingrediente = ingredientes.id_ingrediente 
        WHERE 
            ingredientes.nombre IN ($placeholders) 
        GROUP BY 
            publicaciones_recetas.id_publicacion 
        HAVING 
            ingredientes_encontrados = ?;
    
    ";
    $stmt = $conn->prepare($sql);
    $params = array_merge($ingredientes, [count($ingredientes)]);
    $stmt->execute($params);

    $num_rows = $stmt->rowCount();

    if ($num_rows > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

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

            $html .= '<div class="card-img-wrapper d-flex justify-content-center align-items-center">';
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
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se ingresó ninguna búsqueda.</p></div>';
}

echo $html;