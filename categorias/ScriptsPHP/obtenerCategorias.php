<?php
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sqlQuery = "SELECT * FROM categorias WHERE estado = 1 ORDER BY categorias.id_categoria DESC";
    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todas las categorias cargadas

    if (!$queryResults) {
        echo "Error en la consulta SQL";
        exit();
    }

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo las categorias al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $listaDeCategorias = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {
            $listaDeCategorias[] = [
                'id_categoria' => $row['id_categoria'],  //ID de etiqueta
                'titulo' => $row['titulo'],  // Titulo de etiqueta
                'nombre_imagen' => $row['nombre_imagen'],  // Nombre del archivo de imagen
                'seccion' => $row['seccion'],  // Seccion de la categoria
            ];
        }

        echo json_encode($listaDeCategorias);

    }else{
        echo "Error al publicar comentario";
    }

} else {
    echo "Faltan campos en la solicitud.";
}

?>