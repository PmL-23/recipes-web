<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../inicio_sesion/iniciarSesion.php");
    exit();
}

$id_usuario = $_SESSION['id'];

require_once('../includes/permisos.php');

    $permisoVerRecetarFavoritas;
    if (Permisos::tienePermiso('Ver Recetas Favoritas', $id_usuario)) {
        $permisoVerRecetarFavoritas = true;
    }
    else{
        $permisoVerRecetarFavoritas = false;
        header("Location: ../inicio_sesion/iniciarSesion.php"); 
    }

    $permisoGuardarReceta;
    if (Permisos::tienePermiso('Guardar Receta', $id_usuario)) {
        $permisoGuardarReceta = true;
    }
    else{
        $permisoGuardarReceta = false;
    }




//seccion en la que obtenemos la url actual.
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];
$currentUrl = $scheme . "://" . $host . $requestUri;
$indexPosition = strpos($currentUrl, 'CarpetaFavoritos');
$urlVariable = '';

if ($indexPosition !== false) {
    $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('CarpetaFavoritos'));
} else {

    $indexPosition = strpos($currentUrl, 'CarpetaFavoritos/');
    if ($indexPosition !== false) {
        $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('CarpetaFavoritos/'));
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
    <link rel="stylesheet" href="./EstilosFavoritos.css">
    <script src="./JSFavoritos.js" defer></script>

    <?php include '../includes/head.php' ?>
</head>

<body data-IDUsuario="<?php echo htmlspecialchars($id_usuario); ?>" data-urlbase="<?php echo htmlspecialchars($urlVariable); ?> " class="d-flex flex-column min-vh-100"
data-Permiso_GuardarReceta="<?php echo $permisoGuardarReceta; ?>">

    <?php include '../includes/header.php' ?>
    <?php include '../includes/conec_db.php' ?>
    <main class="flex-grow-1">
        <div class="p-3">
            <p class="fs-1 d-inline">Recetas Favoritas</p>
            <p class="d-inline fs-4" id="IDCantidadPublicaciones"></p>
        </div>
        <hr>

        <div class="container-fluid row" id="IDContenedorPublicacionesFavoritas">

        </div>
    </main>


    <div>
        <?php include '../includes/footer.php' ?>
    </div>
</body>

</html>