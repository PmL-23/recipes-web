<?php
session_start();
$loginOK = null; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <?php include '../includes/head.php' ?>
</head>

<body>
    <?php include '../includes/header.php' ?>
    <div class="container mt-5">
        <h1 class="mb-4">COMPLETE EL SIGUIENTE FORMULARIO</h1>
        <form action="enviar_token.php" method="POST">
            <div class="form-group">
                <label for="email">Ingresa tu correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Coloque su email acá" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Recuperar Contraseña</button>
        </form>
    </div>
    <?php include '../includes/footer.php' ?>
</body>
</html>

