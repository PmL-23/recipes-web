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


if (isset($_SESSION['id'])) {
    $usuarioID = $_SESSION['id'];

$query = "SELECT username FROM usuarios WHERE id_usuario = :id";
$stm = $conn->prepare($query);
$stm->bindParam(':id', $usuarioID);
$stm->execute();

$usuarioL = $stm->fetch(PDO::FETCH_ASSOC);
$nombreUserLogueado = $usuarioL["username"];

if($Nombre_Usuario == $nombreUserLogueado)
{
    header('Location: ../perfil-usuario/mi_perfil.php'); 
        exit();
}
}

$query = "SELECT 1 from usuarios where username = :NombreUsuario";
$stm = $conn->prepare($query);
$stm->bindParam(':NombreUsuario', $Nombre_Usuario);
$stm->execute();
$existUser = $stm->fetchAll(PDO::FETCH_ASSOC);

if (count($existUser)  == 0){
    $Nombre_Usuario ="";

}
$permisoGuardarReceta = false;
$permisoReportarPerfil = false;
$permisoSeguirUsuario = false;

if (isset($_SESSION['id'])) {
    $IDSession = $_SESSION['id'];

require_once('../includes/permisos.php');

    if (Permisos::tienePermiso('Guardar Receta', $IDSession)) {
        $permisoGuardarReceta = true;
    }
    else{
        $permisoGuardarReceta = false;
    }
    if(Permisos::tienePermiso('Reportar Perfil', $IDSession)) {
        $permisoReportarPerfil = true;
    }
    else{
        $permisoReportarPerfil = false;

    }
    if (Permisos::tienePermiso('Seguir Usuario', $IDSession)) {
        $permisoSeguirUsuario = true;
    }
    else{
        $permisoSeguirUsuario = false;
    }

//var_dump($permisoSeguirUsuario);
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
    
<body data-Nombre_Usuario="<?php echo htmlspecialchars($Nombre_Usuario); ?>" data-url-base="<?php echo htmlspecialchars($urlVariable); ?>" data-Session-IDUsuario="<?php if (isset($_SESSION['id'])) echo htmlspecialchars($IDSession); ?>"
data-Permiso_GuardarReceta="<?php echo $permisoGuardarReceta; ?>">

<?php include '../includes/header.php';
?>

    <div class="container-fluid row mt-0"> <!-- el contenedor de un perfil tedrá el nombre, la foto, la cantidad de perfiles seguidos y los seguidores propios-->

        <div class="col-6 d-inline p-3 mt-0">
            <div class="FotoDePerfil p-1 d-inline">
                <img class="d-inline" alt="Foto de Perfil" src=""width="50" height="50" id="IDFotoPerfil">
            </div>
            <p class="d-inline" id="IDNombreCompletoDeUsuario"></p>
            <img src="../svg/Argentina.svg" alt="Bandera" width="27" class="bandera" id="IDBanderaPerfil">
            <p class="d-inline text-secondary" id="IDNombreDeUsuario"></p>
            <!-- Botón Seguir -->
            <div class="d-inline">
                <?php if($permisoSeguirUsuario){?>

            <button id="btn-SeguirPerfil" class="btn btn-primary rounded-pill align-items-center gap-2">
                <i class="bi bi-person-plus-fill"></i>
                <span>Seguir</span>
            </button>
            
            <?php }?>
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
        
        <div class="col-5 row mt-1 p-0">
            <div class="col-4 p-0 mt-0">
                <p class="box p-0 d-flex justify-content-center align-items-center">Seguidores</p>
                <p class="boxcantidad mt-0 p-0 d-flex justify-content-center align-items-center" id="IDCantidadSeguidores"></p>
            </div>
            
            <div class="col-5  p-0 mt-0">
                <p class="box p-0 d-flex justify-content-center align-items-center">Siguiendo</p>
                <p class="boxcantidad mt-0 p-0 d-flex justify-content-center align-items-center" id="IDCantidadSeguidos"></p>
            </div>
            <?php if($permisoReportarPerfil){?>
            <div class="col-2 p-0 mt-0 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-outline-warning bg-none" id="btn-ReportarPerfil" data-bs-toggle="modal" data-bs-target="#modalReportarUsuario">
                    <i class="bi bi-flag-fill text-black"></i>
                </button>
            </div>
            <?php }?>

        </div>
    </div>

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
