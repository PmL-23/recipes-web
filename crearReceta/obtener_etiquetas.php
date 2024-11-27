<?php

session_start();

require_once('../includes/conec_db.php');

    $etiquetasQuery = "SELECT * FROM etiquetas ORDER BY etiquetas.id_etiqueta DESC";
    $queryResultsEtiquetas = $conn->prepare($etiquetasQuery);
    $queryResultsEtiquetas->execute(); 

    $etiquetas = $queryResultsEtiquetas->fetchAll(PDO::FETCH_ASSOC);

    if ($etiquetas === false) {
        echo "Error en la consulta SQL";
    }

    header('Content-Type: application/json');
    echo json_encode($etiquetas);

?>
