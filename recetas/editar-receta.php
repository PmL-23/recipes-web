<?php

session_start();

require_once('../includes/conec_db.php');

$categoriaQuery = "SELECT * FROM categorias ORDER BY categorias.id_categoria DESC";
$queryResultsCategoria = $conn->prepare($categoriaQuery);
$queryResultsCategoria->execute(); 

if (!$queryResultsCategoria) {
    echo "Error en la consulta SQL";
    exit();
}

$paisQuery = "SELECT * FROM paises ORDER BY paises.id_pais ASC";
$queryResultsPais = $conn->prepare($paisQuery);
$queryResultsPais->execute(); 

$paisesDisponibles = [];
while ($paisRow = $queryResultsPais->fetch(PDO::FETCH_ASSOC)) {
    $paisesDisponibles[] = $paisRow;  
}

if (!$queryResultsPais) {
    echo "Error en la consulta SQL";
    exit();
}

$etiquetasQuery = "SELECT * FROM etiquetas ORDER BY etiquetas.id_etiqueta DESC";
$queryResultsEtiquetas = $conn->prepare($etiquetasQuery);
$queryResultsEtiquetas->execute(); 

$etiquetasDisponibles = [];
while ($etiquetaRow = $queryResultsEtiquetas->fetch(PDO::FETCH_ASSOC)) {
    $etiquetasDisponibles[] = $etiquetaRow;  
}


