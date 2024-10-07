<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>

        <link rel="stylesheet" href="../css/e-admin.css">
        <script src="admin.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>

<?php include '../includes/header.php'?>

    <!-- Main container -->
    <div class="container">
        <div class="row admin-container">
            
            <!-- Dashboard izquierdo -->
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="list-group-item custom-bg">Dashboard de administrador</a>
                    <a href="#admin-categorias" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Gestionar Categorias</p><span id="cont-categorias" class="badge text-bg-success rounded-pill">5</span></div></a>
                    <a href="#admin-etiquetas" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Gestionar Etiquetas</p><span id="cont-etiquetas" class="badge text-bg-success rounded-pill">7</span></div></a>
                    <a href="#admin-ingredientes" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Gestionar Ingredientes</p><span id="cont-ingredientes" class="badge text-bg-success rounded-pill">11</span></div></a>
                    <a href="#admin-usuarios" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Usuarios reportados</p><span id="cont-usuarios-report" class="badge text-bg-success rounded-pill">5</span></div></a>
                    <a href="#admin-comentarios" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Comentarios reportados</p><span id="cont-comentarios-report" class="badge text-bg-success rounded-pill">3</span></div></a>
                    <a href="#admin-publicaciones" class="list-group-item"><div class="d-flex justify-content-between align-items-center"><p class="m-0">Publicaciones reportadas</p><span id="cont-publicaciones-report" class="badge text-bg-success rounded-pill">0</span></div></a>
                </div>
            </div>

            <!-- Contenedor derecho -->
            <div class="content col-md-8 col-lg-8">

                <div class="panel panel-default">
                    <div class="panel-heading d-flex justify-content-between align-items-center p-3 border border-bottom-0 custom-bg">
                        <h4 class="panel-title m-0">[TITULO DE SECCION]</h4>
                        <button class="btn col-lg-6 w-25 btn-add-item" data-bs-toggle="modal" data-bs-target="#modalGestionItem">Añadir [ITEM]</button>
                    </div>
                    <div class="panel-body">
                        <!-- Contenido principal de administración -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para gestionar campos de tabla -->
    <div class="modal fade" id="modalGestionItem" tabindex="-1" aria-labelledby="modalGestionItemLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGestionItemLabel">Titulo Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario" data-accion="">
                        <div class="mb-3">
                            <label for="inputNombreItem" class="form-label">Nombre del campo</label>
                            <input type="text" class="form-control" id="inputNombreItem" required>
                            <input type="hidden" id="itemID" name="itemID" value="" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-add-item">Guardar</button>
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
                    <h4 class="modal-title fs-5" id="modalSuspenderUsuarioLabel">Penalización</h4>
                </div>
                <div class="modal-body">
                    <form action="" id="formulario-ban">
                        <div class="d-flex flex-column align-items-start">
                            <label for="inputDuracionBan" class="form-label">Días de penalización</label>
                            <input type="number" name="inputDuracionBan" id="inputDuracionBan" min="1" max="30">

                            <div class="mt-2">
                                <label for="inputPermaBan" class="form-label m-0">Suspender permanentemente</label>
                                <input type="checkbox" class="form-check-input" name="inputPermaBan" id="inputPermaBan">
                                <input type="hidden" id="itemID" name="itemID" value="" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Penalizar</button>
                </div>
          </div>
        </div>
    </div>

    <!-- Scripts de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts propio ( debe estar despues de cargar bootstrap para no tener problemas con modales/popups ) -->
    <script src="admin.js"></script>
</body>

</html>