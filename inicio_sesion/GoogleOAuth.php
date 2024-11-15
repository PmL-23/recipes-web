<?php

require_once '../vendor/autoload.php'; // Autoload de Composer
require_once '../includes/conec_db.php';
require_once '../config.php';

// Obtener el esquema (http o https)
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

// Obtener el host (dominio)
$host = $_SERVER['HTTP_HOST'];

// Obtener la ruta actual
$requestUri = $_SERVER['REQUEST_URI'];

// Construir la URL completa
$currentUrl = $scheme . "://" . $host . $requestUri;

// Encontrar la posición de 'index.php' en la URL
$indexPosition = strpos($currentUrl, 'index.php');

$urlVariable = '';

// Verificar si 'index.php' está presente y recortar la URL
if ($indexPosition !== false) {
    $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('index.php'));
} else {
    // Si 'index.php' no está en la URL, usar la URL alternativa
    $indexPosition = strpos($currentUrl, 'index/');
    $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('index/'));
}

$googleData = configGoogleOAuth();

// Configurar las credenciales de Google
$clientID = $googleData['googleID'];
$clientSecret = $googleData['googleSecretKey'];

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($urlVariable);
$client->addScope("email");
$client->addScope("profile");

// Manejar el código de autenticación de Google
if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    
    // Obtener información del usuario
    $client->setAccessToken($token);
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    //data from google
    $googleUserID = $userInfo['id'];
    $googleNombreCompleto = $userInfo['name'];
    $googleUserMail = $userInfo['email'];
    $googleUserPicture = $userInfo['picture'];

    // Verificar si el usuario ya está registrado en la base de datos

    $sql = "SELECT id_usuario, username, email, nom_completo, google_id, google_email FROM usuarios WHERE (google_id = :googleID AND google_email = :googleEMAIL) OR email = :googleEMAIL";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':googleID', $googleUserID, PDO::PARAM_STR);
    $stmt->bindParam(':googleEMAIL', $googleUserMail, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        
        if ($resultado['google_id'] && $resultado['google_email']) {

            //Usuario ya está registrado con Google OAuth..

            $_SESSION['id'] = $resultado['id_usuario'];
            $_SESSION['nomUsuario'] = $resultado['username'];
            $_SESSION['nomCompleto'] = $userInfo['name'];
            
            header('Location: ../index/index.php'); //Redirige al index
            exit;

        }else if($resultado['email']){

            //Gmail ya en uso por una cuenta registrada mediante método de inicio de sesión habitual..

            header('Location: ../inicio_sesion/cuentaGmailExistente.php'); //Redirige al index
            exit;
        }

    }else{

        // Si el usuario no existe, redirigir a la página de completar datos para registro

        $_SESSION['google_id'] = $googleUserID;
        $_SESSION['google_email'] = $googleUserMail;
        $_SESSION['nom_completo'] = $googleNombreCompleto;
        $_SESSION['foto_usuario'] = $googleUserPicture;
        
        header("Location: ../inicio_sesion/completarDatosRegistroGoogle.php");
        exit();
    }
    
}

// Establecer el token de sesión si ya existe
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $client->setPrompt('select_account'); // Forzar la selección de cuenta
    $authUrl = $client->createAuthUrl(); // URL para iniciar sesión con Google
}

?>