<?php
require_once('../includes/razonesReporte.php');
session_start();
include_once '../includes/conec_db.php';
if (!isset($_GET['NombreDeUsuario'])) {
    echo json_encode([
        'success' => false,
        'error' => [
            'cliente' => [
                'No se especifico un usuario',
            ],
        ],
    ], JSON_PRETTY_PRINT);
    die();
}


$Nombre_Usuario = $_GET['NombreDeUsuario'];

$query = "SELECT 1 from usuarios where username = :NombreUsuario";
$stm = $conn->prepare($query);
$stm->bindParam(':NombreUsuario', $Nombre_Usuario);
$stm->execute();
$existUser = $stm->fetchAll(PDO::FETCH_ASSOC);

if (count($existUser)  == 0){
    $Nombre_Usuario ="";

}
/* if (count($existUser)  == 1){
    
} */
if (isset($_SESSION['id'])) {
    $IDSession = $_SESSION['id'];
}
//seccion en la que obtenemos la url actual.
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";      
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];
$currentUrl = $scheme . "://" . $host . $requestUri;
$indexPosition = strpos($currentUrl, 'CarpetaPerfil');
$urlVariable = '';

if ($indexPosition !== false) {
    $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('CarpetaPerfil'));
} else {

    $indexPosition = strpos($currentUrl, 'CarpetaPerfil/');
    if ($indexPosition !== false) {
        $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('CarpetaPerfil/'));
    } else {
        // Fallback: usar el esquema y host si no se encuentran patrones
        $urlVariable = $scheme . "://" . $host . '/';
    }
}
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>
        <script src="../CarpetaPerfil/JSPerfil.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body data-Nombre_Usuario="<?php echo htmlspecialchars($Nombre_Usuario); ?>" data-url-base="<?php echo htmlspecialchars($urlVariable); ?>" data-Session-IDUsuario="<?php if (isset($_SESSION['id'])) echo htmlspecialchars($IDSession); ?>">

<?php include '../includes/header.php';
?>

    <div class="container-fluid row mt-0"> <!-- el contenedor de un perfil tedrá el nombre, la foto, la cantidad de perfiles seguidos y los seguidores propios-->

        <div class="col-8 d-inline p-3 mt-0">
            <div class="FotoDePerfil p-1 d-inline">
                <img class="d-inline" alt="Foto de Perfil" src=""width="50" height="50" id="IDFotoPerfil">
            </div>
            <p class="d-inline" id="IDNombreCompletoDeUsuario"></p>
            <p class="d-inline text-secondary" id="IDNombreDeUsuario"></p>
            <!-- Botón Seguir -->
            <div class="d-inline">
            <button id="btn-SeguirPerfil" class="btn btn-primary rounded-pill align-items-center gap-2">
                <i class="bi bi-person-plus-fill"></i>
                <span>Seguir</span>
            </button>
            </div>

        <!-- Dropdown
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle btn-sm p-0" data-bs-toggle="dropdown" aria-expanded="false"></button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCambiarContrasena">Cambiar Contraseña</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditarPerfil">Editar Perfil</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCompartirPerfil">Compartir Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarCuenta">Eliminar Cuenta</a></li>
            </ul>
