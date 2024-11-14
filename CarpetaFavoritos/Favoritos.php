<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../inicio_sesion/iniciarSesion.php"); 
    exit();
}
$id_usuario = $_SESSION['id'];

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
    
    <?php include '../includes/head.php'?>
</head>
    
<body data-IDUsuario="<?php echo htmlspecialchars($id_usuario); ?>" data-urlbase="<?php echo htmlspecialchars($urlVariable); ?>">
    
<?php include '../includes/header.php' ?>
<?php include '../includes/conec_db.php' ?>

<div class="p-3">
    <p class="fs-1 d-inline" >Recetas Favoritas</p>
    <p class="d-inline fs-4" id="IDCantidadPublicaciones"></p>
</div>
<hr>
<br>
    <div class="container-fluid row" id="IDContenedorPublicacionesFavoritas">

    </div>

<br>
<br>
<div>
    <?php include '../includes/footer.php'?>  
</div>
</body>
</html>

