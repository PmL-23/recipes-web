<?php
session_start();
require_once('../../includes/conec_db.php');  //todos los archivos que se necesitan
require_once('../../includes/permisos.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['id']) && isset($_SESSION['nomUsuario'])) {
            
        $usuarioID = $_SESSION['id']; // ID Usuario logueado

        if (!Permisos::tienePermiso('Ignorar Reportes Publicacion', $usuarioID)) {
            echo json_encode(['success' => false, 'message' => 'Error, no posee el permiso para ignorar publicaciones reportadas.']);
            exit();
        }
        
    }else{
        echo json_encode(['success' => false, 'message' => 'Necesitas iniciar sesión para poder ignorar publicaciones reportadas..', 'id_publicacion_receta' => $id_publicacion_receta]);
        exit();
    }

    $PublicacionID = isset($_POST["ItemID"]) ? $_POST["ItemID"] : NULL;

    if (empty($_POST["ItemID"])) {
        echo "Datos incompletos.";
        exit();
    }//verifico que todos los campos estén presentes antes.

    $sqlQuery = "DELETE FROM reportes WHERE id_obj_reportado = :ID_Publicacion AND tipo_obj_reportado = 'publicacion'";
    $QueryLlamado = $conn->prepare($sqlQuery); //Preparo la consulta que me elimina reportes hechos a una publicación

    if (!$QueryLlamado) {
        echo "Error en la consulta SQL";
        exit();
    }

    $QueryLlamado->bindParam(':ID_Publicacion', $PublicacionID, PDO::PARAM_INT);

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