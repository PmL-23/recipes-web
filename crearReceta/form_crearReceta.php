<?php
session_start();

require_once('../includes/conec_db.php');

$id_usuario_autor = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : NULL;
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : NULL;
    $dificultad = isset($_POST["dificultad"]) ? $_POST["dificultad"] : NULL;
    $tiempo = isset($_POST["minutos_prep"]) ? $_POST["minutos_prep"] : NULL;

    if (empty($titulo) || empty($descripcion) || empty($dificultad) || empty($tiempo) || empty($id_usuario_autor) || empty($categoria)) {

        echo json_encode(['success' => false, 'msj_error' => 'Datos incompletos.']);
        exit();
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

        if (isset($_FILES['imagenes'])){

            $cantImagenes = count($_FILES['imagenes']['name']);
            $carpetaDestino = '../recetas/galeria/';
    
            // Procesar cada archivo individualmente
            for ($i = 0; $i < $cantImagenes; $i++) {
                
                // Obtener información del archivo
                $nombreArchivo = $_FILES['imagenes']['name'][$i];
                $nombreTemporalImagen = $_FILES['imagenes']['tmp_name'][$i];
                $errorSubidaImagen = $_FILES['imagenes']['error'][$i];
    
                // Verificar si no hubo errores al subir el archivo
                if ($errorSubidaImagen === UPLOAD_ERR_OK) {

                    // Crear la ruta completa
                    $nombreArchivoUnico = uniqid() . '_' . basename($nombreArchivo);
                    $directorioDestino = $carpetaDestino . $nombreArchivoUnico;
    
                    // Mover el archivo desde la carpeta temporal al destino final
                    if (move_uploaded_file($nombreTemporalImagen, $directorioDestino)) {

                        $sqlQueryImagen = "INSERT INTO imagenes(id_publicacion, ruta_imagen) VALUES (:id_publicacion, :ruta_imagen)";

                        $QueryImagen = $conn->prepare($sqlQueryImagen);
                        $QueryImagen->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                        $QueryImagen->bindParam(':ruta_imagen', $nombreArchivoUnico, PDO::PARAM_STR);
                        $QueryImagen->execute();

                    } else {
                        echo json_encode(['success' => false, 'msj_error' => 'Error al subir el archivo'.$nombreArchivo]);
                    }
    
                } else {
                    echo json_encode(['success' => false, 'msj_error' => 'Error en el archivo '.$nombreArchivo.'; Código de error '.$errorSubidaImagen]);
                }
            }


        } else {
            echo json_encode(['success' => false, 'msj_error' => 'Imagenes de portada no seleccionadas..']);
        }

        //Tabla etiqueta
        $etiquetas = isset($_POST["etiqueta"]) ? $_POST["etiqueta"] : [];

        foreach ($etiquetas as $etiqueta) {
            if(!empty($etiqueta)){

                $sqlQueryEtiqueta = "INSERT INTO etiquetas_recetas(id_publicacion,titulo) VALUES (:id_publicacion, :titulo_etiqueta)";
    
                $QueryEtiqueta = $conn->prepare($sqlQueryEtiqueta);
                $QueryEtiqueta->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryEtiqueta->bindParam(':titulo_etiqueta', $etiqueta, PDO::PARAM_STR);
                $QueryEtiqueta->execute();
            }
        }

        //Tabla ingredientes
        $ingredientes = isset($_POST["ingrediente"]) ? $_POST["ingrediente"] : []; 
        
        foreach ($ingredientes as $ingrediente) {
            if (!empty($ingrediente)) {

                $sqlQueryIngrediente = "INSERT INTO ingredientes_recetas(id_publicacion, ingrediente) VALUES (:id_publicacion, :ingrediente)";
                
                $QueryIngrediente = $conn->prepare($sqlQueryIngrediente);
                $QueryIngrediente->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryIngrediente->bindParam(':ingrediente', $ingrediente, PDO::PARAM_STR);
                $QueryIngrediente->execute();
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
                $sqlQueryPaso = "INSERT INTO pasos_recetas(id_publicacion, num_paso, texto) VALUES (:id_publicacion, :numero_paso + 1, :texto_paso)";
                
                $QueryPaso = $conn->prepare($sqlQueryPaso);
                $QueryPaso->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryPaso->bindParam(':numero_paso', $num_paso, PDO::PARAM_INT);
                $QueryPaso->bindParam(':texto_paso', $texto, PDO::PARAM_STR);

                if ($QueryPaso->execute()) {

                    $id_paso = $conn->lastInsertId();

                    if (isset($_FILES['imagenes_paso'.($num_paso + 1).''])){

                        $contadorImagenes = count($_FILES['imagenes_paso'.($num_paso + 1).'']['name']);
                        $carpetaDestino = '../recetas/galeria/';
                
                        // Procesar cada archivo individualmente
                        for ($i = 0; $i < $contadorImagenes; $i++) {

                            // Obtener información del archivo
                            $fileName = $_FILES['imagenes_paso'.($num_paso + 1).'']['name'][$i];
                            $fileTmpName = $_FILES['imagenes_paso'.($num_paso + 1).'']['tmp_name'][$i];
                            $fileError = $_FILES['imagenes_paso'.($num_paso + 1).'']['error'][$i];
                
                            // Verificar si no hubo errores al subir el archivo
                            if ($fileError === UPLOAD_ERR_OK) {
                                // Crear la ruta completa
                                $imagenIDUnico = uniqid() . '_' . basename($fileName);
                                $fileDestination = $carpetaDestino . $imagenIDUnico;
                
                                // Mover el archivo desde la carpeta temporal al destino final
                                if (move_uploaded_file($fileTmpName, $fileDestination)) {
            
                                    $sqlQueryImagenPaso = "INSERT INTO imagenes_pasos(id_paso, ruta_imagen_paso) VALUES (:id_paso, :ruta_imagen_paso)";
            
                                    $QueryImagenPaso = $conn->prepare($sqlQueryImagenPaso);
                                    $QueryImagenPaso->bindParam(':id_paso', $id_paso, PDO::PARAM_INT);
                                    $QueryImagenPaso->bindParam(':ruta_imagen_paso', $imagenIDUnico, PDO::PARAM_STR);
                                    $QueryImagenPaso->execute();
            
                                } else {
                                    echo json_encode(['success' => false, 'msj_error' => 'Error al guardar el archivo '.$fileName]);
                                }
                
                            } else {
                                echo json_encode(['success' => false, 'msj_error' => 'Error en el archivo '.$nombreArchivo.'; Código de error '.$fileError]);
                            }
                        }
            
            
                    } else {
                        echo json_encode(['success' => false, 'msj_error' => 'Imagenes para paso no seleccionadas..']);
                    }

                }else{
                    echo json_encode(['success' => false, 'msj_error' => 'Error al guardar paso..']);
                }
            }

        }

        echo json_encode([
            'success' => true,
            'nueva_receta_id' => $id_publicacion
        ]);

    }
}