document.addEventListener("DOMContentLoaded", function (){

    document.getElementById("formReportarPublicacion").addEventListener("submit", function (e){

        e.preventDefault();

        fetch('../recetas/Scripts-Reportes/postReporteReceta.php', {
            method: "POST",
            body: new FormData(e.target)
        })
        .then(res => res.json())
        .then(data => {

            /* console.log(data); */

            if (data.success == true) {

                e.target.reset();
                
                console.log("Publicación reportada con éxito..");
                document.getElementById("toast-success-msg").textContent = "Publicación reportada con éxito..";

                var toastElement = document.getElementById('formToastSuccess');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();

            }else{
                
                /* console.log(data); */
                // Mostrar el toast de error
                var toastElement = document.getElementById('formToastError');
                document.getElementById("toast-error-msg").textContent = data.message;
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }

        });
    });

});