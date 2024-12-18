<?php
session_start();

require_once('../includes/conec_db.php');
require_once('../notificaciones/notificacion.php');
require_once('../includes/seguidores.php'); 


$id_usuario_autor = $_SESSION['id'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : NULL;
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : NULL;
    $dificultad = isset($_POST["dificultad"]) ? $_POST["dificultad"] : NULL;
    $tiempo = isset($_POST["minutos_prep"]) ? $_POST["minutos_prep"] : NULL;
    $unidad_tiempo = isset($_POST["tiempo_unidad"]) ? $_POST["tiempo_unidad"] : NULL;

    if (empty($titulo) || empty($descripcion) || empty($dificultad) || empty($tiempo) || empty($categoria) || empty($unidad_tiempo)) {

        echo json_encode(['success' => false, 'msj_error' => 'Datos incompletos.']);
        exit();
    }

//id usuario
    if (empty($id_usuario_autor) || !isset($id_usuario_autor)) 
    {
        $errors[] = 'Usuario invalido';
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

    $sqlQueryPublicacion = "INSERT INTO publicaciones_recetas(titulo, descripcion, dificultad, minutos_prep, id_usuario_autor, id_categoria, unidad_tiempo) VALUES (:titulo, :descripcion, :dificultad, :tiempo, :id_usuario_autor, :categoria, :unidad_tiempo)";

    $QueryPublicacion = $conn->prepare($sqlQueryPublicacion);
    
    $QueryPublicacion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':dificultad', $dificultad, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':tiempo', $tiempo, PDO::PARAM_INT);
    $QueryPublicacion->bindParam(':unidad_tiempo', $unidad_tiempo, PDO::PARAM_STR);
    $QueryPublicacion->bindParam(':id_usuario_autor', $id_usuario_autor, PDO::PARAM_INT);    
    $QueryPublicacion->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    

    if ($QueryPublicacion->execute()) {

        $id_publicacion = $conn->lastInsertId();

        $seguidores = obtenerSeguidores($conn, $id_usuario_autor);

        foreach ($seguidores as $seguidor) {
            agregarNotificacion($conn, $seguidor['id_seguidor'], $id_publicacion, $id_usuario_autor, 'nueva_publicacion');
        }

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
                        $QueryImagen->bindParam(':ruta_imagen', $directorioDestino, PDO::PARAM_STR);
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

                $sqlQueryEtiqueta = "INSERT INTO etiquetas_recetas(id_publicacion, id_etiqueta) VALUES (:id_publicacion, :id_etiqueta)";
    
                $QueryEtiqueta = $conn->prepare($sqlQueryEtiqueta);
                $QueryEtiqueta->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryEtiqueta->bindParam(':id_etiqueta', $etiqueta, PDO::PARAM_STR);
                $QueryEtiqueta->execute();
            }
        }

        // Tabla ingredientes
        $ingredientes = isset($_POST["ingrediente"]) ? $_POST["ingrediente"] : [];
        $cantidades = isset($_POST["cantidad"]) ? $_POST["cantidad"] : [];  

        
        foreach ($ingredientes as $index => $ingrediente) {

            if ((empty($ingrediente)) || (trim($ingrediente) === '')) {
                $errorsIng[] = 'Ingrediente no ingresado';
            } else {
                $palabras = explode(' ', $ingrediente);
                if (count($palabras) < 1 || count($palabras) > 15 ) {
                    $errorsIng[] = 'Error en cantidad de palabras permitidas: ingrediente';
                }
            }

            if ((empty($cantidades[$index])) || (trim($cantidades[$index]) === '')) {
                $errorsIng[] = 'Cantidad no ingresado';
            } else {
                $palabras = explode(' ', $cantidades[$index]);
                if (count($palabras) < 1 || count($palabras) > 24 ) {
                    $errorsIng[] = 'Error en cantidad de palabras permitidas: cantidad ingrediente';
                }
            }

            if (empty($errorsIng)) {

                // veo si el ingrediente existe
                $sqlVerIngrediente = "SELECT id_ingrediente FROM ingredientes WHERE nombre = :ingrediente_ingresado";
                $stmtVerIngrediente = $conn->prepare($sqlVerIngrediente);
                $stmtVerIngrediente->bindParam(':ingrediente_ingresado', $ingrediente, PDO::PARAM_STR);
                $stmtVerIngrediente->execute();
                $rowVerIng = $stmtVerIngrediente->fetch(PDO::FETCH_ASSOC); //obtengo el id

                if (!$rowVerIng) {
                    // si no existe se ingresa el nuevo
                    $sqlInsertarIngrediente = "INSERT INTO ingredientes(nombre) VALUES (:ingrediente_ingresado)";
                    $stmtInsertarIngrediente = $conn->prepare($sqlInsertarIngrediente);
                    $stmtInsertarIngrediente->bindParam(':ingrediente_ingresado', $ingrediente, PDO::PARAM_STR);
                    $stmtInsertarIngrediente->execute();
                    $id_ingrediente = $conn->lastInsertId(); //id del nuevo ingrediente
                } else {
                    // si ya existe se usa el id existente
                    $id_ingrediente = $rowVerIng['id_ingrediente'];
                }

                // datos en la tabla intermedia:
                $sqlQueryIngrediente = "INSERT INTO ingredientes_recetas(id_publicacion, id_ingrediente, cantidad) VALUES (:id_publicacion, :id_ingrediente, :cantidad)";
                
                $QueryIngrediente = $conn->prepare($sqlQueryIngrediente);
                $QueryIngrediente->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryIngrediente->bindParam(':id_ingrediente', $id_ingrediente, PDO::PARAM_INT);
                $QueryIngrediente->bindParam(':cantidad', $cantidades[$index], PDO::PARAM_STR);
                $QueryIngrediente->execute();

            }  else {
                echo json_encode(['success' => false, 'errors' => $errorsIng]);
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
            else
            {
                $errorsPais[] = 'País no ingresado';
            }

        }

        //Tabla Pasos
        $pasos = isset($_POST["paso"]) ? $_POST["paso"] : []; 

        foreach ($pasos as $num_paso => $texto) {

            $numero_paso = $num_paso + 1; 

            if ((empty($texto)) || (trim($texto) === '')) {
                $errorsPaso[] = 'Paso no ingresado';
            } else {
                $palabras = explode(' ', $texto);
                if (count($palabras) < 4 || count($palabras) > 30 ) {
                    $errorsPaso[] = 'Error en cantidad de palabras permitidas: paso';
                }
            }

            if (empty($errorsPaso)) { 
                $sqlQueryPaso = "INSERT INTO pasos_recetas(id_publicacion, num_paso, texto) VALUES (:id_publicacion, :numero_paso, :texto_paso)";
                
                $QueryPaso = $conn->prepare($sqlQueryPaso);
                $QueryPaso->bindParam(':id_publicacion', $id_publicacion, PDO::PARAM_INT);
                $QueryPaso->bindParam(':numero_paso', $numero_paso, PDO::PARAM_INT);
                $QueryPaso->bindParam(':texto_paso', $texto, PDO::PARAM_STR);

                if ($QueryPaso->execute()) {

                    $id_paso = $conn->lastInsertId();


                    if (isset($_FILES['imagenes_paso'.$numero_paso.'']) && !empty($_FILES['imagenes_paso'.$numero_paso.'']['name'][0])){

                        $contadorImagenes = count($_FILES['imagenes_paso'.$numero_paso.'']['name']);
                        $carpetaDestino = '../recetas/galeria/';
                
                    
                        for ($i = 0; $i < $contadorImagenes; $i++) {

                            
                            $fileName = $_FILES['imagenes_paso'.$numero_paso.'']['name'][$i];
                            $fileTmpName = $_FILES['imagenes_paso'.$numero_paso.'']['tmp_name'][$i];
                            $fileError = $_FILES['imagenes_paso'.$numero_paso.'']['error'][$i];
                
                        
                            if ($fileError === UPLOAD_ERR_OK) {
                                
                                $imagenIDUnico = uniqid() . '_' . basename($fileName);
                                $fileDestination = $carpetaDestino . $imagenIDUnico;
                
                            
                                if (move_uploaded_file($fileTmpName, $fileDestination)) {

                                    $sqlQueryImagenPaso = "INSERT INTO imagenes_pasos(id_paso, ruta_imagen_paso) VALUES (:id_paso, :ruta_imagen_paso)";

                                    $QueryImagenPaso = $conn->prepare($sqlQueryImagenPaso);
                                    $QueryImagenPaso->bindParam(':id_paso', $id_paso, PDO::PARAM_INT);
                                    $QueryImagenPaso->bindParam(':ruta_imagen_paso', $fileDestination, PDO::PARAM_STR);
                                    $QueryImagenPaso->execute();

                                } else {
                                    echo json_encode(['success' => false, 'msj_error' => 'Error al guardar el archivo '.$fileName]);
                                }
                
                            } else {
                                echo json_encode(['success' => false, 'msj_error' => 'Error en el archivo '.$fileName.'; Código de error '.$fileError]);
                            }
                        }
                
                    } 
                
                } else {
                    echo json_encode(['success' => false, 'msj_error' => 'Error al guardar paso..']);
                }
            }  else {
                echo json_encode(['success' => false, 'errors' => $errorsPaso]);
            }
        }


        echo json_encode([
            'success' => true,
            'nueva_receta_id' => $id_publicacion
        ]);

    }
    } else {
    echo json_encode(['success' => false, 'errors' => $errors]);
    }
}