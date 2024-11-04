<?php
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sqlQuery = "SELECT publicaciones_recetas.id_publicacion, publicaciones_recetas.titulo, publicaciones_recetas.descripcion, publicaciones_recetas.fecha_publicacion, COUNT(DISTINCT reportes.id_reporte) as cantidad_reportes, imagenes.ruta_imagen FROM publicaciones_recetas LEFT JOIN reportes ON publicaciones_recetas.id_publicacion = reportes.id_obj_reportado LEFT JOIN imagenes ON publicaciones_recetas.id_publicacion = imagenes.id_publicacion WHERE reportes.tipo_obj_reportado = 'publicacion' GROUP BY publicaciones_recetas.id_publicacion, publicaciones_recetas.titulo, publicaciones_recetas.descripcion, publicaciones_recetas.fecha_publicacion";

    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todas las publicaciones reportadas, su cantidad de reportes y otros datos.

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo los comentarios al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $listaDePublicaciones = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {

            $listaDePublicaciones[] = [
                'id_publicacion' => $row['id_publicacion'],
                'titulo' => $row['titulo'],
                'descripcion' => $row['descripcion'],
                'fecha_publicacion' => $row['fecha_publicacion'],
                'cant_reportes' => $row['cantidad_reportes'],
                'ruta_imagen' => $row['ruta_imagen']
            ];

        }

        echo json_encode([
            'success' => true,
            'publicaciones' => $listaDePublicaciones
        ]);

    }else{

        echo json_encode([
            'success' => false,
            'message' => 'Error al traer publicaciones reportadas'
        ]);

    }

} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la solicitud GET'
    ]);
}
?>