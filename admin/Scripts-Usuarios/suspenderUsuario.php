<?php
require_once('../../includes/conec_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $UserID = isset($_POST["cuentaID"]) ? $_POST["cuentaID"] : NULL;
    $fechaDuracionBan = isset($_POST["inputDuracionBan"]) ? $_POST["inputDuracionBan"] : NULL;
    $flagChecked = false;

    if(isset($_POST["inputPermaBan"])){
        $flagChecked = true;
    }

    if (empty($_POST["cuentaID"])) {

        echo json_encode([
            'success' => false,
            'message' => 'Datos de actualización de categoria incompletos..'
        ]);

        exit();
    }//verifico que todos los campos estén presentes antes de hacer update.

    $fechaYHoraActual = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
    $FechaHoraFormateada = $fechaYHoraActual->format('Y-m-d H:i:s');

    if ( ($flagChecked == false) && (!($fechaDuracionBan > $FechaHoraFormateada)) ) {
        echo json_encode([
            'success' => false,
            'message' => 'La fecha ingresada debe ser posterior a la actual..'
        ]);

        exit();
    }

    // Hago update a la tabla usuarios con los datos que traigo en POST.

    if ($flagChecked == true) {
        $fechaDuracionBan = '0000-00-00 00:00:00';
    }

    $sqlQueryBan = "UPDATE usuarios SET estad_suspendido = :FechaBan WHERE id_usuario = :UserID";

    $QueryLlamado = $conn->prepare($sqlQueryBan); //Preparo la consulta que me actualiza una categoria
    $QueryLlamado->bindParam(':FechaBan', $fechaDuracionBan, PDO::PARAM_STR);
    $QueryLlamado->bindParam(':UserID', $UserID, PDO::PARAM_INT);

    if ($QueryLlamado->execute()) { //si se pudo editar, devuelvo true como señal al frontend
        
        $sqlQuery = "DELETE FROM reportes WHERE id_obj_reportado = :ID_Usuario AND tipo_obj_reportado = 'usuario'";
        $QueryExec = $conn->prepare($sqlQuery); //Preparo la consulta que me elimina reportes hechos a un usuario
        $QueryExec->bindParam(':ID_Usuario', $UserID, PDO::PARAM_INT);

        if ($QueryExec->execute()) { //si se pudo eliminar, devuelvo true como señal al frontend
            
            // Devuelve el JSON con el header correcto
            header('Content-Type: application/json');

            echo json_encode([
                'success' => true
            ]);

        }else{
            echo json_encode([
                'success' => false,
                'message' => 'Error al ejecutar querySQL.'
            ]);
        }

    }else{
        echo json_encode([
            'success' => false,
            'message' => 'Error al ejecutar querySQL.'
        ]);
    }

} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error en el envío de la petición POST.'
    ]);
}
?>