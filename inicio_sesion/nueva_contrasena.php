<?php
session_start();
include '../includes/conec_db.php';

if(!isset($_GET['token'])) {
    echo 'ERROR: Falta el token';
    die();   
}

$token = $_GET['token'];

// Verificar si el token es válido
$query = "SELECT * FROM usuarios WHERE token = :token";
$stm = $conn->prepare($query);
$stm->bindParam(':token', $token, PDO::PARAM_STR);
$stm->execute();
$resultadoQuery = $stm->fetch(PDO::FETCH_ASSOC);

if(!$resultadoQuery) {
    echo 'ERROR: Token inexistente';
    die();
}

// Verificar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newpass1 = $_POST['newpass1'];
    $newpass2 = $_POST['newpass2'];
    //verifica que las contraseñas coincidan
    if ($newpass1 !== $newpass2) {
        echo 'Las contraseñas no coinciden. Inténtalo de nuevo.';
    } else {

        // Hashear la nueva contraseña
        $hashedPassword = password_hash($newpass1, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE usuarios SET password = :password, token = NULL WHERE token = :token";
        $updateStm = $conn->prepare($updateQuery);
        $updateStm->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $updateStm->bindParam(':token', $token, PDO::PARAM_STR);
        
        if ($updateStm->execute()) {
            header('Location: iniciarSesion.php');
            exit();
        } else {
            echo 'ERROR: No se pudo actualizar la contraseña.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <?php include '../includes/head.php'?>
    
</head>
<body>
    <?php include '../includes/header.php' ?>
    <div class="container mt-5">
        <form action="" method="POST">
            <div class="form-group">
                <label for="newpass1">Contraseña nueva:</label>
                <input type="password" class="form-control" id="newpass1" name="newpass1" placeholder="Escriba su nueva contraseña" required>
            </div>
            <div class="form-group">
                <label for="newpass2">Repetir contraseña nueva:</label>
                <input type="password" class="form-control" name="newpass2" id="newpass2" placeholder="Repita su nueva contraseña" required>
            </div>
            <button type="submit" class="btn btn-success btn-block" id="botonConfirmar">CONFIRMAR</button>
        </form>
    </div>
    <?php include '../includes/footer.php'?>
</body>
</html>

