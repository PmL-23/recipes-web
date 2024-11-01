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

            }else{
                
                console.log(data);

            }

        });
    });

});