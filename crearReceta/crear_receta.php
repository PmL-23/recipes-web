<?php

session_start();
$serverName="127.0.0.1";
$username="root";
$password= "";
$dbname= "proyecto_recetas_prog_web";

$conn = new PDO("mysql:host=".$serverName.";dbname=".$dbname.";charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



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

if (!$queryResultsPais) {
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
        <link rel="stylesheet" href="../crearReceta/temas.css">
        <script src="../crearReceta/crear_receta_script.js" defer></script>
        
    </head>
    
<body>
<?php include '../includes/header.php'?>



<form class="" action="../crearReceta/form_crearReceta.php" method="POST" id="frm-receta" name="frm-receta">    
    <div class="contenido-principal container w-100 w-lg-75 p-5 seccion">
            <div class="contenedor-img-preview text-center d-flex p-2 justify-content-center">
                <img src="default-image.png" class="preview border rounded img-fluid" alt="Vista previa de la portada" id="preview-portada">
            </div>
            <div class="mt-3">
                <label for="foto-portada" class="h5 form-label mt-3">Foto de portada</label>
                <input class="form-control form-control-md" id="foto-portada" name="portada" type="file" accept="image/*" required>
                <small class="text-danger" id="errorPortada"></small>
            </div>
    
            <div class="mt-3">
                <label class="h5 form-label mt-3" for="titulo">TÍtulo</label>
                <input class="form-control form-control-md" type="text" placeholder="Añade el titulo de tu receta" aria-label=".form-control" id="titulo" name="titulo" maxlength="100" required>
                <small class="text-danger" id="error-titulo"></small>
            </div>
        
            <div class="mt-3">
            <label for="descripcion" class="h5 form-label mt-3">Descripción</label>
            <textarea class="form-control textarea-resize" id="descripcion" name="descripcion" placeholder="Añade una descripción a tu receta" required></textarea>
            <small class="text-danger" id="error-descripcion"></small>
            </div>

            <div class="row mt-3">
                <div class="c-paises col-md-6">
                    <div>
                        <label for="select-pais" class="h6 form-label mt-3">País</label>
                        <select class="form-select" aria-label="Select pais" name="pais[]" id="select-pais" required>
                            <option value="sin">Receta sin país</option>
                            <?php 
                            while ($paisRow = $queryResultsPais->fetch(PDO::FETCH_ASSOC)) {
                                $rutaBandera = "../svg/" . $paisRow['ruta_imagen_pais'];
                                echo '<option value="'.$paisRow['id_pais'].'" data-bandera="'.$rutaBandera.'">'.$paisRow['nombre'].'</option>';
                            }
                            ?>  
                        </select>
                        <small class="text-danger" id="error-pais"></small>
                        <span class="d-flex align-items-center mt-2">
                            <img class="bandera-select d-none mini-bandera" src="" alt="Bandera del país" id="banderita">
                        </span>
                    </div>
                    <div class="d-grid mt-5">
                        <button class="boton-item" type="button" id="agregar-pais">+ Agregar País</button>
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
                    <select class="form-select" aria-label="Select dificultad" id="dificultad" name="dificultad" required>
                        <option selected disabled>Elegí la dificultad de tu platillo</option>
                        <option value="facil">Fácil</option>
                        <option value="media">Media</option>
                        <option value="dificil">Difícil</option>
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
                        <input type="number" class="form-control" name="minutos_prep" placeholder="Ej: 30, 120..." aria-label="Number tiempo" id="tiempo-elaboracion" min="1" max="999999" required>
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
                <div class="col-md-12 etiquetas">
                    <label for="etiqueta" class="h6 form-label mt-5">Etiqueta</label>
                    <input type="text" class="form-control form-control-md" name="etiqueta" id="etiqueta" placeholder="Escribe una etiqueta...">
                </div>
                <!-- <div class="d-grid">
                <button class="boton-item mt-5" type="button" id="agregar-etiqueta">+ Agregar Etiqueta</button>
                </div> -->
            </div>

    </div>



    <div class="contenido-ingredientes container  w-100 w-lg-75 p-5  mt-5 seccion">
        <div id="ingredientes">
            <h5 class="h5 form-label">Ingredientes</h5>
            <div class="un_ingrediente d-grid gap-2 d-flex justify-content-md-end" id="item-ingrediente">
                <input type="text" class="form-control" name="ingrediente[]" placeholder="Ej: 400gr de harina..." id="primer-ingrediente" required>
                <button class="boton-secundario d-flex" type="button" id="quitar-ing" disabled><i class="bi bi-trash me-1"></i>Quitar</button>
            </div>
            <small class="text-danger" id="error-ingrediente"></small>
        </div>
        <div class="d-grid">
            <button class="boton-item" type="button" id="agregar-ing">+ Agregar Ingrediente</button>
        </div>
    </div>

    <div class="contenido-pasos container  w-100 w-lg-75 p-5 mt-5 seccion">
        <h5 class="h5 form-label">Pasos</h5>
            <ol class=" list-group-numbered h6" id="list-paso">
                <li class="item-lista list-group-item" id="li-paso">
                    <div class="un_paso d-grid d-flex justify-content-end" id="item-paso">
                        <textarea class="form-control input-paso textarea-resize" name="paso[]" placeholder="Ej: Mezcla los ingredientes en un bowl..." id="primer-paso" required></textarea>   
                    </div> 
                    <small class="text-danger" id="error-paso"></small>
                    <div class="d-grid d-flex justify-content-end mt-2">
                        <button class="boton-secundario d-flex" type="button" id="quitar-paso" disabled><i class="bi bi-trash me-1"></i>Quitar</button>
                    </div>                
                    <div class="elementos-paso d-grid gap-2 d-md-flex justify-content-md-start">
                        <div class="contenedor-paso-img justify-content-start">
                            <img src="default-image.png" class="img-paso border rounded img-fluid" alt="Imagen del paso" id="img-paso-id">
                            <input class="form-control mt-2" type="file" name="imagen_paso[]" id="file-paso" accept="image/*">
                            <button class="boton-secundario d-flex mt-2 d-none" type="button" id="quitar-imagen"><i class="bi bi-trash me-1"></i>Quitar Imagen</button>         
                        </div>
                    </div>
                </li>
            </ol>
            <div class="d-grid">
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