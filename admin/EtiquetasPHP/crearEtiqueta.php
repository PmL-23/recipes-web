<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tituloEtiqueta = isset($_POST["inputEtiquetaTitulo"]) ? $_POST["inputEtiquetaTitulo"] : NULL; //Seteamos el campo de titulo de la nueva etiqueta.

    if (empty($_POST["inputEtiquetaTitulo"])) {
        echo "Datos de inserción de etiqueta incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de hacer insert.

    // Inserto a la tabla etiqueta los datos que traigo en POST.

    $sqlQuery = "INSERT INTO etiquetas(titulo) VALUES (:TituloEtiqueta)";
    $QueryLlamado = $conn->prepare($sqlQuery); //Preparo la consulta que me inserta un ingrediente

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':TituloEtiqueta', $tituloEtiqueta, PDO::PARAM_STR); //con esto nada mas establezco los valores que obtuve a la query

    if ($QueryLlamado->execute()) { //si se pudo crear etiqueta, devuelvo true como señal al frontend
        
        // Devuelve el JSON con el header correcto
        header('Content-Type: application/json');

        $ultimoIDInsertado = $conn->lastInsertId();
        
        if (!empty($ultimoIDInsertado) && is_numeric($ultimoIDInsertado)) {

            echo json_encode([
                'success' => true
            ]);

        }else{
            echo json_encode([
                'success' => false
            ]);
        }

    }else{
        echo json_encode([
            'success' => false
        ]);
    }

} else {
    echo "Faltan campos en la solicitud.";
}
?>