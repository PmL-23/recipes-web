document.addEventListener("DOMContentLoaded", function (){

    document.getElementById("formReportar").addEventListener("submit", function (e){

        e.preventDefault();

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

        // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (indice !== -1) {
            // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
            let urlCortada = urlActual.substring(0, indice + palabraClave.length);

            fetch(urlCortada + "recetas/Scripts-Reportes/postReporteReceta.php", {
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {

                console.log(data);

                if (data.success == true) {

                    console.log("Publicación reportada con éxito..");

                }else{
                    
                    console.log(data);
                }

            });
        } else {
            console.log("La palabra 'recipes-web/' no se encontró en la URL.");
        }
    });

});