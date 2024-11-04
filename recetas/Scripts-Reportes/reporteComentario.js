document.addEventListener("DOMContentLoaded", function (){

    document.getElementById("formReportarComentario").addEventListener("submit", function (e){

        e.preventDefault();

        fetch('../recetas/Scripts-Reportes/postReporteComentario.php', {
            method: "POST",
            body: new FormData(e.target)
        })
        .then(res => res.json())
        .then(data => {

            /* console.log(data); */

            if (data.success == true) {

                console.log("Comentario reportado con éxito..");
                e.target.reset();

                document.getElementById("toast-success-msg").textContent = "Comentario reportado con éxito..";

                var toastElement = document.getElementById('formToastSuccess');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();

            }else{
                
                console.log(data);
                document.getElementById("toast-error-msg").textContent = "Error al reportar comentario..";

                var toastElement = document.getElementById('formToastError');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();

            }

        });
    });

});