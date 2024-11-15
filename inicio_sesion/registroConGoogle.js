document.addEventListener("DOMContentLoaded", function (){

    window.addEventListener("beforeunload", function(event) {
        // Enviar una solicitud para limpiar la sesión si el usuario cierra o sale de la página
        navigator.sendBeacon("../inicio_sesion/cerrarSesionGoogle.php");
    });

    document.getElementById("formulario").addEventListener("submit", function (e){

        e.preventDefault();

        fetch('../inicio_sesion/registrarUsuarioGoogle.php', {
            method: "POST",
            body: new FormData(e.target)
        })
        .then(response => response.json())
        .then(data => {

            if (data.success == true) {
                
                //Usuario registrado con éxito, redirige a pantalla principal..
                window.location.href = '../index/index.php';

            }else{
                
                document.getElementById("toast-error-msg").textContent = data.message;

                var toastElement = document.getElementById('formToastError');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });

});
