<?php session_start();

include '../includes/permisos.php';

    if (!isset($_SESSION['id'])) {
        header('Location: ../index/index.php'); 
        exit();

    }else{
        
        
        if (! Permisos::tienePermiso('Acceder a Administración', $_SESSION['id'])) {
            header('Location: ../index/index.php'); // Vuelvo no tiene permiso //location pagina error
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>

        <?php include '../includes/head.php'?>
        <link rel="stylesheet" href="../css/e-admin.css">
    </head>
    
<body>

<?php include '../includes/header.php'?>

    <!-- Main container -->
    <div class="container mt-5">
        <div class="row admin-container">
            
            <!-- Dashboard izquierdo -->
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="custom-bg text-center text-decoration-none py-3 fw-bolder fs-5">Dashboard de administrador</a>
                    
                    <?php if (Permisos::tienePermiso('Gestionar Categorias', $_SESSION['id'])) 
                    {?>
                        <a href="#admin-categorias" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Gestionar Categorias</p><span id="cont-categorias" class="badge text-bg-success rounded-pill"></span></div></a>
                    <?php } ?>

                    <?php if (Permisos::tienePermiso('Gestionar Etiquetas', $_SESSION['id'])) 
                    {?>
                        <a href="#admin-etiquetas" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Gestionar Etiquetas</p><span id="cont-etiquetas" class="badge text-bg-success rounded-pill"></span></div></a>
                    <?php } ?>

                    <?php if (Permisos::tienePermiso('Gestionar Ingredientes', $_SESSION['id'])) 
                    {?>
                        <a href="#admin-ingredientes" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Gestionar Ingredientes</p><span id="cont-ingredientes" class="badge text-bg-success rounded-pill"></span></div></a>
                    <?php } ?>

                    <?php if (Permisos::tienePermiso('Gestionar Usuarios Reportados', $_SESSION['id'])) 
                    {?>
                        <a href="#admin-usuarios" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Usuarios reportados</p><span id="cont-usuarios-report" class="badge text-bg-success rounded-pill"></span></div></a> 
                    <?php } ?>

                    <?php if (Permisos::tienePermiso('Gestionar Comentarios Reportados', $_SESSION['id'])) 
                    {?>
                        <a href="#admin-comentarios" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Comentarios reportados</p><span id="cont-comentarios-report" class="badge text-bg-success rounded-pill"></span></div></a> 
                        <?php } ?>

                    <?php if (Permisos::tienePermiso('Gestionar Publicaciones Reportadas', $_SESSION['id'])) 
                    {?>
                        <a href="#admin-publicaciones" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Publicaciones reportadas</p><span id="cont-publicaciones-report" class="badge text-bg-success rounded-pill"></span></div></a> 
                    <?php } ?>

                </div>
            </div>

            <!-- Contenedor derecho -->
            <div class="content col-md-8 col-lg-8">

                <div class="panel panel-default">
                    <div class="panel-heading d-flex justify-content-between align-items-center p-3 border border-bottom-0 custom-bg">
                        <h4 class="panel-title m-0">Seccion</h4>
                        <button class="btn col-lg-6 w-25 btn-add-item" id="btn-add-item" data-bs-toggle="modal" data-bs-target="#modalGestionItem">Añadir Item</button>
                    </div>
                    <div class="panel-body">
                        <!-- Contenido principal de administración -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para crear/editar categorias -->
    <div class="modal fade" id="modalGestionCategoria" tabindex="-1" aria-labelledby="modalGestionCategoria" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGestionCategoriaTitulo">Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario-gestion-categorias" data-accion="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="inputCategoriaTitulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="inputCategoriaTitulo" name="inputCategoriaTitulo" required>

                            <img src="" id="imgPreviaCategoria" alt="imagen de categoria" class="d-none rounded-circle">
                            <label for="imagen" class="mt-3 form-label">Imagen</label>
                            <input type="file" id="imagen" name="imagen">

                            <hr>

                            <label for="seccion" class="mt-3 form-label">Seccion</label>
                            <select name="seccion" class="col-sm-12"  id="seccion" required>
                                <option selected></option>
                                <option value="saladas">Saladas</option>
                                <option value="ocasiones-especiales">Ocasiones especiales</option>
                                <option value="dietas-especiales">Dietas especiales</option>
                                <option value="bebidas">Bebidas</option>
                                <option value="dulces">Dulces</option>
                            </select>
                            <input type="hidden" id="categoriaID" name="categoriaID" value=""/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-add-item">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para crear/editar etiquetas -->
    <div class="modal fade" id="modalGestionEtiqueta" tabindex="-1" aria-labelledby="modalGestionEtiquetaTitulo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGestionEtiquetaTitulo">Titulo Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario-gestion-etiquetas" data-accion="">
                        <div class="mb-3">
                            <label for="inputEtiquetaTitulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="inputEtiquetaTitulo" name="inputEtiquetaTitulo" required>
                            <input type="hidden" id="etiquetaID" name="etiquetaID" value="" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-add-item">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para crear/editar ingredientes -->
    <div class="modal fade" id="modalGestionIngrediente" tabindex="-1" aria-labelledby="modalGestionIngredienteTitulo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGestionIngredienteTitulo">Titulo Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario-gestion-ingredientes" data-accion="">
                        <div class="mb-3">
                            <label for="inputIngredienteTitulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="inputIngredienteTitulo" name="inputIngredienteTitulo" required>
                            <input type="hidden" id="ingredienteID" name="ingredienteID" value="" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-add-item">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar items -->
    <div class="modal fade" id="modalEliminarItem" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEliminarItemTitulo">Eliminar item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <span id="modalEliminarItemMensaje">¿Está seguro de que desea eliminar el item: ?</span>
                </div>

                <div class="modal-footer">
                    <form action="" id="formulario-eliminar-item" class="w-100">
                        <input type="hidden" id="ItemID" name="ItemID" value=""/>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Si, eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de suspender un usuario -->
    <div class="modal fade" id="modalSuspenderUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSuspenderUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="modalSuspenderUsuarioTitle">Penalización</h4>
                </div>
                <form action="" id="formulario-ban">

                    <div class="modal-body">
                        <div class="d-flex flex-column align-items-start">
    
                            <label for="inputDuracionBan" class="form-label fs-5">Suspender usuario hasta:</label>
                            <input class="fs-5" type="datetime-local" name="inputDuracionBan" id="inputDuracionBan">
    
                            <hr>
    
                            <div class="mt-2 d-flex flex-row align-items-center">
                                <label for="inputPermaBan" class="form-label m-0 me-3 fs-5">Suspender permanentemente</label>
                                <input type="checkbox" class="form-check-input m-0 border border-danger shadow-none fs-3" name="inputPermaBan" id="inputPermaBan">
                                <input type="hidden" id="cuentaID" name="cuentaID" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Penalizar</button>
                    </div>

                </form>
          </div>
        </div>
    </div>

    <!-- Modal para eliminar obj reportado -->
    <div class="modal fade" id="modalEliminarObj" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEliminarObjTitulo">Eliminar obj</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <span id="modalEliminarObjMensaje">¿Está seguro de que desea eliminar el obj: "" ?</span>
                </div>

                <div class="modal-footer">
                    <form action="" id="formulario-eliminar-obj" class="w-100">
                        <input type="hidden" id="ObjID" name="ObjID" value=""/>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Si, eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para visualizar reportes y observaciones -->
    <div class="modal fade" id="modalListaReportes" tabindex="-1" aria-labelledby="modalListaReportesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content h-75" data-dmode>
                <div class="modal-header">
                    <h5 class="modal-title" id="modalListaReportesLabel">Lista de reportes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <ul id="listadoDeReportes" class="m-3 mt-5"></ul>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST PARA NOTIFICAR MENSAJES DE ÉXITO -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1055;">

        <div id="formToastSuccess" class="toast align-items-center text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div  id="toast-success-msg" class="toast-body">
                -Mensaje exitoso correspondiente-
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
    
    <!-- TOAST PARA NOTIFICAR MENSAJES DE ERROR -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1055;">

        <div id="formToastError" class="toast align-items-center text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div id="toast-error-msg" class="toast-body">
                -Mensaje de error correspondiente-
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>

    <!-- Scripts de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Scripts propio ( debe estar despues de cargar bootstrap para no tener problemas con modales/popups ) -->
    <script defer type="module" src="./admin.js"></script>

</body>

</html>