<?php
session_start();
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../includes/conec_db.php';
    $email = $_POST['email'];
    
    
    $query = "SELECT * FROM usuarios WHERE email = :email";
    $resultadoQuery = $conn->prepare($query);
    $resultadoQuery->bindParam(":email", $email);
    $resultadoQuery->execute();
    $usuario = $resultadoQuery->fetch(PDO::FETCH_ASSOC); 

    // Verifica si el correo existe
    if ($usuario) {
        // Generar un token único para la recuperación
        $token = bin2hex(random_bytes(16));

        // Guardar el token en la base de datos
        $updateQuery = "UPDATE usuarios SET token = :token, token_tiempo = NOW() WHERE id_usuario = :id_usuario";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':token', $token);
        $updateStmt->bindParam(':id_usuario', $usuario['id_usuario']);
        $updateStmt->execute();

        // Crea el enlace de recuperación
        $enlaceRecuperacion = "http://localhost/xampp/proyecto_final/recipes-web/inicio_sesion/nueva_contrasena.php?token=$token";

        $nombre_cuenta = $usuario['nom_completo'];

        // Configuracion de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = '@gmail.com'; 
            $mail->Password = ''; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('@gmail.com', ''); //email + nombre
            $mail->addAddress($usuario['email']); 

            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de Contraseña';
            $mail->Body = "Hola $nombre_cuenta Haz clic en el siguiente enlace para recuperar tu contraseña: <a href='$enlaceRecuperacion'>Recuperar Contraseña</a>";

            // Enviar el correo
            $mail->send();
            echo 'Se ha enviado el correo para recuperar tu contraseña';
        } catch (Exception $e) {
            echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No existe el email';
    }   
}
?>