</div>-->

        <!-- Modal Cambiar Contraseña -->
        <div class="modal fade" id="modalCambiarContrasena" tabindex="-1" aria-labelledby="modalCambiarContrasenaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCambiarContrasenaLabel">Cambiar Contraseña</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <form>
                            <div class="mb-3 ">
                                <label for="IDContraseñaActualEnCambiarContraseña" class="form-label">Contraseña actual</label>
                                <input type="password" class="form-control" id="IDContraseñaActualEnCambiarContraseña">
                            </div>
                            <div class="mb-3">
                                <label for="IDNuevaContraseñaEnCambiarContraseña" class="form-label">Nueva contraseña</label>
                                <input type="password" class="form-control" id="IDNuevaContraseñaEnCambiarContraseña">
                            </div>
                            <div class="mb-3">
                                <label for="IDConfirmacionNuevaContraseñaEnCambiarContraseña" class="form-label">Repetir nueva contraseña</label>
                                <input type="password" class="form-control" id="IDConfirmacionNuevaContraseñaEnCambiarContraseña">
                            </div>
                            <button type="submit" class="btn btn-primary" id="IDGuardarCambiosEnCambiarContraseña">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal Editar Perfil -->
        <div class="modal fade" id="modalEditarPerfil" tabindex="-1" aria-labelledby="modalEditarPerfilLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditarPerfilLabel">Editar Perfil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Apartados no modificables -->
                    <div class="mb-3">
                    <label for="IDNombreDeUsuarioEnEditarPerfil" class="form-label ">Nombre de Usuario</label>
                    <input type="text" id="IDNombreDeUsuarioEnEditarPerfil" class="form-control input-readonly" value="Usuario123" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="IDEmailEnEditarPerfil" class="form-label">Correo Electrónico</label>
                        <input type="email" id="IDEmailEnEditarPerfil" class="form-control input-readonly" value="usuario@example.com" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="IDFechaNacimientoEnEditarPerfil" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="IDFechaNacimientoEnEditarPerfil" class="form-control input-readonly" value="2000-01-01" readonly>
                    </div>
                    <hr>
                <!-- Formulario con apartados editables -->
                <form id="PerfilUsuarioForm">
                    <div class="mb-3">
                        <label for="IDNombreEnEditarPerfil" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" placeholder="Ingrese su nombre">
                    </div>
                    <div class="mb-3">
                        <label for="IDApellidoEnEditarPerfil" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="IDApellidoEnEditarPerfil" placeholder="Ingrese su apellido">
                    </div>

                    <div class="mb-3">
                        <label for="IDFotoDePerfilEnEditarPerfil" class="form-label">Cambiar Foto de Perfil</label>
                        <input type="file" id="IDFotoDePerfilEnEditarPerfil" class="form-control" accept="image/*" onchange="previewImage(event)">
                    </div>
                        <div class="mb-3">
                            <img id="imagePreview" src="#" alt="Vista Previa" style="display:none; width: 100%; max-height: 200px; object-fit: cover;">
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>



        <!-- Modal Compartir Perfil -->
        <div class="modal fade" id="modalCompartirPerfil" tabindex="-1" aria-labelledby="modalCompartirPerfilLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCompartirPerfilLabel">Compartir Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Copiar el enlace para compartir tu perfil:</p>
                        <input type="text" class="form-control" value="https://RecetasDeAmerica.com/MiPerfil" readonly>
                        <button class="btn btn-primary mt-3" onclick="CopiarEnlacePerfil()">Copiar Enlace</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar Cuenta -->
        <div class="modal fade" id="modalEliminarCuenta" tabindex="-1" aria-labelledby="modalEliminarCuentaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEliminarCuentaLabel">Eliminar Cuenta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres eliminar tu cuenta? Esta acción no se puede deshacer.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Botón que abre el modal de confirmación -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmarEliminacion">Eliminar Cuenta</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Confirmación de Eliminación -->
        <div class="modal fade" id="modalConfirmarEliminacion" tabindex="-1" aria-labelledby="modalConfirmarEliminacionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmarEliminacionLabel">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás completamente seguro de que deseas eliminar tu cuenta?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="IDBotonEliminarCuenta">Sí, eliminar cuenta</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL REPORTAR PUBLICACIÓN -->

        <div class="modal fade p-0" id="modalReportarUsuario" tabindex="-1" aria-labelledby="modalReportarUsuarioLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modalReportarUsuarioLabel">Reportar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form id="formReportarUsuario">

                            <div class="mb-3">
                                <label for="motivo" class="form-label">Motivo</label>
                                <select class="form-select" id="motivo" name="motivo" required>
                                    <option value="">Seleccione un motivo</option>
                                    <?php if (!empty($razonesReporte)) {
                                        foreach ($razonesReporte as $razon) {
                                            echo '<option value=' . $razon['id_razon'] . '>' . $razon['descripcion'] . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="observacion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="observacion" id="observacion" rows="7" placeholder="Detalles sobre el motivo del reporte.." required></textarea>
                            </div>

                            <input type="hidden" name="usuario_reportado" value="<?php if (isset($_GET['NombreDeUsuario'])) echo $_GET['NombreDeUsuario']; ?>">

                            <button type="submit" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">Enviar Reporte</button>

                        </form>

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

    </div>
        
        <div class="col-4 row mt-1 p-0">
            <div class="col-4 p-0 mt-0">
                <p class="box p-0 d-flex justify-content-center align-items-center">Seguidores</p>
                <p class="boxcantidad mt-0 p-0 d-flex justify-content-center align-items-center" id="IDCantidadSeguidores"></p>
            </div>
            
            <div class="col-5  p-0 mt-0">
                <p class="box p-0 d-flex justify-content-center align-items-center">Siguiendo</p>
                <p class="boxcantidad mt-0 p-0 d-flex justify-content-center align-items-center" id="IDCantidadSeguidos"></p>
            </div>

            <div class="col-2 p-0 mt-0 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-outline-warning bg-none" id="btn-ReportarPerfil" data-bs-toggle="modal" data-bs-target="#modalReportarUsuario">
                    <i class="bi bi-flag-fill text-black"></i>
                </button>
            </div>

        </div>
    </div>
    <!-- espacio para cada publicacion, tendra la partes, pero todo dentro de un div
    con un sutil borde para que parezca un bloque
    Encabezado:
        Foto de perfil
        Nombre y apellido de persona 
        Nombre de Usuario del publicador de la receta(link para entrar al perfil)
    Body:
        Titulo y Descripcion de la Receta
        Carrousel de fotos de la publicación.
        Categoria y Etiquetas
        Ingredientes 
        
    Pie de Publicacion:
        Valoracion y al lado entre parensis cantidad de valoraciones
        Cantidad de comentarios.
        Boton para compartir.
        Boton para guardar en favoritos.

-->
<hr class="mt-0">

    <div class="container-fluid row" id="IDContenedorPublicacionesPropias">

    </div>


    <br>
    <br>

    <div>
    <?php include '../includes/footer.php'?>  
    </div>


    <div class="modal fade custom-modal-position" id="resultModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialoggs">
        <div class="modal-content" id="modalContent">
            <div class="modal-body">
                <span id="modalIcon" class="me-2"></span>
                <span id="modalMessage"></span>
            </div>
        </div>
    </div>
    </div>

</body>
</html>
