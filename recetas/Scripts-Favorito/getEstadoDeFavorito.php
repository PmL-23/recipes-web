<?php

require_once('../includes/conec_db.php');

if(isset($_SESSION['id']))
{
    $usuarioID = $_SESSION['id'];//establezco el usuario id con el id de la sesion
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        $ID_Receta = isset($_GET['id']) ? intval($_GET['id']) : null;

        if ($ID_Receta) {

            $query = $conn->prepare("SELECT id_favorito FROM favoritos WHERE id_publicacion = :ID_Publicacion_Receta AND id_usuario = :IDUsuario");
            $query->bindParam(':ID_Publicacion_Receta', $ID_Receta);
            $query->bindParam(':IDUsuario', $usuarioID);
            $query->execute();
    
            $EstadoDeRecetaFav = $query->fetch(PDO::FETCH_ASSOC);
    
        } else {

            $EstadoDeRecetaFav = null;
        }

    } catch (PDOException $e) {
        // Manejar cualquier error en la consulta o conexión
        echo $e->getMessage();
    }

}  
?>