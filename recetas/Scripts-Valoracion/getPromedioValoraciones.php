<?php
require_once('../../includes/conec_db.php');

/* if (!Permisos::tienePermiso('Valorar publicacion', $usuarioID)) {//validamos que tenga permiso para valorar, de lo contrario, mostramos error
    echo("error al valorar, no tiene permiso.");
    header('Location: ../Vistas/index.php'); //Si el usuario intento valorar y no tiene permiso, vuelvo al indice, mejorar en versiones futuras*
    exit();
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $id_publicacion_receta = isset($_POST["id_publicacion_receta"]) ? $_POST["id_publicacion_receta"] : NULL;

        $query = "SELECT AVG(puntuacion) valoracionPromedio FROM valoraciones WHERE id_publicacion = :id_publicacion_receta";
        
        $ConsultaPromedioValoracion = $conn->prepare($query);
        $ConsultaPromedioValoracion->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);

        if ($ConsultaPromedioValoracion->execute()) {

            $promedio = $ConsultaPromedioValoracion->fetch(PDO::FETCH_ASSOC);

            // Devuelve el JSON con el header correcto
            header('Content-Type: application/json');
                        
            echo json_encode([
                'success' => true,
                'valor' => $promedio['valoracionPromedio']
            ]);

        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar valoracion..']);
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

}