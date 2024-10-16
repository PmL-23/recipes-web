<?php
//cargaremos los datos con ajax
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

$sql = "SELECT " . implode(", ", $col) . " FROM $tabla $where "; 
$resultado = $conn->query($sql);
$num_rows = $resultado->rowCount();

$html = '';

if ($num_rows > 0) {
    // Crear contenedor para los títulos
    $html .= '<div id="tituloContainer">';

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        // Cambia este bloque para que el contenedor completo sea un enlace
        $html .= '<div class="col-12 contenedor-titulo" onclick="window.location.href=\'receta.php?id=' . $row['id_publicacion'] . '\'">';
        $html .= '<div class="titulo">' . $row['titulo'] . '</div>'; // Título sin enlace
        $html .= '</div>';
    }

    $html .= '</div>'; // Cerrar contenedor
} else {
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se encontraron resultados.</p></div>';
}


echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>
