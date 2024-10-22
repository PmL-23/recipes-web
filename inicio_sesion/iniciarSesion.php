<?php 
session_start();
include '../includes/conec_db.php';

$formValid = NULL;
$msg="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formValid = true;
    $email = $_POST['email'] ?? NULL;
    $password = $_POST['password'] ?? NULL;



    if ((is_null($email) || empty($email)) || (is_null($password) || empty($password))) {
        $formValid = false;
        $msg = 'Campos incompletos.';
        $varClass = 'alert-danger';
    }

    if ($formValid) {
        $queryCheckLogin = "SELECT usuarios.*, roles.nombre as nombre_rol FROM usuarios JOIN roles ON roles.id_rol = usuarios.id_rol WHERE email = :email or username = :email";
        $resultadoQuery = $conn->prepare($queryCheckLogin);
        $resultadoQuery->bindParam(':email', $email);
        $resultadoQuery->execute();
        $row = $resultadoQuery->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['nomCompleto'] = $row['nom_completo'];
                $_SESSION['id'] = $row['id_usuario'];
                $_SESSION['rol'] = $row['nombre_rol'];
                header('Location: ../index/index.php');
                die; 
            } else { //contraseña no valida
                $formValid = false;
                $msg = 'Acceso inválido. Email, usuario o contraseña no válidos'; //no dar info precisa
                $varClass = 'alert-danger';
            }
        } else { //usuario no registrado
            $formValid = false;
            $msg = 'Acceso inválido. Email, usuario o contraseña no válidos';
            $varClass = 'alert-danger';
        }
    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- <link rel="stylesheet" href="../../css_inicio_sesion/estilo_sesion.css">
        <link rel="stylesheet" href="../../css_inicio_sesion/iniciarSesion.css"> -->
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

<section id="formulario2" class="d-flex justify-content-center pt-5">
    <div class="container col-lg-6 col-md-8 min-vh-100 mx-md-5">
        <h1 class="text-center mb-5">Iniciar Sesión</h1>

        <?php if ($formValid === false) { ?>
            <div class="alert <?= $varClass ?>" id="div-alert">
                <?= $msg ?>
            </div>
        <?php } ?>
        
        <form name="contacto" method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label h6">Email o usuario <span class="text-danger">*</span></label>
                <input id="email" type="text" class="form-control" name="email" placeholder="Ingrese su email o nombre de usuario" value="<?php if (isset($email)) echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label h6">Contraseña <span class="text-danger">*</span></label>
                <input id="password" type="password" class="form-control" name="password" maxlength="20" autocomplete="off" placeholder="Ingrese su contraseña" value="<?php if (isset($password)) echo $password?>">
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
