<?php
session_start();
include '../includes/conec_db.php';
if (!isset($_SESSION['id'])) {
    header("Location: ../html_inicio_sesion/iniciarSesion.php"); // Redirigir a login si no está logueado
    exit();
}
$id_usuario = $_SESSION['id'];

try {
    $query = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario"; // Usa el nombre del parámetro
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); // Enlazar el parámetro correctamente
    $stmt->execute();
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el resultado como un array asociativo
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); // Manejo de errores
}

try {
    $query1 = "SELECT * FROM publicaciones_recetas where id_usuario_autor = :id_usuario_autor";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bindParam("id_usuario_autor", $id_usuario, PDO::PARAM_INT);
    $stmt1->execute();

    $publicaciones = $stmt1->fetchAll(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <?php
    include '../includes/head.php';
    ?>
</head>
<body>
    <?php
    include '../includes/header.php';
    ?>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <img src="<?= $usuario['foto_usuario'] ?>" class="card-img-top" alt="Foto de Perfil">
                <div class="card-body">
                    <h5 class="card-title">Nombre: <?php echo $usuario['nom_completo']; ?></h5>
                    <p class="card-text">Descripción: <?php echo $usuario['descripcion']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h4>Publicaciones de <?php echo $usuario['nom_completo']; ?></h4>
            <ul class="list-group">
                <?php foreach ($publicaciones as $publicacion): ?>
                    <li class="list-group-item">
                        <h5><?php echo $publicacion['titulo']; ?></h5>
                        <p><?php echo $publicacion['descripcion']; ?></p>
                        <small>Publicado el: <?php echo date('d-m-Y', strtotime($publicacion['fecha_publicacion'])); ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>