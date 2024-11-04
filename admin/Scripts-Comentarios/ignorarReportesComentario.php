<?php
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ComentarioID = isset($_POST["ItemID"]) ? $_POST["ItemID"] : NULL;

    if (empty($_POST["ItemID"])) {
        echo "Datos incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes.

    $sqlQuery = "DELETE FROM reportes WHERE id_obj_reportado = :ID_Comentario AND tipo_obj_reportado = 'comentario'";
    $QueryLlamado = $conn->prepare($sqlQuery); //Preparo la consulta que me elimina reportes hechos a un comentario

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':ID_Comentario', $ComentarioID, PDO::PARAM_INT);

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