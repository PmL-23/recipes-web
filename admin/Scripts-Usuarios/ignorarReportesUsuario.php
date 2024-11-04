<?php
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $IDUsuario = isset($_POST["ItemID"]) ? $_POST["ItemID"] : NULL;

    if (empty($_POST["ItemID"])) {
        echo "Datos incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes.

    $sqlQuery = "DELETE FROM reportes WHERE id_obj_reportado = :IDUsuario AND tipo_obj_reportado = 'usuario'";
    $QueryLlamado = $conn->prepare($sqlQuery); //Preparo la consulta que me elimina reportes hechos a un usuario

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':IDUsuario', $IDUsuario, PDO::PARAM_INT);

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