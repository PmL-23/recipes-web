<?php
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
    echo 'PERO PONE EL IDUSUARIO EN EL GET CAPO';
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

//seccion en la que obtenemos la url actual.
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";      
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];
$currentUrl = $scheme . "://" . $host . $requestUri;
$indexPosition = strpos($currentUrl, 'CarpetaPerfil.php');
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
    
<body data-Nombre_Usuario="<?php echo htmlspecialchars($Nombre_Usuario); ?>" data-url-base="<?php echo htmlspecialchars($urlVariable); ?>">

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
                <button type="button" class="btn btn-outline-warning bg-none" id="btn-ReportarPerfil" data-bs-toggle="modal" data-bs-target="#modalReportarPublicacion">
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

Dios te ayude hermano

-->
<hr class="mt-0">

    <div class="container-fluid row" id="IDContenedorPublicacionesPropias">

    </div>


    <br>
    <br>
<!---
        <div class="container-fluid row ">
            <div class="col-1 "></div>
    
            <div class=" col-10 p-0">
                <div class="card" >
                    <div class=" DivEncabezadoPublicacion ">
                        <img class="d-inline " alt="Texto si no ve imagen" src="../images/bondiola_lp.jpg"width="25" height="25">
                        <p class="d-inline" id="IDNombreCompletoDeUsuarioEnPublicacion">Nombre & Apellido de Usuario</p>
                        <p class="d-inline text-secondary" id="IDNombreDeUsuarioEnPublicacion">@NombreDeUsuario</p>
                    </div>
    
                    <div id="carouselExampleIndicators1" class="carousel slide ">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            
                        </div>
                        <div class="carousel-inner slide"> 
                            <div class="carousel-item active slide" data-background-image="../images/nioquis_lp.jpg">
                                <img src="../images/nioquis_lp.jpg"  class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item slide" data-background-image="../images/bondiola_lp.jpg">
                                <img src="../images/bondiola_lp.jpg" class="d-block w-100 " alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
    
                    <div class="card-body ">
                        <h5 class="card-title ">Titulo Publicacion</h5>
                        <p class="card-text">Descripcion...................</p>
                        <p class="card-text">Descripcion...................</p>
                        <p class="card-text">Descripcion...................</p>
                        <p class="card-text">Descripcion...................</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p class="card-text EstilosCategorias">Categoria</p>
                            <p class="card-text EstilosEstiquetas">Estiqueta1</p>
                            <p class="card-text EstilosEstiquetas">Estiqueta2</p>
                            <p class="card-text EstilosEstiquetas">Estiqueta3</p>
                            <p class="card-text EstilosEstiquetas">Estiqueta4</p>
                            <p class="card-text EstilosEstiquetas">Estiqueta5</p>
                        </li>
                        <li class="list-group-item">
                            <ul>
                                <li><p class="card-text">Ingrediente</p></li>
                                <li><p class="card-text">Ingrediente</p></li>
                                <li><p class="card-text">Ingrediente</p></li>
                                <li><p class="card-text">Ingrediente</p></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="valoracion">
                                <p>Valoración: ★★★★☆ (32 valoraciones)</p>
                            </div>
                            

                            <div class="comentarios">
                                <p>10 comentarios</p>
                            </div>
                        </div>
                        

                        <div class="d-flex justify-content-end mt-2">

                            <button class="btn btn-outline-primary me-2" type="button">
                                Compartir
                            </button>

                            <button class="btn btn btn-outline-dark" type="button">
                                Guardar en Favoritos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-1 "></div>
    
        </div>-->

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
