<?php include '../includes/header.php'?>
    

<form class="needs-validation" action="" method="get" id="frm-receta">    
    <div class="contenido-principal container w-100 w-lg-75 p-5 seccion">
            <div class="contenedor-img-preview text-center d-flex p-2 justify-content-center">
                <img src="default-image.png" class="preview border rounded img-fluid" alt="Vista previa de la portada" id="preview-portada">
            </div>
            <div>
                <label for="foto-portada" class="h5 form-label">Foto de portada</label>
                <input class="form-control form-control-md" id="foto-portada" name="nportada" type="file" accept="image/*" required>
                <small class="text-danger" id="errorPortada"></small>
            </div>

            <div>
                <label class="h5 form-label" for="titulo">TÍtulo</label>
                <input class="form-control form-control-md" type="text" name="ntitulo" placeholder="Añade el titulo de tu receta" aria-label=".form-control" id="titulo" maxlength="100" required>
                <small class="text-danger" id="error-titulo"></small>
            </div>
        
                <div>
                <label for="descripcion" class="h5 form-label">Descripción</label>
                <textarea class="form-control textarea-resize" id="descripcion" name="ndescripcion" placeholder="Añade una descripción a tu receta" required></textarea>
                <small class="text-danger" id="error-descripcion"></small>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="select-pais" class="h6 form-label">País</label>
                    <select class="form-select" aria-label="Select pais" name="npais" id="select-pais" required>
                        <option selected value="sin">-</option>
                        <option value="arg">Argentina</option>
                        <option value="bol">Bolivia</option>
                        <option value="bra">Brasil</option>
                        <option value="chi">Chile</option>
                        <option value="col">Colombia</option>
                        <option value="ecu">Ecuador</option>
                        <option value="par">Paraguay</option>
                        <option value="per">Perú</option>
                        <option value="uru">Uruguay</option>
                        <option value="ven">Venezuela</option>
                    </select>
                    <small class="text-danger" id="error-pais"></small>
                    <span class="d-flex align-items-center"></span>
                        <img class="bandera-select d-none mini-bandera mt-2 float-end" src="" alt="Bandera del país" id="banderita">
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="categoria" class="h6 form-label">Categoría</label>
                    <select class="form-select" aria-label="Select pais" name="ncategoria" id="categoria">
                        <option selected>-</option>
                    </select>
                    <small class="text-danger" id="error-categoria"></small>
                </div>
            </div> 

            
            <div class="row">
                <div class="col mb-5">
                    <label for="dificultad" class="h6 form-label">Dificultad de elaboración</label>
                    <select class="form-select" aria-label="Select dificultad" name="ndificultad" id="dificultad" required>
                        <option selected disabled>Elegí la dificultad de tu platillo</option>
                        <option value="facil">Fácil</option>
                        <option value="media">Media</option>
                        <option value="dificil">Difícil</option>
                    </select>
                    <small class="text-danger" id="error-dificultad"></small>
                </div>
                <div class="col-md-3 col-sm-12">
                    <label for="tiempo-elaboracion" class="h6 form-label">Tiempo de elaboración</label>
                    <input type="number" class="form-control" name="ntiempoelab" placeholder="Ej: 30, 120..." aria-label="Number tiempo" id="tiempo-elaboracion" min="1" max="999999" required>
                    <small class="text-danger" id="error-tiempo"></small>

                </div>
                <div class="col-md-3 col-sm-12">
                    <label for="tiempo-unidad" class="h6 form-label">Hora/Minutos</label>
                    <select class="form-select" aria-label="Select unidad" name="ntiempounidad" id="tiempo-unidad" required>

                        <!-- Por ahora el rango será de minutos
                        <option selected disabled>-</option> -->
                        <option selected value="min">Minutos</option>
                        <option value disabled="hora">Hora/s</option>
                    </select>
                </div>
            </div>
                <div class="col-md-12">
                    <label for="etiqueta" class="h6 form-label">Etiqueta</label>
                    <input type="text" class="form-control form-control-md" name="netiqueta" id="text-etiqueta" placeholder="Ingrese una etiqueta">





    <!--                 <select class="form-select" aria-label="Select pais" name="netiqueta" id="etiqueta">
                        <option selected>-</option>
                    </select> --> 
                </div>    
            </div>
        </div>



        <div class="contenido-ingredientes container  w-100 w-lg-75 p-5  mt-5 seccion">
            <div id="ingredientes">
                <label class="h5 form-label">Ingredientes</label>
                <div class="un_ingrediente d-grid gap-2 d-md-flex justify-content-md-end" id="item-ingrediente">
                    <input type="text" class="form-control  me-md-2" name="ningrediente" placeholder="Ej: 400gr de harina..." id="primer-ingrediente" required>
                    <button class="btn border rounded" type="button" id="quitar-ing" disabled>Quitar</button>
                </div>
                <small class="text-danger" id="error-ingrediente"></small>
            </div>
            <div class="d-grid gap-2">
                <button class="btn-sm border rounded" type="button" id="agregar-ing">+ Agregar Ingrediente</button>
            </div>
        </div>

    <div class="contenido-pasos container  w-100 w-lg-75 p-5 mt-5 seccion">
        <div id="pasos">
            <label class="h5 form-label">Pasos</label>
            <ol class="list-group list-group-numbered" id="list-paso">
                <li class="item-lista list-group-item" id="li-paso">
                    <div class="un_paso d-grid gap-2 d-md-flex justify-content-md-end" id="item-paso">
                        <textarea class="form-control me-md-2 input-paso textarea-resize" name="npaso" placeholder="Ej: Mezcla los ingredientes en un bowl..." id="primer-paso" required></textarea>
                        <button class="btn-sm border rounded p-2 px-3" type="button" id="quitar-paso" disabled>Quitar</button>
                    </div>
                    <small class="text-danger" id="error-paso"></small>
                    <div class="elementos-paso d-grid gap-2 d-md-flex justify-content-md-start">
                        <div class="contenedor-paso-img">
                            <img src="default-image.png" class="img-paso border rounded img-fluid" alt="Imagen del paso" id="img-paso-id">
                            <input class="form-control mt-2" type="file" name="nimagenpaso" id="file-paso" accept="image/*">
                            <button class="btn-sm border rounded ms-2 d-none" type="button" id="quitar-imagen">Quitar Imagen</button>         
                        </div>
                    </div>
                </li>
            </ol>
        </div>
        <div class="d-grid gap-2">
            <button class="btn-sm border rounded" type="button" id="agregar-paso">+ Agregar Paso</button>
        </div>
    </div>

    <div  class="d-grid gap-2 d-flex justify-content-end m-5">
        <div>
            <button class="btn" type="button" id="btn-cancelar" data-bs-toggle="modal" data-bs-target="#cancelar-publicacion">Cancelar</button>
        </div>
        <div>
            <button class="btn btn-outline-light" type="submit" id="btn-publicar" >Publicar</button>
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
            <a href="../index.html"> <button type="button" class="btn btn-outline-success">Aceptar</button></a>
            </div>
        </div>
        </div>
    </div>
    
</form>

<?php include '../includes/footer.php'?>  