<?php

require '../includes/conec_db.php';

$tabla = 'publicaciones_recetas';
$col = [
    'id_publicacion',
    'titulo',
    'descripcion',
    'fecha_publicacion',
    'dificultad',
    'minutos_prep'
];

$campo = isset($_POST['campo']) ? $_POST['campo'] : null;

$html = '';

if ($campo != null) {

    $sql = "SELECT " . implode(", ", $col) . " FROM $tabla WHERE titulo LIKE :campo";
    $stmt = $conn->prepare($sql);
    $campo = "%" . $campo . "%";
    $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
    $stmt->execute();
    $num_rows = $stmt->rowCount();

    if ($num_rows > 0) {
        // crear el HTML de las recetas
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $imagen = '../html_paises/img/imgArg/' . $row['titulo'] . '.jpg'; //foto desde carpeta por ahora.
            if (!file_exists($imagen)) {
                $imagen = '../html_paises/img/imgArg/default.jpg'; // Imagen por defecto
            }

            // formato de la receta en el buscador
            $html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
            $html .= '<div class="card h-100">';
            $html .= '<div class="card-img-wrapper">'; 
            $html .= '<img src="' . $imagen . '" class="card-img-top" alt="' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '">';
            $html .= '<div class="card-overlay">'; 
            $html .= '<div class="card-details">'; 
            $html .= '<p class="card-text dificultad">' . htmlspecialchars($row['dificultad'], ENT_QUOTES, 'UTF-8') . '</p>';
            $html .= '<p class="card-text minutos">' . htmlspecialchars($row['minutos_prep'], ENT_QUOTES, 'UTF-8') . ' min</p>';
            $html .= '</div>'; 
            $html .= '</div>'; 
            $html .= '</div>'; 
            $html .= '<div class="card-body text-left">'; 
            $html .= '<h5 class="card-title receta-titulo">' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '</h5>';
            $html .= '</div></div></div>'; 

        }
    } else {
        $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se encontraron resultados.</p></div>';
    }
} else {
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se ingresó ninguna busqueda.</p></div>';
}

echo $html;
