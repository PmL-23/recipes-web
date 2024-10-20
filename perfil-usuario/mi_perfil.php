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

    <?php include '../includes/head.php'; ?>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center position-relative">
                    <img src="<?= htmlspecialchars($usuario['foto_usuario']) ?>" class="card-img-top" alt="Foto de Perfil" id="imagenPerfil">
                    <button class="notificaciones btn btn-outline-light boton-menu" id="btnCambiarImagen" aria-label="Cambiar imagen" style="display: none;">Cambiar imagen</button>
                    <div class="card-body">
                        <h5 class="card-title">Nombre: <?php echo htmlspecialchars($usuario['nom_completo']); ?></h5>
                        <p class="card-text">Descripción: <?php echo htmlspecialchars($usuario['descripcion']); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h4>Publicaciones de <?php echo htmlspecialchars($usuario['nom_completo']); ?></h4>
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

    <?php include '../includes/footer.php'; ?>

</body>
</html>


