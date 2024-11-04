<?php

session_start();

require_once('../includes/conec_db.php');

    $ing = $_GET['ing'];

    $ingredientesQuery = "SELECT nombre, id_ingrediente FROM ingredientes WHERE nombre LIKE :ing_ingresado";
    $ing_ingresado = $ing."%";
    $queryResultsIngredientes = $conn->prepare($ingredientesQuery);
    $queryResultsIngredientes->bindParam(':ing_ingresado', $ing_ingresado, PDO::PARAM_STR);
    $queryResultsIngredientes->execute();

    $ingredientes = $queryResultsIngredientes->fetchAll(PDO::FETCH_ASSOC);

    if ($ingredientes === false) {
        echo "Error en la consulta SQL";
    }

    header('Content-Type: application/json');
    echo json_encode($ingredientes);


?>
