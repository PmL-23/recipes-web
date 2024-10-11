<?php 

session_start();

$loginOK = null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    include '../includes/conec_db.php';
    $msg = '';
    $varClass = '';
    $queryCheckLogin = "SELECT usuario.*, rol.nombre as nombre_rol FROM usuario JOIN rol ON rol.id_rol = usuario.id_rol WHERE email = :email";
    $resultadoQuery = $conn ->prepare($queryCheckLogin);
    $resultadoQuery->bindParam(':email', $_POST['email']);
    $resultadoQuery->execute();
    $row = $resultadoQuery->fetch(PDO::FETCH_ASSOC);

    if(($row) && (password_verify($_POST['password'], $row['password'])))
    {
        $_SESSION['nomCompleto'] = $row['nomCompleto'];
        $_SESSION['id'] = $row['id_usuario'];
        $_SESSION['rol'] = $row['nombre_rol'];
        header('Location: ../index/index.php');
        die;
        $loginOK = true;

    }
    else
    {

        $loginOK = false;
        $msg = 'Algo está mal >:/ ';
        $varClass = 'alert-danger';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>

        <!-- <link rel="stylesheet" href="../../css_inicio_sesion/estilo_sesion.css">
        <link rel="stylesheet" href="../../css_inicio_sesion/iniciarSesion.css"> -->
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>

<div class="pt-5"></div>

    <!-- Inicio de Sesion -->
    <section id="formulario2" class="d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-4">
            <h2 class="text-center">Iniciar Sesion</h2>
            <?php
            if ( $loginOK !== null) {
            ?>
                <div class="alert <?= $varClass ?>" role="alert">
                    <?= $msg ?>
                </div>
            <?php
            }
        ?>
            <form name="contacto" method="POST" action="">
                <div class="mb-3">
                    <label for="nicknameLogin" class="form-label">Email:</label>
                    <input  id="email" type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
                        <div class="form-text" id="error-nickname"></div>

                </div>
                <div class="mb-3">
                    <label for="contraseñaLogin" class="form-label">Contraseña:</label>
                    <input  id="password" type="password" class="form-control" name="password" maxlength="20" autocomplete="off"
                        placeholder="Ingrese su contraseña" required>

                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>


<?php include '../includes/footer.php'?>