if (!$queryResultsEtiquetas) {
    echo "Error en la consulta SQL";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>
        
        <?php include '../includes/head.php'?>
        <link rel="stylesheet" href="../crearReceta/crear_receta_style.css">
        
    </head>
    
<body>
<?php include '../includes/header.php'?>
<?php include '../recetas/manejoGetReceta.php'?>

<form class="" method="POST" id="frm-receta-editar" name="frm-receta-editar">    
    <div class="contenido-principal container w-100 w-lg-75 p-5 seccion">
            <div class="contenedor-img-preview text-center d-flex p-2 justify-content-center overflow-hidden">
                <div class="col-md-6 col-sm-12 d-flex flex-column  mb-md-5">
                    <?php

                        if (!empty($imagenes)) {
                            // portada
                            echo '<div class="ms-md-4 ms-3 contenedor-img-portada">';
                            echo '<img src="' . $imagenes[0]. '" alt="Receta" class="img-portada portada-receta rounded img-fluid" id="portada-receta">';
                            echo '</div>';

                            if (count($imagenes) > 1) {
                                // demás imagenes
                                echo '<div class="w-50 d-flex ms-md-4 ms-3 scroll">';
                                echo '<div class="contenedor-imagenes d-flex">';
                                for ($i = 1; $i < count($imagenes); $i++) {
                                    echo '<img src="' . $imagenes[$i]. '" alt="Receta" class="rounded img-fluid me-1 my-2 imagen">';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo 'No hay portada';
                        }
                        ?>

                </div>
            </div>
            <div class="mt-3">
                <label for="foto-portada" class="h5 form-label mt-3">Imagenes de tu receta</label>
                <input type="file" name="imagenes[]" id="foto-portada" multiple>
                <small class="text-danger" id="errorPortada"></small>
            </div>
    
            <div class="mt-3">
                <label class="h5 form-label mt-3" for="titulo">TÍtulo</label>
                <input class="form-control form-control-md" type="text" placeholder="Añade el titulo de tu receta" aria-label=".form-control" id="titulo" name="titulo" maxlength="100" value="  <?php echo $titulo; ?>" required>
                <small class="text-danger" id="error-titulo"></small>
            </div>
        
            <div class="mt-3">
            <label for="descripcion" class="h5 form-label mt-3">Descripción</label>
            <textarea class="form-control textarea-resize" id="descripcion" name="descripcion" placeholder="Añade una descripción a tu receta" required> <?php echo $descripcion; ?> </textarea>
            <small class="text-danger" id="error-descripcion"></small>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="c-paises" id="input-paises">
                        <h4 for="select-pais" class="h6 form-label mt-3">País</h4>
                        <div class="pais-container my-2 d-flex flex-row">
                        <?php foreach ($paisRecetaData as $paisReceta) { ?>
                            <select class="w-50 select-pais form-select" aria-label="Select pais" name="pais[]" required>
                                <option value="">Receta sin país</option>
                                <?php foreach ($paisesDisponibles as $paisRow) {
                                    $rutaBandera = "../svg/" . $paisRow['ruta_imagen_pais'];
                                    $selected = '';
                                    if ($paisRow['id_pais'] == $paisReceta['id_pais']) {
                                        $selected = 'selected';  
                                    }
                                    echo '<option value="' . $paisRow['id_pais'] . '" data-pais="' . $rutaBandera . '" ' . $selected . '>' . $paisRow['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        <?php } ?>

                            <small class="text-danger" id="error-pais"></small>
                            <img class="ms-2 bandera mini-bandera d-none" src="" alt="Bandera">
    
                        </div>
    
                    </div>
                    
                    <div class="d-flex justify-content-start mt-3">
                        <button class="boton-item" type="button" id="agregar-pais">+ Agregar país</button>
                    </div>

                </div>

                <div class="col-md-6">
                    <label for="categoria" class="h6 form-label mt-3">Categoría</label>
                    <select class="form-select" aria-label="Select categoria" id="categoria" name="categoria">
                        <option value="" selected disabled>Selecciona una categoría</option>
                        <?php 
                        while ($categoriaRow = $queryResultsCategoria->fetch(PDO::FETCH_ASSOC)) {
                            if ($categoriaRow['id_categoria'] === $categoria){
                            echo '<option value="'.$categoriaRow['id_categoria'].'" selected>'.$categoriaRow['titulo'].'</option>';
                            }
                            else
                            {
                                echo '<option value="'.$categoriaRow['id_categoria'].'">'.$categoriaRow['titulo'].'</option>';
                            }
                        }
                        ?>  
                    </select>
                    <small class="text-danger" id="error-categoria"></small>

                    <div class="tag-div my-3">
                        <p class="tag-categorias d-none" id="tag-categoria"></p>
                    </div>
                </div>
            </div> 

            
            <div class="row mt-3"> 
                <div class="col-lg-6"> 
                    <div class="row container text-center mt-4 mb-3">
                        <div class="col ms-4">
                        <img src="../svg/bar-chart-line-fill.svg" width="25px" class="icono-item" alt="Dificultad icon"> 
                        </div>
                    </div>
                    <label for="dificultad" class="h6 form-label">Dificultad de elaboración</label>
                    <select class="form-select" aria-label="Select dificultad" id="dificultad" name="dificultad" required>
                        <option selected disabled>Elegí la dificultad de tu platillo</option>
                        <option value="Fácil" <?php echo ($dificultad == "Fácil") ? 'selected' : ''; ?>>Fácil</option>
                        <option value="Media" <?php echo ($dificultad == "Media") ? 'selected' : ''; ?>>Media</option>
                        <option value="Dificil" <?php echo ($dificultad == "Dificil") ? 'selected' : ''; ?>>Difícil</option>
                    </select>

                    <small class="text-danger" id="error-dificultad"></small>
                </div>
                <div class="col-lg-6 row">
                    <div class="row container text-center mt-4 mb-3">
                        <div class="col ms-5 ms-md-4">   
                        <img src="../svg/alarm.svg" width="25px" class="icono-item" alt="Tiempo icon">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="tiempo-elaboracion" class="h6 form-label">Tiempo de elaboración</label>
                        <input type="number" class="form-control" name="minutos_prep" placeholder="Ej: 30, 120..." aria-label="Number tiempo" id="tiempo-elaboracion" min="1" max="999999" value="<?php echo $minutos_prep?>" required>
                        <small class="text-danger" id="error-tiempo"></small>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="tiempo-unidad" class="h6 form-label">Hora/Minutos</label>
                        <select class="form-select" aria-label="Select unidad" name="tiempo_unidad" id="tiempo-unidad" required>

                            <option selected value="min">Minutos</option>
                            <option value="hora">Hora/s</option>
                        </select>
                    </div>
                </div>
                
            </div>

    </div>

    <div class="contenido-etiquetas container  w-100 w-lg-75 p-5  mt-5 seccion">
        <h5 class="h5 form-label">Etiquetas</h5>
        <div id="etiquetas">
            <div class="una_etiqueta d-grid gap-2 d-flex flex-column justify-content-md-end mt-3" id="item-etiqueta">

            <?php foreach ($etiquetaRecetaData as $etiquetaReceta) { ?>
                    <select class="form-select" aria-label="Select etiqueta" name="etiqueta[]" required>
                    <option value="" disabled>Selecciona una etiqueta</option>
                        <?php foreach ($etiquetasDisponibles as $etiquetaRow) {
                            $selected = '';
                            if ($etiquetaRow['id_etiqueta'] == $etiquetaReceta['id_etiqueta']) {
                                $selected = 'selected';  
                            }
                                echo '<option value="'.$etiquetaRow['id_etiqueta']. '" ' . $selected . '>' .$etiquetaRow['titulo'].'</option>';
                        }
                        ?>
                    </select>
            <?php } ?>

            </div>
            <small class="text-danger" id="error-etiqueta"></small>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="boton-item" type="button" id="agregar-etiqueta">+ Agregar etiqueta</button>
        </div>
    </div>                   

    <div class="contenido-ingredientes container  w-100 w-lg-75 ps-5 pe-4 pb-5 pt-4  mt-5 seccion">
        <div  id="ingredientes">
            <div class="row container-fluid">
                <div class="col-md-6 mt-4">
                    <label for="ingrediente" class="h5 form-label">Ingrediente</label>
                    <input type="text" class="ingrediente-input form-control" name="ingrediente[]" placeholder="Harina, Sal..." id="ingrediente" required>
                    <div class="search-ingrediente" id="search-ingrediente-0"></div>
                    <div>
                        <small class="text-danger" id="error-ingrediente"></small>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <label for="cantidad" class="h6 form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad[]" placeholder="400gr, una pizca..." id="cantidad">
                    <div>
                        <small class="text-danger" id="error-ingrediente-cantidad"></small>
                    </div>
                </div>
                <div class="col-md-2 mt-md-4 d-flex justify-content-end">
                    <button class="boton-secundario mt-4" type="button" id="quitar-ing" disabled><i class="bi bi-trash me-1"></i>Quitar</button>
                </div>
            </div>
        </div>                
        <div class="d-flex justify-content-center mt-5">
            <button class="boton-item" type="button" id="agregar-ing">+ Agregar Ingrediente</button>
        </div>
    </div>

    <div class="contenido-pasos container  w-100 w-lg-75 p-5 mt-5 seccion">
        <h5 class="h5 form-label">Pasos</h5>
            <ol class=" list-group-numbered h6" id="list-paso">
                <li class="item-lista list-group-item" id="li-paso">
                    <div class="un_paso d-grid d-flex justify-content-end">
                        <textarea class="form-control input-paso textarea-resize item-paso" name="paso[]" placeholder="Ej: Mezcla los ingredientes en un bowl..." required></textarea>   
                    </div> 
                    <small class="text-danger" id="error-paso"></small>
                    <div class="d-grid d-flex justify-content-end mt-2">
                        <button class="boton-secundario d-flex" type="button" id="quitar-paso" disabled><i class="bi bi-trash me-1"></i>Quitar</button>
                    </div>                
                    <div class="elementos-paso d-grid gap-2 d-md-flex justify-content-md-start">
                        <div class="contenedor-paso-img justify-content-start">
                            <img src="default-image.png" class="img-paso border rounded img-fluid img-paso-id" alt="Imagen del paso">
                            <input class="form-control mt-2 file-paso" type="file" name="imagenes_paso1[]" multiple>
                            <button class="boton-secundario d-flex mt-2 d-none quitar-imagen" type="button"><i class="bi bi-trash me-1"></i>Quitar Imagen</button>         
                        </div>
                    </div>
                </li>
            </ol>
            <div class="d-flex justify-content-center mt-3">
                <button class="boton-item" type="button" id="agregar-paso">+ Agregar Paso</button>
            </div>
        </div>
    </div>
        

    <div  class="d-grid gap-2 d-flex justify-content-end m-5">
        <div>
            <button class="boton-secundario" type="button" id="btn-cancelar" data-bs-toggle="modal" data-bs-target="#cancelar-publicacion">Cancelar</button>
        </div>
        <div>
            <button class="boton-principal" type="submit" id="btn-publicar">Guardar cambios</button>
        </div>
    </div>  
    
    <!-- Modal -->
    <div class="modal fade" id="cancelar-publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estás seguro?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se perderan los cambios y serás redirigido al Inicio
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
            <a href="../index/index.php"> <button type="button" class="btn btn-outline-success">Aceptar</button></a>
            </div>
        </div>
        </div>
    </div>

</form>

<?php include '../includes/footer.php'?>  