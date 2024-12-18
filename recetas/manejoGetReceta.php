<?php
require '../includes/conec_db.php';


if (isset($_GET['id'])) {
    $idPublicacion = $_GET['id'];
    
    

    $sql = "SELECT * FROM publicaciones_recetas WHERE id_publicacion = :id_get";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_get', $idPublicacion);
    $stmt->execute();
    $recetaData = $stmt->fetch(PDO::FETCH_ASSOC);

    //print_r($recetaData);

    $titulo = $recetaData["titulo"];
    $descripcion = $recetaData["descripcion"];
    $fecha = $recetaData["fecha_publicacion"];
    $dificultad = $recetaData["dificultad"];
    $minutos_prep = $recetaData["minutos_prep"];
    $unidad_tiempo = $recetaData["unidad_tiempo"];


    //ids
    $autor = $recetaData["id_usuario_autor"];
    $categoria = $recetaData["id_categoria"];

    $sqlAutor = "SELECT username, foto_usuario, id_pais FROM usuarios WHERE id_usuario = :autor";
    $stmtAutor = $conn->prepare($sqlAutor);
    $stmtAutor->bindParam(':autor', $autor, PDO::PARAM_INT);
    $stmtAutor->execute();
    $autorData = $stmtAutor->fetch(PDO::FETCH_ASSOC);

    //print_r($autorData);

    $nombreAutor = $autorData["username"];
    $fotoAutor = $autorData["foto_usuario"];
    $paisAutor = $autorData["id_pais"];

    $bandera= "";
    if (!empty($paisAutor)) {

        $sqlImagenP = "SELECT ruta_imagen_pais FROM paises WHERE id_pais = :id_pais";
        $stmtImagenP = $conn->prepare($sqlImagenP);
        $stmtImagenP->bindParam(':id_pais', $paisAutor, PDO::PARAM_INT);
        $stmtImagenP->execute();
        $resultadoImagen = $stmtImagenP->fetch(PDO::FETCH_ASSOC);

        if ($resultadoImagen) {

            $bandera = $resultadoImagen["ruta_imagen_pais"];
        }
    }





    if (!file_exists($fotoAutor) || $fotoAutor === 0 || empty($fotoAutor)) {
        $fotoAutor = "../fotos_usuario/default/perfil-default.jpg";
    }




    $sqlImagen = "SELECT ruta_imagen FROM imagenes WHERE id_publicacion = :id";
    $stmtImagen = $conn->prepare($sqlImagen);
    $stmtImagen->bindParam(':id', $idPublicacion, PDO::PARAM_INT);
    $stmtImagen->execute();
    $imagenData = $stmtImagen->fetchAll(PDO::FETCH_ASSOC);

    $imagenes = [];

    foreach ($imagenData as $imagen) {
        if (!empty($imagen['ruta_imagen'])) {
            $imagenes[] = htmlspecialchars($imagen["ruta_imagen"], ENT_QUOTES, 'UTF-8');
        }
    }


    if ($unidad_tiempo === "hora") {
        $minutos_prep = $minutos_prep * 60;
    }



    $sqlCategoria = "SELECT titulo FROM categorias WHERE id_categoria = :categoria";
    $stmtCategoria = $conn->prepare($sqlCategoria);
    $stmtCategoria->bindParam(':categoria', $categoria);
    $stmtCategoria->execute();
    $categoriaData = $stmtCategoria->fetch(PDO::FETCH_ASSOC);

    //print_r($categoriaData);

    $categoriaTitulo = $categoriaData["titulo"];


    $sqlEtiquetaReceta = "SELECT id_etiqueta FROM etiquetas_recetas WHERE id_publicacion = :id";
    $stmtEtiquetaReceta = $conn->prepare($sqlEtiquetaReceta);
    $stmtEtiquetaReceta->bindParam(':id', $idPublicacion, PDO::PARAM_INT);
    $stmtEtiquetaReceta->execute();
    $etiquetaRecetaData = $stmtEtiquetaReceta->fetchAll(PDO::FETCH_ASSOC);

    $etiquetas = [];
    foreach ($etiquetaRecetaData as $etiqueta) {
        $idEtiqueta = $etiqueta['id_etiqueta'];

        $sqlEtiqueta = "SELECT titulo FROM etiquetas WHERE id_etiqueta = :id_etiqueta";
        $stmtEtiqueta = $conn->prepare($sqlEtiqueta);
        $stmtEtiqueta->bindParam(':id_etiqueta', $idEtiqueta, PDO::PARAM_INT);
        $stmtEtiqueta->execute();
        $etiquetaData = $stmtEtiqueta->fetch(PDO::FETCH_ASSOC);

        if ($etiquetaData) {
            $etiquetaTitulo = $etiquetaData['titulo'];

            $etiquetas[] = [
                'titulo' => htmlspecialchars($etiquetaTitulo, ENT_QUOTES, 'UTF-8'),
            ];
        }
    }

    $sqlPaisReceta = "SELECT * FROM paises_recetas WHERE id_publicacion = :id";
    $stmtPaisReceta = $conn->prepare($sqlPaisReceta);
    $stmtPaisReceta->bindParam(':id', $idPublicacion, PDO::PARAM_INT);
    $stmtPaisReceta->execute();
    $paisRecetaData = $stmtPaisReceta->fetchAll(PDO::FETCH_ASSOC);

    $paises = [];
    foreach ($paisRecetaData as $pais) {
        $idPais = $pais['id_pais'];
        $idPaisReceta = $pais["id_pais_receta"];
        //print_r($idPaisReceta);

        $sqlPais = "SELECT nombre, ruta_imagen_pais FROM paises WHERE id_pais = :id_pais";
        $stmtPais = $conn->prepare($sqlPais);
        $stmtPais->bindParam(':id_pais', $idPais, PDO::PARAM_INT);
        $stmtPais->execute();
        $paisData = $stmtPais->fetch(PDO::FETCH_ASSOC);

        if ($paisData) {
            $paisNombre = $paisData['nombre'];
            $paisImagen = $paisData['ruta_imagen_pais'];

            $paises[] = [
                'nombre' => htmlspecialchars($paisNombre, ENT_QUOTES, 'UTF-8'),
                'ruta_imagen_pais' => htmlspecialchars($paisImagen, ENT_QUOTES, 'UTF-8'),

            ];
        }
    }


    $sqlIngredienteReceta = "SELECT id_ingrediente, cantidad, id_ingrediente_receta FROM ingredientes_recetas WHERE id_publicacion = :id";
    $stmtIngredienteReceta = $conn->prepare($sqlIngredienteReceta);
    $stmtIngredienteReceta->bindParam(':id', $idPublicacion, PDO::PARAM_INT);
    $stmtIngredienteReceta->execute();
    $ingredienteRecetaData = $stmtIngredienteReceta->fetchAll(PDO::FETCH_ASSOC);

    $ingredientes = [];
    foreach ($ingredienteRecetaData as $ingrediente) {
        $idIngrediente = $ingrediente['id_ingrediente'];
        $cantidadIngrediente = $ingrediente['cantidad'];
        $idIngredienteReceta = ['id_ingrediente_receta'];

        $sqlIngrediente = "SELECT nombre FROM ingredientes WHERE id_ingrediente = :id_ingrediente";
        $stmtIngrediente = $conn->prepare($sqlIngrediente);
        $stmtIngrediente->bindParam(':id_ingrediente', $idIngrediente, PDO::PARAM_INT);
        $stmtIngrediente->execute();
        $ingredienteData = $stmtIngrediente->fetch(PDO::FETCH_ASSOC);

        if ($ingredienteData) {
            $ingredienteNombre = $ingredienteData['nombre'];

            $ingredientes[] = [
                'nombre' => htmlspecialchars($ingredienteNombre, ENT_QUOTES, 'UTF-8'),
                'cantidad' => htmlspecialchars($cantidadIngrediente, ENT_QUOTES, 'UTF-8'),
                'id_ingrediente_receta' => $idIngredienteReceta
            ];
        }
    }

    $sqlPaso = "SELECT id_paso, num_paso, texto FROM pasos_recetas WHERE id_publicacion = :id";
    $stmtPaso = $conn->prepare($sqlPaso);
    $stmtPaso->bindParam(':id', $idPublicacion, PDO::PARAM_INT);
    $stmtPaso->execute();
    $pasoData = $stmtPaso->fetchAll(PDO::FETCH_ASSOC);

    $pasos = [];
    foreach ($pasoData as $paso) {
        $idPaso = $paso['id_paso'];

        //print_r($idPaso);
        $numeroPaso = $paso['num_paso'];
        $textoPaso = $paso['texto'];


        $sqlPasoImagen = "SELECT ruta_imagen_paso FROM imagenes_pasos WHERE id_paso = :id_paso";
        $stmtPasoImagen = $conn->prepare($sqlPasoImagen);
        $stmtPasoImagen->bindParam(':id_paso', $idPaso, PDO::PARAM_INT);
        $stmtPasoImagen->execute();
        $pasoImagenData = $stmtPasoImagen->fetchAll(PDO::FETCH_ASSOC);

        $imagenesPaso = [];
        foreach ($pasoImagenData as $imagenPaso) {
            if (!empty($imagenPaso['ruta_imagen_paso'])) {
                $imagenesPaso[] = htmlspecialchars($imagenPaso['ruta_imagen_paso'], ENT_QUOTES, 'UTF-8');
            }
        }

        $pasos[] = [
            'id_paso_receta' => $idPaso,
            'num_paso' => htmlspecialchars($numeroPaso, ENT_QUOTES, 'UTF-8'),
            'texto' => htmlspecialchars($textoPaso, ENT_QUOTES, 'UTF-8'),
            'imagenes' => $imagenesPaso
        ];
    }















   //tomo a partir de los primeros 3 
    $claveBusqueda = substr($titulo, 0, 3);

    // verifico que tenga al menso 3
    if (strlen($claveBusqueda) >= 3) {
        $sqlRecetasRelacionadas = "
    SELECT 
        publicaciones_recetas.*, 
        COALESCE(AVG(valoraciones.puntuacion), 0) AS valoracion_puntaje,
        imagenes.ruta_imagen AS imagenes
    FROM 
        publicaciones_recetas
    LEFT JOIN 
        valoraciones 
        ON publicaciones_recetas.id_publicacion = valoraciones.id_publicacion
    LEFT JOIN 
        imagenes 
        ON imagenes.id_publicacion = publicaciones_recetas.id_publicacion
    WHERE 
        publicaciones_recetas.titulo LIKE :claveBusqueda
        AND publicaciones_recetas.id_publicacion != :id_actual
    GROUP BY 
        publicaciones_recetas.id_publicacion
    ";

        $stmtRecetasRelacionadas = $conn->prepare($sqlRecetasRelacionadas);
        $tituloBusqueda = $claveBusqueda . '%'; 
        $stmtRecetasRelacionadas->bindParam(':claveBusqueda', $tituloBusqueda, PDO::PARAM_STR);
        $stmtRecetasRelacionadas->bindParam(':id_actual', $idPublicacion, PDO::PARAM_INT);
        $stmtRecetasRelacionadas->execute();

        $recetasRelacionadas = $stmtRecetasRelacionadas->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $recetasRelacionadas = [];
    }

}
