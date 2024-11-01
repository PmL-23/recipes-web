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
    <h1>COMPLETE EL SIGUIENTE FORMULARIO</h1>
    <BR>
    <form action="enviar_token.php" method="POST">
        <label for="email">Ingresa tu correo electrónico:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Recuperar Contraseña</button>
    </form>
    <?php include '../includes/footer.php' ?>
</body>
</html>

