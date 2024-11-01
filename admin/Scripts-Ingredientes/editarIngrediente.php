<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombreIngrediente = isset($_POST["inputIngredienteTitulo"]) ? $_POST["inputIngredienteTitulo"] : NULL;

    $IngredienteID = isset($_POST["ingredienteID"]) ? $_POST["ingredienteID"] : NULL;

    if (empty($_POST["inputIngredienteTitulo"]) || empty($_POST["ingredienteID"])) {
        echo "Datos de actualización de ingrediente incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de hacer update.

    // Hago update a la tabla ingrediente con los datos que traigo en POST.

    $sqlQueryIngrediente = "UPDATE ingredientes SET nombre = :nombreIngrediente WHERE id_ingrediente = :IngredienteID";

    $QueryLlamado = $conn->prepare($sqlQueryIngrediente);

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':IngredienteID', $IngredienteID, PDO::PARAM_STR);
    $QueryLlamado->bindParam(':nombreIngrediente', $nombreIngrediente, PDO::PARAM_STR); //con esto nada mas establezco los valores que obtuve a la consulta

    if ($QueryLlamado->execute()) { //si se pudo editar, devuelvo true como señal al frontend
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        echo json_encode([
            'success' => true
        ]);

    }else{
        echo json_encode([
            'success' => false
        ]);
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>