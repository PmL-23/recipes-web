<?php
session_start();

require_once('../includes/conec_db.php');
require_once('../notificaciones/notificacion.php');
require_once('../includes/seguidores.php'); 


$errors = [];
$respuestaMensajes = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : NULL;
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : NULL;
    $dificultad = isset($_POST["dificultad"]) ? $_POST["dificultad"] : NULL;
    $tiempo = isset($_POST["minutos_prep"]) ? $_POST["minutos_prep"] : NULL;
    $unidad_tiempo = isset($_POST["tiempo_unidad"]) ? $_POST["tiempo_unidad"] : NULL;

    if (empty($titulo) || empty($descripcion) || empty($dificultad) || empty($tiempo) || empty($categoria) || empty($unidad_tiempo)) {

        $errors[] = 'Datos incompletos';
    }

//id publicacion
    if (isset($_GET['id'])) {
        $id_publicacion = $_GET['id'];
    } else {
        $errors[] = 'No se ha proporcionado un ID válido: publicación';
    }

    

//id usuario
    if (isset($_SESSION['id'])) {
        $id_usuario_autor = $_SESSION['id'];
    } else {
        $errors[] = 'No se ha proporcionado un ID válido: usuario';
    }


//titulo
    if ((empty($titulo)) || (trim($titulo) === '')) {
        $errors[] = 'Titulo no ingresado';
    } else {
        $palabras = explode(' ', $titulo);
        if (count($palabras) < 1 || count($palabras) > 50 ) {
            $errors[] = 'Error en cantidad de palabras permitidas: titulo';
        }
    }

//descripción    
    if ((empty($descripcion)) || (trim($descripcion) === '')) {
        $errors[] = 'Descripción no ingresada';
    } else {
        $palabras = explode(' ', $descripcion);
        if (count($palabras) < 2 || count($palabras) > 100 ) {
            $errors[] = 'Error en cantidad de palabras permitidas: descripción';
        }
    }

//tiempo
    if ((empty($tiempo)) || (trim($tiempo) === '')) {
        $errors[] = 'Tiempo de elaboración no ingresado';
    } else { 
        if (($tiempo < 1) || ($tiempo > 999999))
        {
            $errors[] = 'Error en cantidad permitida: Tiempo de elaboración';
        }
        if (!is_numeric($tiempo))
        {
            $errors[] = 'Tiempo de elaboración: campo númerico';
        }
    }  

//unidad tiempo
    $unidadesPermitidas = ["minutos", "hora"];
    if (empty($unidad_tiempo)) {
        $errors[] = 'Unidad de tiempo no ingresada';
    } else if (!in_array($unidad_tiempo, $unidadesPermitidas)) {
        $errors[] = 'Unidad de tiempo no valida';
    }
    
//dificultad    
    $dificultadesPermitidas = ["Fácil", "Media", "Dificil"];

    if (empty($dificultad)) {
        $errors[] = 'Dificultad no ingresada';
    } else if (!in_array($dificultad, $dificultadesPermitidas)) {
        $errors[] = 'Dificultad no valida';
    }
        
