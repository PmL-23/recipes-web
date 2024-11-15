<?php

require_once('../includes/conec_db.php');  //todos los archivos que se necesitan

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $categoriaID = isset($_GET['categoria_id']) ? intval($_GET['categoria_id']) : null;

    if ($categoriaID) {

        $stmt = $conn->prepare("SELECT titulo FROM categorias WHERE id_categoria = :CategoriaID");
        $stmt->bindParam(':CategoriaID', $categoriaID);
        $stmt->execute();
        $categoriaTitulo = $stmt->fetch(PDO::FETCH_ASSOC);

        $queryStr = "
           SELECT DISTINCT 
            publicaciones_recetas.*, 
            valoraciones.puntuacion AS valoracion_puntaje, 
            AVG(valoraciones.puntuacion) AS promedio_valoracion 
        FROM 
            publicaciones_recetas 
        JOIN 
            categorias 
            ON categorias.id_categoria = publicaciones_recetas.id_categoria 
        LEFT JOIN 
            valoraciones 
            ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion 
        WHERE 
            categorias.id_categoria = :ID_Categoria
        GROUP BY 
            publicaciones_recetas.id_publicacion 
        HAVING 
            promedio_valoracion IS NOT NULL OR promedio_valoracion IS NULL";

        $consulta = $conn->prepare($queryStr);
        $consulta->bindParam(':ID_Categoria', $categoriaID);
        $consulta->execute();

        $recetasDeCategoria = $consulta->fetchAll(\PDO::FETCH_ASSOC);
    } else {
        $categoriaTitulo = null;
        $recetasDeCategoria = [];
    }
}
