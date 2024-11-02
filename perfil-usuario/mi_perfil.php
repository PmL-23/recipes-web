<?php
session_start();

include '../includes/conec_db.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../html_inicio_sesion/iniciarSesion.php"); 
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
    
    <script src="cambiar_imagen.js" defer></script>
    <script src="boton_publicacion.js" defer></script>
    <script src="editar_descripcion.js" defer></script>
    <script src="boton_username.js" defer></script>
    <script src="editar_contraseña.js" defer></script>
    <?php include '../includes/head.php'; ?>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center position-relative">
                    <img src="<?= htmlspecialchars($usuario['foto_usuario']) ?>" class="card-img-top" alt="Foto de Perfil" id="imagenPerfil">
                    <?php echo '<button class="notificaciones btn btn-outline-light boton-menu" id="btnCambiarImagen" aria-label="Cambiar imagen" style="display: none;">Cambiar imagen</button>'; ?>
                <div class="card-body">
                    <h1 class="card-title" id="usernameText">@<?php echo htmlspecialchars($usuario['username']); ?>
                    <button id="editUsernameBtn" class="btn btn-sm btn-primary" onclick="editarUsername()"><i class="bi bi-pencil-square"></i></button>
                    <button id="editContraseñaBtn" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditContraseña"><i class="bi bi-lock-fill"></i></button>
                    </h1>
                    <textarea id="usernameInput" rows="3" class="form-control" style="display: none;"></textarea>
                    <div id="usernameButtons" style="display: none;">
                        <button class="btn btn-success mt-2" onclick="guardarUsername(<?= $usuario['id_usuario']; ?>)">Guardar</button>
                        <button class="btn btn-secondary mt-2" onclick="cancelarEdicion()">Cancelar</button>
                    </div>
                    <div class="form-text text-danger" id="error-username"></div>
                    <h3 class="card-title">Nombre: <?php echo htmlspecialchars($usuario['nom_completo']); ?></h3>
                    <p class="card-text"> Descripción: <span id="descripcionText"><?php echo htmlspecialchars($usuario['descripcion']); ?></span>
                        <button id="editDescripcionBtn" class="btn btn-sm btn-primary" onclick="editarDescripcion()"><i class="bi bi-pencil-square"></i></button>
                        <textarea id="descripcionInput" rows="3" class="form-control"></textarea>
                        <div id="descripcionButtons">
                            <button class="btn btn-success mt-2" onclick="guardarDescripcion(<?= $usuario['id_usuario']; ?>)">Guardar</button>
                            <button class="btn btn-secondary mt-2" onclick="cancelarEdit()">Cancelar</button>
                        </div>
                    </p>
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

            <div class="col-md-8">
                <h2>Publicaciones de <?php echo htmlspecialchars($usuario['nom_completo']); ?></h2>
                <ul class="list-group">
                    <?php foreach ($publicaciones as $publicacion): ?>
                        <li class="list-group-item position-relative">
                            <h5><?php echo htmlspecialchars($publicacion['titulo']); ?></h5>
                            <p><?php echo htmlspecialchars($publicacion['descripcion']); ?></p>
                            <small>Publicado el: <?php echo date('d-m-Y', strtotime($publicacion['fecha_publicacion'])); ?></small>
                            <div class="acciones position-absolute" id="boton-opc">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $publicacion['id_publicacion']; ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-caret-down-fill"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $publicacion['id_publicacion']; ?>">
                                    <li><a class="dropdown-item" href="#" onclick="editarPublicacion(<?php echo $publicacion['id_publicacion']; ?>)">Editar publicación</a></li>
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
                            <div class="mt-3"> <!--Botones de guardar/compartir-->
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
        <div class="modal-dialog">
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
    <!-- Modal Cambiar Contraseña -->
    <div class="modal fade" id="modalEditContraseña" tabindex="-1" aria-labelledby="modalEditContraseñaLabel"data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="modalEditContraseñaLabel">Cambiar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container-fluid">
                    <form id="FormCambiarContraseña" class="row" data-url-base="<?php echo htmlspecialchars($urlVariable); ?>" data-IDUsuario="<?php echo $id_usuario ?>">
                        <div class="mb-3 col-12">
                            <label for="ContraseñaActual" class="form-label">Contraseña Actual</label>
                            <input type="text" class="form-control" id="ContraseñaActual" name="ContraseñaActual">
                            <small class="text-danger" id="ContraseñaActualError"></small>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="NuevaContraseña" class="form-label">Nueva Contraseña</label>
                            <input type="text" class="form-control" id="NuevaContraseña" name="NuevaContraseña">
                            <small class="text-danger" id="NuevaContraseñaError"></small>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="ConfirmaciónNuevaContraseña" class="form-label">Confirmacion de Nueva
                                Contraseña</label>
                            <input type="text" class="form-control" id="ConfirmaciónNuevaContraseña" name="ConfirmaciónNuevaContraseña">
                            <small class="text-danger" id="ConfirmaciónNuevaContraseñaError"></small>
                        </div>
                        <!--- footer--->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-target="#modalPerfil"
                                data-bs-toggle="modal">Volver</button>
                            <button type="submit" class="btn btn-danger" id="IDBotonEliminarCuenta">Confirmar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

    <?php include '../includes/footer.php'; ?>
</body>
</html>


