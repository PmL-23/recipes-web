<?php
session_start();
require_once('../includes/conec_db.php');

$msjPaso = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dataPaso = json_decode(file_get_contents('php://input'), true);

    if (isset($dataPaso['id_paso_receta'])) {

        $id_paso_eliminado = $dataPaso['id_paso_receta'];

        
        $sqlEliminarPasoImg = "DELETE FROM imagenes_pasos WHERE id_paso = :id_paso";
        $stmtEliminarPasoImg = $conn->prepare($sqlEliminarPasoImg);
        $stmtEliminarPasoImg->bindParam(':id_paso', $id_paso_eliminado, PDO::PARAM_INT);
        $stmtEliminarPasoImg->execute();

        
        $sqlEliminarPaso = "DELETE FROM pasos_recetas WHERE id_paso = :id_paso";
        $stmtEliminarPaso = $conn->prepare($sqlEliminarPaso);
        $stmtEliminarPaso->bindParam(':id_paso', $id_paso_eliminado, PDO::PARAM_INT);

        if ($stmtEliminarPaso->execute()) {
            $msjPaso['success'] = true;
        } else {
            $msjPaso['success'] = false;
            $msjPaso['message'] = "Error al eliminar el paso";
        }
    } else {
        $msjPaso['success'] = false;
        $msjPaso['message'] = "Datos inválidos"; 
    }
    
    echo json_encode($msjPaso);
}
?>
