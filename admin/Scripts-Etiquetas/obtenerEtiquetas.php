<?php
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sqlQuery = "SELECT * FROM etiquetas WHERE estado = 1 ORDER BY etiquetas.id_etiqueta DESC";
    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae todas las etiquetas cargadas

    if (!$queryResults) {
        echo "Error en la consulta SQL";
        exit();
    }

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo las etiquetas al front
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $etiquetas = [];

        // Recorrer los resultados
        while ($row = $queryResults->fetch(PDO::FETCH_ASSOC)) {
            $etiquetas[] = [
                'id_etiqueta' => $row['id_etiqueta'],  //ID de etiqueta
                'titulo' => $row['titulo'],  // Titulo de etiqueta
            ];
        }

        // Devolver las etiquetas como JSON
        echo json_encode($etiquetas);

    }else{
        echo "Error al obtener etiquetas";
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>