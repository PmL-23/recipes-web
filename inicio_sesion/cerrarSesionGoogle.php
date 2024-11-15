<?php
session_start();
require_once '../vendor/autoload.php'; // Asegúrate de cargar la biblioteca de Google aquí

if (isset($_SESSION['access_token'])) {
    $client = new Google_Client();
    $client->revokeToken($_SESSION['access_token']); // Revocar el token en Google
    unset($_SESSION['access_token']); // Limpiar token de la sesión
}

// Limpiar otros datos de sesión relacionados
unset($_SESSION['google_id']);
unset($_SESSION['google_email']);
unset($_SESSION['nom_completo']);
unset($_SESSION['foto_usuario']);

// Redirigir si lo deseas
header("Location: ../index/index.php");
exit();
?>