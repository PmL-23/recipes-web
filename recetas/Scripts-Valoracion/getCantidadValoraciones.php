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

        $query = "SELECT (SELECT COUNT(*) FROM valoraciones WHERE id_publicacion = :id_publicacion_receta) AS totalValoraciones, (SELECT COUNT(*) FROM valoraciones WHERE puntuacion = 5 AND id_publicacion = :id_publicacion_receta) AS cantPuntuacion5, (SELECT COUNT(*) FROM valoraciones WHERE puntuacion = 4 AND id_publicacion = :id_publicacion_receta) AS cantPuntuacion4, (SELECT COUNT(*) FROM valoraciones WHERE puntuacion = 3 AND id_publicacion = :id_publicacion_receta) AS cantPuntuacion3, (SELECT COUNT(*) FROM valoraciones WHERE puntuacion = 2 AND id_publicacion = :id_publicacion_receta) AS cantPuntuacion2, (SELECT COUNT(*) FROM valoraciones WHERE puntuacion = 1 AND id_publicacion = :id_publicacion_receta) AS cantPuntuacion1";
        
        $ConsultaCantValoraciones = $conn->prepare($query);
        $ConsultaCantValoraciones->bindParam(':id_publicacion_receta', $id_publicacion_receta, PDO::PARAM_INT);

        if ($ConsultaCantValoraciones->execute()) {

            $resultado = $ConsultaCantValoraciones->fetch(PDO::FETCH_ASSOC);

            // Devuelve el JSON con el header correcto
            header('Content-Type: application/json');
                        
            echo json_encode([
                'success' => true,
                'cantTotalValoraciones' => $resultado['totalValoraciones'],
                'cantCincoEstrellas' => $resultado['cantPuntuacion5'],
                'cantCuatroEstrellas' => $resultado['cantPuntuacion4'],
                'cantTresEstrellas' => $resultado['cantPuntuacion3'],
                'cantDosEstrellas' => $resultado['cantPuntuacion2'],
                'cantUnaEstrella' => $resultado['cantPuntuacion1']
            ]);

        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar valoracion..']);
        }

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

}