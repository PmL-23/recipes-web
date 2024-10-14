<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sqlQuery = "SELECT 
  (SELECT COUNT(*) FROM categorias) AS totalCategorias,
  (SELECT COUNT(*) FROM etiquetas) AS totalEtiquetas,
  (SELECT COUNT(*) FROM ingredientes) AS totalIngredientes";
    $queryResults = $conn->prepare($sqlQuery); //Preparo la consulta que me trae la cantidad de campos en las tablas gestionadas por admin

    if (!$queryResults) {
        echo "Error en la consulta SQL";
        exit();
    }

    if ($queryResults->execute()) { //Si se ejecuta bien la query devuelvo los campos
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        // Devolver las contadores como JSON
        echo json_encode($queryResults->fetch(PDO::FETCH_ASSOC));

    }else{
        echo "Error al obtener contadores";
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>