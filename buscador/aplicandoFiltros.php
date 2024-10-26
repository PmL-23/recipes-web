<?php
require '../includes/conec_db.php';

$tabla = 'publicaciones_recetas';
$col = [
    'publicaciones_recetas.id_publicacion',
    'categorias.titulo AS categoria_titulo',
    'publicaciones_recetas.id_usuario_autor',
    'publicaciones_recetas.titulo',
    'publicaciones_recetas.descripcion',
    'publicaciones_recetas.fecha_publicacion',
    'publicaciones_recetas.dificultad',
    'publicaciones_recetas.minutos_prep'
];

$dificultad = isset($_POST['dificultad']) ? $_POST['dificultad'] : (isset($_GET['dificultad']) ? $_GET['dificultad'] : null);
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : (isset($_GET['categoria']) ? $_GET['categoria'] : null);
$tiempo = isset($_POST['tiempo']) ? $_POST['tiempo'] : (isset($_GET['tiempo']) ? $_GET['tiempo'] : null);

$html = '';
$conditions = [];
$params = [];

if ($dificultad != null) {
    $conditions[] = 'publicaciones_recetas.dificultad LIKE :dificultad';
    $params[':dificultad'] = "%" . $dificultad . "%";
}

if ($categoria != null) {
    $conditions[] = 'categorias.titulo = :categoria';
    $params[':categoria'] = $categoria;
}

if ($tiempo === 'menos30') {
    $conditions[] = 'publicaciones_recetas.minutos_prep < 30';
} elseif ($tiempo === '30a60') {
    $conditions[] = 'publicaciones_recetas.minutos_prep BETWEEN 30 AND 60';
} elseif ($tiempo === 'mas60') {
    $conditions[] = 'publicaciones_recetas.minutos_prep > 60';
}

// si hay condiciones construirt la consulta
if (!empty($conditions)) {
    $sql = "SELECT " . implode(", ", $col) . " 
            FROM $tabla 
            INNER JOIN categorias ON publicaciones_recetas.id_categoria = categorias.id_categoria
            WHERE " . implode(" AND ", $conditions);
    
    $stmt = $conn->prepare($sql);

    // vincular parametros
    foreach ($params as $key => $value) {
        $stmt->bindParam($key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();
    $num_rows = $stmt->rowCount();

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
            $html .= '<h5 class="card-title receta-titulo">' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '</h5>';
            $html .= '</div></div></div>';
        }
    } else {
        $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se encontraron resultados.</p></div>';
    }
} else {
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se ingresó ninguna búsqueda.</p></div>';
}

echo $html;
