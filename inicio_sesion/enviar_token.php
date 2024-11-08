<?php
session_start();
require '../config.php';

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

        // Crea el enlace dinámico de recuperación
        
        $protocolo = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $base = dirname($_SERVER['SCRIPT_NAME']) . '/nueva_contrasena.php';
        $enlaceRecuperacion = "$protocolo://$host$base?token=$token";

        $nombre_cuenta = $usuario['nom_completo'];

        // Obtener el mailer de la configuración
        $mail = configMailer();
        try {
            $mail->setFrom('@gmail.com', ''); // Tu email + nombre
            $mail->addAddress($usuario['email']); 

            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de Contraseña';
            $mail->Body = "Hola $nombre_cuenta, haz clic en el siguiente enlace para recuperar tu contraseña: <a href='$enlaceRecuperacion'>Recuperar Contraseña</a>";

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
