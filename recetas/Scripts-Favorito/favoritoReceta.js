document.addEventListener("DOMContentLoaded", function (){

    document.getElementById("btn-favorito").addEventListener("click", function(){

        let urlActual = window.location.href;
        let palabraClave = "recipes-web/";

        // Encuentra el índice de la palabra "recipes-web/" en la URL
        let indice = urlActual.indexOf(palabraClave);

        if (indice !== -1) {
            // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
            let urlCortada = urlActual.substring(0, indice + palabraClave.length);

            try {

                const IDReceta = document.getElementById("id_publicacion_receta").value;

                const btnFavorito = document.getElementById("btn-favorito");

                fetch(urlCortada + "recetas/Scripts-Favorito/postFavoritoReceta.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `id_publicacion_receta=${IDReceta}`
                })
                .then(res => res.json())
                .then(data => {

                    if ( (data.success == true) && (data.accion == "delete") ) {

                        console.log("Receta eliminada de favoritos..");
                        btnFavorito.classList.remove("active");

                    } else if( (data.success == true) && (data.accion == "insert") ){

                        console.log("Receta agregada a favoritos..");
                        btnFavorito.classList.add("active");

                    }else{

                        console.log(data.message);

                    }

                })
                .catch(error => {
                    console.error("Error al favear publicación: ", error);
                });

            } catch (error) {
                console.log(error);
            }
        }
    });

});