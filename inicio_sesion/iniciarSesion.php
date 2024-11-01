<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- <link rel="stylesheet" href="../../css_inicio_sesion/estilo_sesion.css">
        <link rel="stylesheet" href="../../css_inicio_sesion/iniciarSesion.css"> -->
        <?php include '../includes/head.php'?>
        <script src="iniciar_sesion.js" defer></script>
    </head>
    
<body>
<?php include '../includes/header.php'?>

<section id="sesion" class="d-flex justify-content-center pt-5">
    <div class="container col-lg-6 col-md-8 min-vh-100 mx-md-5">
        <h1 class="text-center mb-5">Iniciar Sesión</h1>

        <div class="alert alert-danger d-none" id="cartel-error">
            <ul class="" id="lista-error">
                
            </ul>
        </div>
        
        <form name="frm-sesion" method="POST" action="procesar_sesion.php" id="frm-sesion">
            <div class="mb-3">
                <label for="email" class="form-label h6">Email o usuario <span class="text-danger">*</span></label>
                <input id="email" type="text" class="form-control" name="email" placeholder="Ingrese su email o nombre de usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label h6">Contraseña <span class="text-danger">*</span></label>
                <input id="password" type="password" class="form-control" name="password" maxlength="20" autocomplete="off" placeholder="Ingrese su contraseña">
                <div class="d-flex justify-content-start mb-5 mt-2"> 
                    <small>¿Has olvidado tu contraseña?<a href="../inicio_sesion/recuperar_cuenta.php" class="ms-2 text-decoration-none">Recuperar contraseña</a></small>
                </div>
            </div>
            <div class="">
                <button type="submit" class="boton-principal w-100 mb-3">Enviar</button>
            </div>
        </form>
        <div class="d-flex justify-content-center mt-5">
            <small>¿No estás registrado?<a href="registrarse.php" class="ms-2 text-decoration-none">Crear cuenta</a></small>
        </div>
    </div>
</section>
<?php include '../includes/footer.php'?>
