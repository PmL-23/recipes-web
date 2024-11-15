<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gmail en uso</title>
    <?php include '../includes/head.php' ?>
    <script src="./registroConGoogle.js" defer></script>
</head>
<body>
    <?php include '../includes/header.php' ?>

    <div class="container w-75 mt-5 d-flex flex-column align-items-center">

        <h2 class="mb-5">Ya existe una cuenta registrada con este correo electrónico mediante el método habitual de inicio de sesión. Por favor, inicie sesión utilizando su contraseña o recupérela si la ha olvidado.</h2>
            
        <a class="w-100 text-center" href="../inicio_sesion/cerrarSesionGoogle.php"><button class="btn btn-secondary w-50 mt-5 align-self-center" type="button" >Volver al inicio</button></a>

    </div>

</body>
</html>