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

$where = '';//dinamico

if($campo != null) {
    $where = "WHERE (";
    $cont = count($col);
    for ($i=0; $i < $cont; $i++) { 
        $where .= $col[$i] . " LIKE '%" . $campo . "%'" ; 
        if ($i < $cont - 1) {
            $where .= " OR "; // Añadir 'OR' solo entre condiciones, no al final
        }
    }
    $where .= ")";
}


// $sql = "INSERT INTO tu_tabla (campo) VALUES (:campo)";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
// $stmt->execute();
$sql = "SELECT " . implode(", ", $col) . " FROM $tabla $where "; 
$resultado = $conn->query($sql);
$num_rows = $resultado->rowCount();

$html = '';

if($num_rows > 0) {
    // Añadir contenedor y fila al principio
    $html .= '<div class="container mt-5"><div class="row">';

    while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        // Cambia este bloque para devolver las recetas en formato de tarjeta
        $html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
        $html .= '<div class="card h-100">';
        $html .= '<img src="../html_paises/img/imgArg/' . $row['titulo'] . '.jpg" class="card-img-top" alt="' . $row['titulo'] . '">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">' . $row['titulo'] . '</h5>';
        $html .= '<p class="card-text">' . $row['descripcion'] . '</p>';
        $html .= '<a id="verReceta" href="#" class="btn btn-primary verReceta" data-id="' . $row['id_publicacion'] . '" data-modal="modalReceta">Ver Receta</a>';

        
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    }
} else {
    $html .= '<div class="col-12"><p>No se encontraron resultados.</p></div>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);