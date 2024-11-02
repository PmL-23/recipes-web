<?php
session_start();

require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tituloEtiqueta = isset($_POST["inputEtiquetaTitulo"]) ? $_POST["inputEtiquetaTitulo"] : NULL; //Seteamos el titulo de la etiqueta a editar.

    $EtiquetaID = isset($_POST["etiquetaID"]) ? $_POST["etiquetaID"] : NULL;

    if (empty($_POST["inputEtiquetaTitulo"]) || empty($_POST["etiquetaID"])) {
        echo "Datos de actualización de etiqueta incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes de hacer update.

    // Hago update a la tabla etiqueta con los datos que traigo en POST.

    $sqlQueryEtiqueta = "UPDATE etiquetas SET titulo = :tituloEtiqueta WHERE id_etiqueta = :EtiquetaID";

    $QueryLlamado = $conn->prepare($sqlQueryEtiqueta);

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':EtiquetaID', $EtiquetaID, PDO::PARAM_STR);
    $QueryLlamado->bindParam(':tituloEtiqueta', $tituloEtiqueta, PDO::PARAM_STR); //con esto nada mas establezco los valores que obtuve a la consulta

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