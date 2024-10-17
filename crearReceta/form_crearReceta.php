<?php
session_start();

$serverName = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "proyecto_recetas_prog_web";

$conn = new PDO("mysql:host=".$serverName.";dbname=".$dbname.";charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


$id_usuario_autor = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formValid= true;

    $portada = isset($_FILES["portada"]) ? $_FILES["portada"] : NULL;
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : NULL;
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : NULL;
    $dificultad = isset($_POST["dificultad"]) ? $_POST["dificultad"] : NULL;
    $tiempo = isset($_POST["minutos_prep"]) ? $_POST["minutos_prep"] : NULL;

    if (empty($titulo) || empty($descripcion) || empty($dificultad) || empty($tiempo) || empty($id_usuario_autor) || empty($categoria)) {
        echo "Datos incompletos.";
        exit();
      //  $formValid= false;
    }

    
    $sqlQueryPublicacion = "INSERT INTO publicaciones_recetas(titulo, descripcion, dificultad, minutos_prep, id_usuario_autor, id_categoria) VALUES (:titulo, :descripcion, :dificultad, :tiempo, :id_usuario_autor, :categoria)";
    
    $QueryPublicacion = $conn->prepare($sqlQueryPublicacion);
    
    $QueryPublicacion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':dificultad', $dificultad, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':tiempo', $tiempo, PDO::PARAM_INT);
    $QueryPublicacion->bindParam(':id_usuario_autor', $id_usuario_autor, PDO::PARAM_INT);    
    $QueryPublicacion->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    

    if ($QueryPublicacion->execute()) {

        $id_publicacion = $conn->lastInsertId();

//Tabla imagenes
    if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_NO_FILE) {
        echo "Imagen de portada obligatoria";
        exit();
    }

            $nombreArchivo = $_FILES['portada']['name'];
            $rutaTemporal = $_FILES['portada']['tmp_name'];
            $carpetaDestino = '../../recetas/galeria/';
            $nombreArchivoUnico = uniqid() . '_' . basename($nombreArchivo);
            $rutaDestino = $carpetaDestino . $nombreArchivoUnico;


            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                
            $sqlQueryImagen = "INSERT INTO imagenes(id_publicacion,ruta_imagen) VALUES (:id_publicacion, :ruta_imagen)";

            $QueryImagen = $conn->prepare($sqlQueryImagen);
            $QueryImagen->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
            $QueryImagen->bindParam(':ruta_imagen', $nombreArchivoUnico, PDO::PARAM_STR);
            $QueryImagen->execute();
            }
        

//Tabla etiqueta
        $etiqueta = isset($_POST["etiqueta"]) ? $_POST["etiqueta"] : NULL;

        if(!empty($etiqueta))
        {
            $sqlQueryEtiqueta = "INSERT INTO etiquetas_recetas(id_publicacion,titulo) VALUES (:id_publicacion, :titulo_etiqueta)";

            $QueryEtiqueta = $conn->prepare($sqlQueryEtiqueta);
            $QueryEtiqueta->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
            $QueryEtiqueta->bindParam(':titulo_etiqueta', $etiqueta, PDO::PARAM_STR);
            $QueryEtiqueta->execute();
        }
        

//Tabla ingredientes
        $ingredientes = isset($_POST["ingrediente"]) ? $_POST["ingrediente"] : []; 

        foreach ($ingredientes as $ingrediente) {
            if (!empty($ingrediente)) {
                $sqlQueryIngrediente = "INSERT INTO ingredientes_recetas(id_publicacion, ingrediente) VALUES (:id_publicacion, :ingrediente)";
                
                $QueryIngrediente = $conn->prepare($sqlQueryIngrediente);
                $QueryIngrediente->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryIngrediente->bindParam(':ingrediente', $ingrediente, PDO::PARAM_STR);

                if (!$QueryIngrediente->execute()) {
                    echo "Error al guardar ingrediente";
                }
            }
        }

//Tabla paises
        $paises = isset($_POST["pais"]) ? $_POST["pais"] : []; 

        foreach ($paises as $pais) {
            if (!empty($pais)) {

                $sqlQueryPais = "INSERT INTO paises_recetas(id_publicacion, id_pais) VALUES (:id_publicacion, :pais)";

                $QueryPais = $conn->prepare($sqlQueryPais);
                $QueryPais->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryPais->bindParam(':pais', $pais, PDO::PARAM_INT);
                $QueryPais->execute();
            }
        }

//Tabla pasos        
        $pasos = isset($_POST["paso"]) ? $_POST["paso"] : []; 

        foreach ($pasos as $num_paso => $texto) {
            if (!empty($texto)) { 

                $sqlQueryPaso = "INSERT INTO pasos_recetas(id_publicacion, num_paso, texto) VALUES (:id_publicacion, :numero_paso, :texto_paso)";
                
                $QueryPaso = $conn->prepare($sqlQueryPaso);
                $QueryPaso->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryPaso->bindParam(':numero_paso', $num_paso, PDO::PARAM_INT);
                $QueryPaso->bindParam(':texto_paso', $texto, PDO::PARAM_STR);

                if (!$QueryPaso->execute()) {
                    echo "Error al guardar el paso";
                }
            }
        }
        
//Tabla imagenes_pasos
        
        
/*             $id_paso = $conn->lastInsertId();

            if (isset($_FILES['imagen_paso']) && $_FILES['imagen_paso']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivoP = $_FILES['imagen_paso']['name'];
                $rutaTemporalP = $_FILES['imagen_paso']['tmp_name'];
                $carpetaDestinoP = '../../recetas/galeria/';
                $nombreArchivoUnicoP = uniqid() . '_' . basename($nombreArchivoP);
                $rutaDestinoP = $carpetaDestinoP . $nombreArchivoUnicoP;

                if (move_uploaded_file($rutaTemporalP, $rutaDestinoP)) {
                    $sqlQueryImagenPaso = "INSERT INTO imagenes_pasos(id_paso, ruta_imagen_paso) VALUES (:id_paso, :ruta_imagen_paso)";
                    $QueryImagenPaso = $conn->prepare($sqlQueryImagenPaso);
                    $QueryImagenPaso->bindParam(':id_paso', $id_paso, PDO::PARAM_INT);
                    $QueryImagenPaso->bindParam(':ruta_imagen_paso', $nombreArchivoUnicoP, PDO::PARAM_STR);
                    $QueryImagenPaso->execute();
                }
            }
         */

        if ($formValid) {

            header('Location: ../recetas/receta-plantilla.php?id=' . $id_publicacion);
            echo "Receta subida";
            exit();

        } else {
            echo "Error al subir receta";
            exit();
        }

    }
}