//categoria
    if (empty($categoria)) {
        $errors[] = 'Categoria no ingresada';
    }

    if (empty($errors)) {

        $sqlQueryPublicacion = "UPDATE publicaciones_recetas SET titulo = :titulo, descripcion = :descripcion, dificultad = :dificultad, minutos_prep = :tiempo, id_categoria = :categoria, unidad_tiempo = :unidad_tiempo WHERE id_publicacion = :id_publicacion";
        $QueryPublicacion = $conn->prepare($sqlQueryPublicacion);
        $QueryPublicacion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $QueryPublicacion->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $QueryPublicacion->bindParam(':dificultad', $dificultad, PDO::PARAM_STR);
        $QueryPublicacion->bindParam(':tiempo', $tiempo, PDO::PARAM_INT);
        $QueryPublicacion->bindParam(':unidad_tiempo', $unidad_tiempo, PDO::PARAM_STR);
        $QueryPublicacion->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $QueryPublicacion->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_STR);

        $publicado = $QueryPublicacion->execute();

        if ($publicado) {

            //tabla imagenes
            if (isset($_FILES['imagenes']) && count($_FILES['imagenes']['name']) > 0) {
                $imagenes = $_FILES['imagenes'];

                foreach ($imagenes['name'] as $index => $nombreArchivo) {
                    if ($imagenes['error'][$index] == 0) {
                        
                        
                        $tipoImagen = exif_imagetype($imagenes['tmp_name'][$index]);
                        if ($tipoImagen != IMAGETYPE_JPEG && $tipoImagen != IMAGETYPE_PNG) {
                            $respuestaMensajes[] = "El archivo $nombreArchivo no es una imagen válida.";
                            continue;
                        }

                        
                        $directorioDestino = "../recetas/galeria/";
                        $nuevoNombreArchivo = uniqid() . "_" . basename($nombreArchivo);
                        $rutaArchivoDestino = $directorioDestino . $nuevoNombreArchivo;

                        
                        if (move_uploaded_file($imagenes['tmp_name'][$index], $rutaArchivoDestino)) {

                            $sqlInsertarImagen = "INSERT INTO imagenes (ruta_imagen, id_publicacion) VALUES (:ruta_imagen, :id_publicacion)";
                            $stmtInsertarImagen = $conn->prepare($sqlInsertarImagen);
                            $stmtInsertarImagen->bindParam(':ruta_imagen', $rutaArchivoDestino, PDO::PARAM_STR);
                            $stmtInsertarImagen->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);

                            if ($stmtInsertarImagen->execute()) {
                                $respuestaMensajes[] = "Imagen $nuevoNombreArchivo subida con éxito.";
                            } else {
                                $respuestaMensajes[] = "Error al insertar la imagen $nuevoNombreArchivo en la base de datos.";
                            }

                        } else {
                            $respuestaMensajes[] = "Error al mover la imagen $nombreArchivo al servidor.";
                        }

                    } else {
                        $respuestaMensajes[] = "Error con el archivo $nombreArchivo.";
                    }
                }

                //tabla pasos
                            
                $pasos = isset($_POST["paso"]) ? $_POST["paso"] : [];

                
                $sqlObtenerPasos = "SELECT id_paso, num_paso, texto FROM pasos_recetas WHERE id_publicacion = :id_publicacion";
                $stmtObtenerPasos = $conn->prepare($sqlObtenerPasos);
                $stmtObtenerPasos->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $stmtObtenerPasos->execute();
                $pasosActuales = $stmtObtenerPasos->fetchAll(PDO::FETCH_ASSOC);

                
                $numerosPasosNuevos = [];
                foreach ($pasos as $index => $texto) {
                    $numPaso = $index + 1;
                    $numerosPasosNuevos[] = $numPaso;
                }

                foreach ($pasos as $index => $texto) {
                    $numPaso = $index + 1;

                    if ((empty($texto)) || (trim($texto) === '')) {
                        $errorsPaso[] = 'Paso no ingresado';
                    } else {
                        $palabras = explode(' ', $texto);
                        if (count($palabras) < 4 || count($palabras) > 30 ) {
                            $errorsPaso[] = 'Error en cantidad de palabras permitidas: paso';
                        }
                    }
        
                    if (empty($errorsPaso)) { 
                
                        $sqlVerificarPaso = "SELECT id_paso, texto FROM pasos_recetas WHERE num_paso = :num_paso AND id_publicacion = :id_publicacion";
                        $stmtVerificarPaso = $conn->prepare($sqlVerificarPaso);
                        $stmtVerificarPaso->bindParam(':num_paso', $numPaso, PDO::PARAM_INT);
                        $stmtVerificarPaso->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                        $stmtVerificarPaso->execute();
                        $paso = $stmtVerificarPaso->fetch(PDO::FETCH_ASSOC);

                        if ($paso) {
                            
                            if ($paso['texto'] != $texto) {
                                $sqlActualizarPaso = "UPDATE pasos_recetas SET texto = :texto WHERE id_paso = :id_paso";
                                $stmtActualizarPaso = $conn->prepare($sqlActualizarPaso);
                                $stmtActualizarPaso->bindParam(':texto', $texto, PDO::PARAM_STR);
                                $stmtActualizarPaso->bindParam(':id_paso', $paso['id_paso'], PDO::PARAM_INT);
                                $stmtActualizarPaso->execute();
                            }
                            $pasoId = $paso['id_paso'];
                        } else {
                            
                            $sqlInsertarPaso = "INSERT INTO pasos_recetas (id_publicacion, num_paso, texto) VALUES (:id_publicacion, :num_paso, :texto)";
                            $stmtInsertarPaso = $conn->prepare($sqlInsertarPaso);
                            $stmtInsertarPaso->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                            $stmtInsertarPaso->bindParam(':num_paso', $numPaso, PDO::PARAM_INT);
                            $stmtInsertarPaso->bindParam(':texto', $texto, PDO::PARAM_STR);
                            $stmtInsertarPaso->execute();
                            $pasoId = $conn->lastInsertId();
                        }

                        
                        if (isset($_FILES["imagenes_paso".$numPaso])) {
                            $imagenesSubidas = [];
                            foreach ($_FILES["imagenes_paso".$numPaso]['name'] as $index => $filename) {
                                $rutaDestino = "../recetas/galeria/";
                                $nombreArchivoUnico = $rutaDestino . uniqid() . "_" . basename($filename);
                        
                                if (move_uploaded_file($_FILES["imagenes_paso".$numPaso]['tmp_name'][$index], $nombreArchivoUnico)) {
                                    $imagenesSubidas[] = $nombreArchivoUnico;
                                }
                            }
                            
                            if (!empty($imagenesSubidas)) {
                                
                                $sqlEliminarImagenes = "DELETE FROM imagenes_pasos WHERE id_paso = :id_paso";
                                $stmtEliminarImagenes = $conn->prepare($sqlEliminarImagenes);
                                $stmtEliminarImagenes->bindParam(':id_paso', $pasoId, PDO::PARAM_INT);
                                $stmtEliminarImagenes->execute();
                        
                                
                                foreach ($imagenesSubidas as $imagenRuta) {
                                    $sqlInsertarImagen = "INSERT INTO imagenes_pasos (id_paso, ruta_imagen_paso) VALUES (:id_paso, :ruta_imagen_paso)";
                                    $stmtInsertarImagen = $conn->prepare($sqlInsertarImagen);
                                    $stmtInsertarImagen->bindParam(':id_paso', $pasoId, PDO::PARAM_INT);
                                    $stmtInsertarImagen->bindParam(':ruta_imagen_paso', $imagenRuta, PDO::PARAM_STR);
                                    $stmtInsertarImagen->execute();
                                }
                            }
                        }
                    }  else {
                        echo json_encode(['success' => false, 'errors' => $errorsPaso]);
                    }
                    
                }

                
                
                $sqlObtenerPaises = "SELECT id_pais FROM paises_recetas WHERE id_publicacion = :id_publicacion";
                $stmtObtenerPaises = $conn->prepare($sqlObtenerPaises);
                $stmtObtenerPaises->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $stmtObtenerPaises->execute();
                $paisesActuales = $stmtObtenerPaises->fetchAll(PDO::FETCH_COLUMN);

                
                $paisesNuevos = isset($_POST["pais"]) ? $_POST["pais"] : [];
                $paisesMantener = [];
                
                foreach ($paisesNuevos as $paisNuevo) {
                    if (!empty($paisNuevo) && in_array($paisNuevo, $paisesActuales)) {
                        $paisesMantener[] = $paisNuevo;
                    }
                }
                //encuentro las diferencias
                $paisesAEliminar = array_diff($paisesActuales, $paisesMantener);
                $paisesAAgregar = array_diff($paisesNuevos, $paisesActuales);

                foreach ($paisesAEliminar as $paisAEliminar) {
                    $sqlEliminarPais = "DELETE FROM paises_recetas WHERE id_publicacion = :id_publicacion AND id_pais = :id_pais";
                    $stmtEliminarPais = $conn->prepare($sqlEliminarPais);
                    $stmtEliminarPais->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                    $stmtEliminarPais->bindParam(':id_pais', $paisAEliminar, PDO::PARAM_INT);
                    $stmtEliminarPais->execute();
                }

                foreach ($paisesAAgregar as $paisAAgregar) {
                    if (!empty($paisAAgregar)) {
                        $sqlAgregarPais = "INSERT INTO paises_recetas(id_publicacion, id_pais) VALUES (:id_publicacion, :id_pais)";
                        $stmtAgregarPais = $conn->prepare($sqlAgregarPais);
                        $stmtAgregarPais->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                        $stmtAgregarPais->bindParam(':id_pais', $paisAAgregar, PDO::PARAM_INT);
                        $stmtAgregarPais->execute();
                    }
                }
            }
            
            // tabla de ingredientes
            $ingredientesNuevos = isset($_POST["ingrediente"]) ? $_POST["ingrediente"] : [];
            $cantidadesNuevas = isset($_POST["cantidad"]) ? $_POST["cantidad"] : [];
            
            

                $sqlObtenerIngredientes = "SELECT id_ingrediente, cantidad FROM ingredientes_recetas WHERE id_publicacion = :id_publicacion";
                $stmtObtenerIngredientes = $conn->prepare($sqlObtenerIngredientes);
                $stmtObtenerIngredientes->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $stmtObtenerIngredientes->execute();
                $ingredientesActuales = $stmtObtenerIngredientes->fetchAll(PDO::FETCH_ASSOC);


                $ingredientesMantener = [];

            
                foreach ($ingredientesNuevos as $index => $ingrediente) {
                    $cantidad = $cantidadesNuevas[$index];

                    if ((empty($ingrediente)) || (trim($ingrediente) === '')) {
                        $errorsIng[] = 'Ingrediente no ingresado';
                    } else {
                        $palabras = explode(' ', $ingrediente);
                        if (count($palabras) < 1 || count($palabras) > 15 ) {
                            $errorsIng[] = 'Error en cantidad de palabras permitidas: ingrediente';
                        }
                    }
        
                    if ((empty($cantidad)) || (trim($cantidad) === '')) {
                        $errorsIng[] = 'Cantidad no ingresada';
                    } else {
                        $palabras = explode(' ', $cantidad);
                        if (count($palabras) < 1 || count($palabras) > 24 ) {
                            $errorsIng[] = 'Error en cantidad de palabras permitidas: cantidad ingrediente';
                        }
                    }
        
                    if (empty($errorsIng)) {
                        
                        foreach ($ingredientesActuales as $ingredienteActual) {
                            if ($ingrediente == $ingredienteActual['id_ingrediente'] && $cantidad == $ingredienteActual['cantidad']) {
                                $ingredientesMantener[] = $ingredienteActual['id_ingrediente'];
                            }
                        }
                    }  else {
                        echo json_encode(['success' => false, 'errors' => $errorsIng]);
                    }
                    
                }

                $ingredientesAEliminar = array_diff(array_column($ingredientesActuales, 'id_ingrediente'), $ingredientesMantener);

                $ingredientesAAgregar = array_diff($ingredientesNuevos, array_column($ingredientesActuales, 'id_ingrediente'));

                
                foreach ($ingredientesAEliminar as $ingredienteAEliminar) {
                    $sqlEliminarIngrediente = "DELETE FROM ingredientes_recetas WHERE id_publicacion = :id_publicacion AND id_ingrediente = :id_ingrediente";
                    $stmtEliminarIngrediente = $conn->prepare($sqlEliminarIngrediente);
                    $stmtEliminarIngrediente->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                    $stmtEliminarIngrediente->bindParam(':id_ingrediente', $ingredienteAEliminar, PDO::PARAM_INT);
                    $stmtEliminarIngrediente->execute();
                }

                
                foreach ($ingredientesAAgregar as $index => $ingredienteAAgregar) {
                    $cantidad = $cantidadesNuevas[$index];
                    if (!empty($ingredienteAAgregar) && !empty($cantidad)) {
                        
                        $sqlVerIngrediente = "SELECT id_ingrediente FROM ingredientes WHERE nombre = :ingrediente_ingresado";
                        $stmtVerIngrediente = $conn->prepare($sqlVerIngrediente);
                        $stmtVerIngrediente->bindParam(':ingrediente_ingresado', $ingredienteAAgregar, PDO::PARAM_STR);
                        $stmtVerIngrediente->execute();
                        $rowVerIng = $stmtVerIngrediente->fetch(PDO::FETCH_ASSOC); // obtener el id

                        if (!$rowVerIng) {
                        
                            $sqlInsertarIngrediente = "INSERT INTO ingredientes(nombre) VALUES (:ingrediente_ingresado)";
                            $stmtInsertarIngrediente = $conn->prepare($sqlInsertarIngrediente);
                            $stmtInsertarIngrediente->bindParam(':ingrediente_ingresado', $ingredienteAAgregar, PDO::PARAM_STR);
                            $stmtInsertarIngrediente->execute();
                            $id_ingrediente = $conn->lastInsertId(); // id del nuevo ingrediente
                        } else {

                            $id_ingrediente = $rowVerIng['id_ingrediente'];
                        }

                        
                        $sqlQueryIngrediente = "INSERT INTO ingredientes_recetas(id_publicacion, id_ingrediente, cantidad) VALUES (:id_publicacion, :id_ingrediente, :cantidad)";
                        $QueryIngrediente = $conn->prepare($sqlQueryIngrediente);
                        $QueryIngrediente->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                        $QueryIngrediente->bindParam(':id_ingrediente', $id_ingrediente, PDO::PARAM_INT);
                        $QueryIngrediente->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
                        $QueryIngrediente->execute();
                    }
                }


                // tabla etiquetas
                $sqlObtenerEtiquetas = "SELECT id_etiqueta FROM etiquetas_recetas WHERE id_publicacion = :id_publicacion";
                $stmtObtenerEtiquetas = $conn->prepare($sqlObtenerEtiquetas);
                $stmtObtenerEtiquetas->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $stmtObtenerEtiquetas->execute();
                $etiquetasActuales = $stmtObtenerEtiquetas->fetchAll(PDO::FETCH_COLUMN);

                $etiquetasNuevas = isset($_POST["etiqueta"]) ? $_POST["etiqueta"] : [];

                $etiquetasMantener = [];

                foreach ($etiquetasNuevas as $etiquetaNueva) {
                    if (!empty($etiquetaNueva) && in_array($etiquetaNueva, $etiquetasActuales)) {
                        $etiquetasMantener[] = $etiquetaNueva;
                    }
                }


                $etiquetasAEliminar = array_diff($etiquetasActuales, $etiquetasMantener);
                $etiquetasAAgregar = array_diff($etiquetasNuevas, $etiquetasActuales);

            
                foreach ($etiquetasAEliminar as $etiquetaAEliminar) {
                    $sqlEliminarEtiqueta = "DELETE FROM etiquetas_recetas WHERE id_publicacion = :id_publicacion AND id_etiqueta = :id_etiqueta";
                    $stmtEliminarEtiqueta = $conn->prepare($sqlEliminarEtiqueta);
                    $stmtEliminarEtiqueta->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                    $stmtEliminarEtiqueta->bindParam(':id_etiqueta', $etiquetaAEliminar, PDO::PARAM_INT);
                    $stmtEliminarEtiqueta->execute();
                }

            
                foreach ($etiquetasAAgregar as $etiquetaAAgregar) {
                    if (!empty($etiquetaAAgregar)) {
                        $sqlAgregarEtiqueta = "INSERT INTO etiquetas_recetas(id_publicacion, id_etiqueta) VALUES (:id_publicacion, :id_etiqueta)";
                        $stmtAgregarEtiqueta = $conn->prepare($sqlAgregarEtiqueta);
                        $stmtAgregarEtiqueta->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                        $stmtAgregarEtiqueta->bindParam(':id_etiqueta', $etiquetaAAgregar, PDO::PARAM_INT);
                        $stmtAgregarEtiqueta->execute();
                    }
                }




            echo json_encode([
                'success' => true,
                'receta_id' => $id_publicacion,
                'mensajes' => $respuestaMensajes
            ]);
        } else {
            echo json_encode(['success' => false, 'errors' => ['Error al guardar la publicación']]);
        }

    } else {
        echo json_encode(['success' => false, 'errors' => $errors]);
    }
}