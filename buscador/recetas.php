<?php
// buscar2.php
require '../includes/conec_db.php'; // Conexión a la base de datos

// Columnas que vamos a seleccionar
$col = [
    'id_publicacion',
    'titulo',
    'descripcion',
    'fecha_publicacion',
    'dificultad',
    'minutos_prep'
];

// Nombre de la tabla
$tabla = 'publicaciones_recetas';

// Obtener el campo enviado desde el formulario (en este caso el título)
$campo = isset($_POST['campo']) ? $_POST['campo'] : null;

$html = ''; // Variable para almacenar el HTML generado

if ($campo != null) {
    // Preparar la consulta para buscar coincidencias parciales con LIKE
    $sql = "SELECT " . implode(", ", $col) . " FROM $tabla WHERE titulo LIKE :campo";
    $stmt = $conn->prepare($sql);
    $campo = "%" . $campo . "%"; // Agregar comodines para buscar coincidencias parciales
    $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();
    $num_rows = $stmt->rowCount(); // Contar resultados

    if ($num_rows > 0) {
        // Si hay resultados, crear el HTML de las recetas
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $imagen = '../html_paises/img/imgArg/' . $row['titulo'] . '.jpg';

            // Verifica si la imagen existe, de lo contrario usa una imagen por defecto
            if (!file_exists($imagen)) {
                $imagen = '../html_paises/img/imgArg/default.jpg'; // Imagen por defecto
            }

// Crear la tarjeta con la receta
$html .= '<div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">';
$html .= '<div class="card h-100">';
$html .= '<div class="card-img-wrapper">'; // Envuelve la imagen
$html .= '<img src="' . $imagen . '" class="card-img-top" alt="' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '">';
$html .= '<div class="card-overlay">'; // Capa para la dificultad y minutos
$html .= '<div class="card-details">'; // Contenedor para detalles
$html .= '<p class="card-text dificultad">' . htmlspecialchars($row['dificultad'], ENT_QUOTES, 'UTF-8') . '</p>';
$html .= '<p class="card-text minutos">' . htmlspecialchars($row['minutos_prep'], ENT_QUOTES, 'UTF-8') . ' min</p>';
$html .= '</div>'; // Cerrar el contenedor de detalles
$html .= '</div>'; // Cerrar la capa
$html .= '</div>'; // Cerrar el contenedor de la imagen
$html .= '<div class="card-body text-left">'; // Añadimos 'text-left' para alinear el contenido a la izquierda
$html .= '<h5 class="card-title receta-titulo">' . htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') . '</h5>';
$html .= '</div></div></div>'; // Cerrar las etiquetas abiertas


        }
    } else {
        // Si no hay resultados, mostrar un mensaje
        $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se encontraron resultados.</p></div>';
    }
} else {
    // Si no se ingresó nada en el campo, mostrar un mensaje
    $html .= '<div class="col-12 contenedor-titulo titulo"><p>No se ingresó ningún título.</p></div>';
}

// Mostrar el HTML generado
echo $html;
