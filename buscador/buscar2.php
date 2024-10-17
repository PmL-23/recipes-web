<?php
// buscar2.php
require '../includes/conec_db.php';

$col = [
    'id_publicacion',
    'titulo',
    'descripcion',
    'fecha_publicacion',
    'dificultad',
    'minutos_prep'
];
$tabla = 'publicaciones_recetas';

$campo = isset($_POST['campo']) ? $_POST['campo'] : null;

$where = ''; //dinamico

if (is_numeric($campo)) { // Si el campo es un número, busca por ID
    $where = "WHERE id_publicacion = $campo";
} else {
    // Lógica de búsqueda por texto
    if ($campo != null) {
        $where = "WHERE (";
        $cont = count($col);
        for ($i = 0; $i < $cont; $i++) { 
            $where .= $col[$i] . " LIKE '%" . $campo . "%'"; 
            if ($i < $cont - 1) {
                $where .= " OR "; // Añadir 'OR' solo entre condiciones, no al final
            }
        }
        $where .= ")";
    }
}

$sql = "SELECT " . implode(", ", $col) . " FROM $tabla $where "; 
$resultado = $conn->query($sql);
$num_rows = $resultado->rowCount();

$html = '';

if ($num_rows > 0) {
    // Crear contenedor para las tarjetas
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        // Tarjetas de recetas
        $html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
        $html .= '<div class="card h-100">';
        $html .= '<img src="../html_paises/img/imgArg/' . $row['titulo'] . '.jpg" class="card-img-top" alt="' . $row['titulo'] . '">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">' . $row['titulo'] . '</h5>';
        $html .= '<p class="card-text">' . $row['descripcion'] . '</p>';
        $html .= '<a id="verReceta" href="#" class="btn btn-primary verReceta" data-id="' . $row['id_publicacion'] . '" data-modal="modalReceta">Ver Receta</a>';
        $html .= '</div></div></div>'; // Cerrar las etiquetas abiertas
    }
} else {
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se encontraron resultados.</p></div>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
