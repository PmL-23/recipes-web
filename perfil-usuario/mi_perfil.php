<?php
session_start();

include '../includes/conec_db.php';
require_once '../includes/permisos.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../inicio_sesion/iniciarSesion.php"); 
    exit();
}
$id_usuario = $_SESSION['id'];

try {
    $query = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario"; 
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); 
    $stmt->execute();
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {

    $query1 = "
        SELECT publicaciones_recetas.*, imagenes.ruta_imagen
        FROM publicaciones_recetas
        LEFT JOIN imagenes ON publicaciones_recetas.id_publicacion = imagenes.id_publicacion
        WHERE publicaciones_recetas.id_usuario_autor = :id_usuario_autor
    ";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bindParam(":id_usuario_autor", $id_usuario, PDO::PARAM_INT);
    $stmt1->execute();

    $publicaciones = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $resultado = [];
    foreach ($publicaciones as $publicacion) {
        $id_publicacion = $publicacion['id_publicacion'];


        if (!isset($resultado[$id_publicacion])) {
            $resultado[$id_publicacion] = $publicacion;
            $resultado[$id_publicacion]['imagenes'] = [];
        }
        if ($publicacion['ruta_imagen']) {
            $resultado[$id_publicacion]['imagenes'][] = $publicacion['ruta_imagen'];
        }
    }

    $publicaciones = array_values($resultado);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); 
}

try {
    $query2 = "
        SELECT usuarios.id_usuario, usuarios.nom_completo, usuarios.foto_usuario 
        FROM usuarios_seguidos
        JOIN usuarios ON usuarios_seguidos.id_seguidor = usuarios.id_usuario
        WHERE usuarios_seguidos.id_seguido = :id_usuario
    ";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    $stmt2->execute();

    $seguidores = $stmt2->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); 
}

//permisos

$permisoVerNotificaciones = false;
$permisoCambiarImagen = false;
$permisoBorrarCuenta = false;
$permisoEditarNombre = false;
$permisoEditarDescripcion = false;
$permisoCambiarContraseña = false;

if (Permisos::tienePermiso('Ver Notificaciones', $id_usuario)) {
    $permisoVerNotificaciones = true;
}
else{
    $permisoVerNotificaciones  = false;
}
if(Permisos::tienePermiso('Cambiar Imagen de Perfil', $id_usuario)) {
    $permisoCambiarImagen = true;
}
else{
    $permisoCambiarImagen = false;

}
if (Permisos::tienePermiso('Borrar Cuenta', $id_usuario)) {
    $permisoBorrarCuenta = true;
}
else{
    $permisoBorrarCuenta = false;
}
if (Permisos::tienePermiso('Editar Nombre de Usuario', $id_usuario)) {
    $permisoEditarNombre = true;
}
else{
    $permisoEditarNombre = false;
}
if (Permisos::tienePermiso('Editar Descripción', $id_usuario)) {
    $permisoEditarDescripcion = true;
}
else{
    $permisoEditarDescripcion = false;
}
if (Permisos::tienePermiso('Cambiar Contraseña', $id_usuario)) {
    $permisoCambiarContraseña = true;
}
else{
    $permisoCambiarContraseña = false;
}



//seccion en la que obtenemos la url actual.
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";      
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];
$currentUrl = $scheme . "://" . $host . $requestUri;
$indexPosition = strpos($currentUrl, 'perfil-usuario');
$urlVariable = '';

