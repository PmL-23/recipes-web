<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $IDEtiqueta = isset($_POST["ItemID"]) ? $_POST["ItemID"] : NULL;

    if (empty($_POST["ItemID"])) {
        echo "Datos de eliminación de etiqueta incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de eliminar.

    // Hago delete del campo a la tabla etiqueta con los datos que traigo en POST.

    $sqlQueryEtiqueta = "DELETE FROM etiquetas WHERE id_etiqueta = :IDEtiqueta";
    $QueryLlamado = $conn->prepare($sqlQueryEtiqueta); //Preparo la consulta que me elimina una etiqueta

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':IDEtiqueta', $IDEtiqueta, PDO::PARAM_STR);

    if ($QueryLlamado->execute()) { //si se pudo eliminar, devuelvo true como señal al frontend
        
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