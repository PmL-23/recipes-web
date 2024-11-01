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

                console.log("Publicación reportada con éxito..");

            }else{
                
                console.log(data);
            }

        });
    });

});