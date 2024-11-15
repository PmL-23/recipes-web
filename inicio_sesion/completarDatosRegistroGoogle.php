<?php
session_start();
require_once('../includes/conec_db.php');

$paisQuery = "SELECT * FROM paises ORDER BY paises.id_pais ASC";
$queryResultsPais = $conn->prepare($paisQuery);
$queryResultsPais->execute(); 

if (!isset($_SESSION['google_id'])) {
    // Si no se inició sesión con Google, redirige al inicio
    header("Location: ../index/index.php");
    exit();
}

// Verifica que el token esté en la sesión, si no redirige al inicio
if (!isset($_SESSION['access_token'])) {
    header("Location: ../index/index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Completa tu registro</title>
    <?php include '../includes/head.php' ?>
    <script src="./registroConGoogle.js" defer></script>
</head>
<body>

    <header class="header">

        <nav class="navegacion-principal nav">
            <div class="container-fluid d-flex justify-content-between align-items-center">

                <div class="m-0 container d-flex flex-row align-items-center">
                    <a class="navbar-brand" href="../index/index.php"><img class="logo" src="../images/logo.png" alt="logo"></a>
                    <h2 class="ms-2 text-white">Completa tu registro</h2>
                </div>

                <ul class="flex-nowrap w-100 nav justify-content-end"> 

                    <li class="nav-item">
                        <a class="boton1" href="../index/index.php">
                            <i class="bi bi-house-door"></i>
                            <span class="texto-icon">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="boton1 buscador-header" href="../buscador/buscador.php">
                            <i class="bi bi-search"></i>
                            <span class="texto-icon">Buscar</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="boton1 dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-compass"></i>
                            <span class="texto-icon">Explorar</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Países</a></li>
                            <li><a class="dropdown-item" href="../categorias/categorias.php">Categorías</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </nav>

    </header>

    <div class="container w-75 mt-5 d-flex flex-column align-items-center">

        <h2 class="mb-5">Termina de crear tu cuenta completando los siguientes datos:</h2>

        <form id="formulario" class="w-50 d-flex flex-column" action="" method="POST">
            <label class="form-label mt-3" for="username">Nombre de usuario:</label>
            <input class="form-control" type="text" id="username" name="username" required>
            
            <label class="form-label mt-3" for="fecha_nac">Fecha de nacimiento:</label>
            <input class="form-control" type="date" id="fecha_nac" name="fecha_nac" required>
            
            <label class="form-label mt-3" for="pais">País:</label>
            <select class="select-pais form-select" id="pais" aria-label="Select pais" name="pais" required>
                <option value="" selected>Receta sin país</option>
                    <?php
                        while ($paisRow = $queryResultsPais->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="'.$paisRow['id_pais'].'" >'.$paisRow['nombre'].'</option>';
                        }
                    ?>
            </select>
            
            <button class="btn btn-secondary mt-5 align-self-center" type="submit">Completar registro</button>
        </form>

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

</body>
</html>