if ($indexPosition !== false) {
    $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('perfil-usuario'));
} else {

    $indexPosition = strpos($currentUrl, 'perfil-usuario/');
    if ($indexPosition !== false) {
        $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('perfil-usuario/'));
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
    <title>Perfil</title>
    <link rel="stylesheet" href="imagen_perfil.css">
    <link rel="stylesheet" href="boton_publicacion.css">
    <link rel="stylesheet" href="CambiarContraseña.css">
    
    <script src="cambiar_imagen.js" defer></script>
    <script src="boton_publicacionn.js" defer></script>
    <script src="editar_descripcion.js" defer></script>
    <script src="boton_username.js" defer></script>
    <script src="editar_contraseña.js" defer></script>
    <script src="borrar_cuenta.js" defer></script>
    <?php include '../includes/head.php'; ?>
</head>
<body data-url-base="<?php echo htmlspecialchars($urlVariable); ?>">
    <?php include '../includes/header.php'; ?>
    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card text-center position-relative">
                    <div class="card-img-wrapper position-relative">
                        <img src="<?= htmlspecialchars($usuario['foto_usuario']) ?>" class="card-img-top" alt="Foto de Perfil" id="imagenPerfil"><br>
                        <small class="text-danger" id="imagenError"></small>
                        <?php if(Permisos::tienePermiso('Cambiar Imagen de Perfil', $id_usuario)) { ?>
                        <button class="notificaciones btn btn-outline-light boton-menu" id="btnCambiarImagen" aria-label="Cambiar imagen">Cambiar imagen</button>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title" id="usernameText">@<?php echo htmlspecialchars($usuario['username']); ?>
                            <button id="editUsernameBtn" class="btn btn-sm btn-primary" onclick="editarUsername()"><i class="bi bi-pencil-square"></i></button>
                            <?php if (Permisos::tienePermiso('Cambiar Contraseña', $_SESSION['id'])){ ?>
                                <button id="editContraseñaBtn" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditContraseña"><i class="bi bi-lock-fill"></i></button>
                            <?php } ?>
                        </h1>
                        <textarea id="usernameInput" rows="3" class="form-control"></textarea>
                        <div id="usernameButtons">
                            <button class="btn btn-success mt-2" onclick="guardarUsername(<?= $usuario['id_usuario']; ?>)">Guardar</button>
                            <button class="btn btn-secondary mt-2" onclick="cancelarEdicion()">Cancelar</button><br>
                            <small class="text-danger" id="usernameError"></small>
                        </div>
                        <?php if (Permisos::tienePermiso('Editar nombre de usuario', $id_usuario)) { ?>
                        <h3 class="card-title">Nombre: <?php echo htmlspecialchars($usuario['nom_completo']); ?></h3>
                        <?php } ?>
                        <?php if (Permisos::tienePermiso('Editar nombre de usuario', $id_usuario)) { ?>
                        <p class="card-text"> Descripción: <span id="descripcionText"><?php echo htmlspecialchars($usuario['descripcion']); ?></span>
                            <button id="editDescripcionBtn" class="btn btn-sm btn-primary" onclick="editarDescripcion()"><i class="bi bi-pencil-square"></i></button>
                            <textarea id="descripcionInput" rows="3" class="form-control"></textarea>
                            <div id="descripcionButtons">
                                <button class="btn btn-success mt-2" onclick="guardarDescripcion(<?= $usuario['id_usuario']; ?>)">Guardar</button>
                                <button class="btn btn-secondary mt-2" onclick="cancelarEdit()">Cancelar</button><br>
                                <small class="text-danger" id="descripcionError"></small>
                            </div>
                        <?php } ?>
                        </p>
                        <?php if (Permisos::tienePermiso('Borrar Cuenta', $id_usuario)) { ?>
                        <button id="borrarCuenta" type="button" class="btn btn-outline-danger">BORRAR CUENTA</button>
                        <?php } ?>
                    </div>
                </div>

                <h5 class="mt-5">Seguidores (<?= count($seguidores); ?>)</h5>
                <div class="seguidores-container">
                    <ul class="list-group">
                        <?php if (!empty($seguidores)): ?>
                            <?php foreach ($seguidores as $seguidor): ?>
                                <li class="list-group-item">
                                    <img src="<?= htmlspecialchars($seguidor['foto_usuario']) ?>" class="rounded-circle" alt="Foto de <?= htmlspecialchars($seguidor['nom_completo']) ?>">
                                    <?= htmlspecialchars($seguidor['nom_completo']) ?>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-group-item">No tienes seguidores.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <small class="text-danger" id="boton_eliminar"></small>
                <h2>Publicaciones de <?php echo htmlspecialchars($usuario['nom_completo']); ?></h2>
                <ul class="list-group">
                    <?php foreach ($publicaciones as $publicacion): ?>
                        <li class="list-group-item position-relative">
                        <h5><a href="../recetas/receta-plantilla.php?id=<?php echo htmlspecialchars($publicacion['id_publicacion']); ?>" class="titulo-publicacion"><?php echo htmlspecialchars($publicacion['titulo']); ?></a></h5>
                            <p><?php echo htmlspecialchars($publicacion['descripcion']); ?></p>
                            <small>Publicado el: <?php echo date('d-m-Y', strtotime($publicacion['fecha_publicacion'])); ?></small>
                            <div class="acciones position-absolute" id="boton-opc">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $publicacion['id_publicacion']; ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-caret-down-fill"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $publicacion['id_publicacion']; ?>">
                                    <li><a class="dropdown-item" href="../recetas/editar-receta.php?id=<?php echo htmlspecialchars($publicacion['id_publicacion']); ?>">Editar publicación</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="eliminarPublicacion(<?php echo $publicacion['id_publicacion']; ?>)">Eliminar publicación</a></li>
                                </ul>
                            </div>

                            <div id="carousel<?php echo $publicacion['id_publicacion']; ?>" class="carousel slide mt-3" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach ($publicacion['imagenes'] as $index => $imagen): ?>
                                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                            <img src="<?php echo htmlspecialchars($imagen); ?>" class="d-block w-100" alt="Imagen de <?php echo htmlspecialchars($publicacion['titulo']); ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $publicacion['id_publicacion']; ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $publicacion['id_publicacion']; ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                            <div class="mt-3"> 
                                <button class="btn btn-success" onclick="guardarReceta(<?php echo $publicacion['id_publicacion']; ?>)"><i class="bi bi-save"></i></button>
                                <button class="btn btn-info" onclick="compartirReceta(<?php echo $publicacion['id_publicacion']; ?>)"><i class="bi bi-share-fill"></i></button>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<!-- Modal para editar la foto perfil -->
<div class="modal fade" id="modalCambiarImagen" tabindex="-1" aria-labelledby="modalCambiarImagenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCambiarImagenLabel">Cambiar Imagen de Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCambiarImagen" action="cambiar_imagen.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                    <div class="mb-3">
                        <label for="inputImagen" class="form-label">Seleccionar nueva imagen</label>
                        <input type="file" class="form-control" id="inputImagen" name="imagen" accept="image/*">
                        <div id="nombreImagen" class="mt-2"></div>
                    </div>
                    <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (Permisos::tienePermiso('Cambiar Contraseña', $_SESSION['id'])){ ?>
<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="modalEditContraseña" tabindex="-1" aria-labelledby="modalEditContraseñaLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditContraseñaLabel">Cambiar Contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container-fluid">
                <form id="FormCambiarContraseña" class="row" data-IDUsuario="<?php echo $id_usuario ?>">
                <div class="mb-3 col-12 position-relative">
                <label for="ContraseñaActual" class="form-label">Contraseña Actual</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="ContraseñaActual" name="ContraseñaActual">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('ContraseñaActual', this)">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                    <small class="text-danger" id="ContraseñaActualError"></small>
                </div>

                <div class="mb-3 col-lg-6 col-12 position-relative">
                    <label for="NuevaContraseña" class="form-label">Nueva Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="NuevaContraseña" name="NuevaContraseña">
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('NuevaContraseña', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <small class="text-danger" id="NuevaContraseñaError"></small>
                </div>

                <div class="mb-3 col-lg-6 col-12 position-relative">
                    <label for="ConfirmaciónNuevaContraseña" class="form-label">Confirmación de Nueva Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="ConfirmaciónNuevaContraseña" name="ConfirmaciónNuevaContraseña">
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('ConfirmaciónNuevaContraseña', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <small class="text-danger" id="ConfirmaciónNuevaContraseñaError"></small>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                        <button type="submit" class="btn btn-danger" id="IDBotonEliminarCuenta">Confirmar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal para mostrar resultados -->
<div class="modal fade custom-modal-position" id="resultModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modalContent">
            <div class="modal-body">
                <span id="modalIcon" class="me-2"></span>
                <span id="modalMessage"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal para confirmar borrar cuenta -->
<div class="modal fade" id="confirmBorrarModal" tabindex="-1" aria-labelledby="confirmBorrarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmBorrarModalLabel">Confirmar Borrado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>¿Estás seguro de que deseas borrar tu cuenta? Esta acción es irreversible.</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmarBorrarBtn">Sí, estoy seguro</button>
            </div>
        </div>
    </div>
</div>




<?php include '../includes/footer.php'; ?>
</body>
</html>


