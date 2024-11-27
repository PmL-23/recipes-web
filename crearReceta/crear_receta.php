<?php

session_start();

include '../includes/permisos.php';

if (!isset($_SESSION['id'])) {
    header('Location: ../index/index.php'); 
    exit();

}else{
    
    if (! Permisos::tienePermiso('Subir Receta', $_SESSION['id'])) {
        header('Location: ../index/index.php'); 
        exit();
    }
}

require_once('../includes/conec_db.php');

$categoriaQuery = "SELECT * FROM categorias WHERE estado = 1 ORDER BY categorias.id_categoria DESC";
$queryResultsCategoria = $conn->prepare($categoriaQuery);
$queryResultsCategoria->execute(); 

if (!$queryResultsCategoria) {
    echo "Error en la consulta SQL";
    exit();
}

$paisQuery = "SELECT * FROM paises ORDER BY paises.id_pais ASC";
$queryResultsPais = $conn->prepare($paisQuery);
$queryResultsPais->execute(); 

if (!$queryResultsPais) {
    echo "Error en la consulta SQL";
    exit();
}

$etiquetasQuery = "SELECT * FROM etiquetas WHERE estado = 1 ORDER BY etiquetas.id_etiqueta DESC";
$queryResultsEtiquetas = $conn->prepare($etiquetasQuery);
$queryResultsEtiquetas->execute(); 

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
        <script src="crear_receta_script.js" defer></script>
        
        
    </head>
    
<body>
<?php include '../includes/header.php'?>



<form class="" method="POST" id="frm-receta" name="frm-receta">    
    <div class="contenido-principal container w-100 w-lg-75 p-5 seccion">
            <div class="contenedor-img-preview text-center d-flex p-2 justify-content-center overflow-hidden">
                <img src="default-image.png" class="preview border rounded img-fluid" alt="Vista previa de la portada" id="preview-portada">
            </div>
            <div class="mt-3">
                <label for="foto-portada" class="h5 form-label mt-3">Foto de portada</label>
                <input type="file" name="imagenes[]" id="foto-portada" accept="image/*" multiple>
                <small class="text-danger" id="errorPortada"></small>
            </div>

    
            <div class="mt-3">
                <label class="h5 form-label mt-3" for="titulo">TÍtulo</label>
                <input class="form-control form-control-md" type="text" placeholder="Añade el titulo de tu receta" aria-label=".form-control" id="titulo" name="titulo" maxlength="100">
                <small class="text-danger" id="error-titulo"></small>
            </div>
        
            <div class="mt-3">
            <label for="descripcion" class="h5 form-label mt-3">Descripción</label>
            <textarea class="form-control textarea-resize" id="descripcion" name="descripcion" placeholder="Añade una descripción a tu receta"></textarea>
            <small class="text-danger" id="error-descripcion"></small>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="c-paises" id="input-paises">
                        <h4 for="select-pais" class="h6 form-label mt-3">País</h4>
                        <div class="pais-container my-2 d-flex flex-row">
                            <select class="w-50 select-pais form-select" aria-label="Select pais" name="pais[]" id="pais">
                                <option value="" selected disabled>Selecciona un país</option>
                                <?php
                                    while ($paisRow = $queryResultsPais->fetch(PDO::FETCH_ASSOC)) {
                                        $rutaBandera = "../svg/" . $paisRow['ruta_imagen_pais'];
                                        echo '<option class="option-pais" value="'.$paisRow['id_pais'].'" data-pais="'.$rutaBandera.'">'.$paisRow['nombre'].'</option>';
                                    }
                                ?>
                            </select>
                            <small class="text-danger error-pais d-flex" id="error-pais"></small>
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
                            echo '<option value="'.$categoriaRow['id_categoria'].'">'.$categoriaRow['titulo'].'</option>';
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
                    <select class="form-select" aria-label="Select dificultad" id="dificultad" name="dificultad">
                        <option selected disabled>Elegí la dificultad de tu platillo</option>
                        <option value="Fácil">Fácil</option>
                        <option value="Media">Media</option>
                        <option value="Dificil">Difícil</option>
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
                        <input type="number" class="form-control" name="minutos_prep" placeholder="Ej: 30, 120..." aria-label="Number tiempo" id="tiempo-elaboracion" min="1" max="999999">
                        <small class="text-danger" id="error-tiempo"></small>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="tiempo-unidad" class="h6 form-label">Hora/Minutos</label>
                        <select class="form-select" aria-label="Select unidad" name="tiempo_unidad" id="tiempo-unidad">
                            <option selected value="minutos">Minutos</option>
                            <option value="hora">Hora/s</option>
                        </select>
                        <small class="text-danger" id="error-unidad"></small>
                    </div>
                </div>
                
            </div>

    </div>

    <div class="contenido-etiquetas container  w-100 w-lg-75 p-5  mt-5 seccion">
        <h5 class="h5 form-label">Etiquetas</h5>
        <div id="etiquetas">
            <div class="una_etiqueta d-grid gap-2 d-flex flex-column justify-content-md-end mt-3" id="item-etiqueta">
                <select class="form-select select-etiqueta" aria-label="Select etiqueta" name="etiqueta[]">
                    <option value="" selected disabled>Selecciona una etiqueta</option>
                    <?php 
                        while ($etiquetaRow = $queryResultsEtiquetas->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="'.$etiquetaRow['id_etiqueta'].'">'.$etiquetaRow['titulo'].'</option>';
                        }
                    ?>  
                </select>
                <small class="text-danger error-etiqueta" id="error-etiqueta"></small>
            </div>
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
                    <input type="text" class="ingrediente-input form-control" name="ingrediente[]" placeholder="Harina, Sal..." id="ingrediente">
                    <div class="search-ingrediente" id="search-ingrediente-0"></div>
                    <div>
                        <small class="text-danger error-ingrediente" id="error-ingrediente"></small>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <label for="cantidad" class="h6 form-label">Cantidad</label>
                    <input type="text" class="form-control cantidad-input" name="cantidad[]" placeholder="400gr, una pizca..." id="cantidad">
                    <div>
                        <small class="text-danger error-ingrediente-cantidad" id="error-ingrediente-cantidad"></small>
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
                    <div class="un_paso d-grid gap-2 flex-column d-flex justify-content-end">
                        <textarea class="form-control input-paso textarea-resize item-paso" name="paso[]" placeholder="Ej: Mezcla los ingredientes en un bowl..."></textarea>   
                        <small class="text-danger error-paso" id="error-paso"></small>
                    </div> 
                    <div class="d-grid d-flex justify-content-end mt-2">
                        <button class="boton-secundario d-flex" type="button" id="quitar-paso" disabled><i class="bi bi-trash me-1"></i>Quitar</button>
                    </div>                
                    <div class="elementos-paso d-grid gap-2 d-md-flex justify-content-md-start">
                        <div class="contenedor-paso-img justify-content-start">
                            <img src="default-image.png" class="img-paso border rounded img-fluid img-paso-id" alt="Imagen del paso">
                            <input class="form-control mt-2 file-paso" type="file" name="imagenes_paso1[]" accept="image/*" multiple>
                            <small class="text-danger error-imagen-paso"></small>
                            <button class="boton-secundario d-flex mt-2 d-none quitar-imagen" type="button"><i class="bi bi-trash me-1"></i>Quitar Imagen</button>         
                        </div>
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
            <button class="boton-principal" type="submit" id="btn-publicar">Publicar</button>
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
                Se perderan los datos ingresados y serás redirigido al Inicio
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