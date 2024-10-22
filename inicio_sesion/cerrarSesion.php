<?php
session_start();
session_unset();
session_destroy(); // Cierra la sesion, usando la funcion para destruirla
header('Location: ../index/index.php'); // Redirige a la pag de inicio 
exit(); //salgo
?>