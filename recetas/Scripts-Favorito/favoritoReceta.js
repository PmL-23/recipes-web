document.addEventListener("DOMContentLoaded", function (){

    document.getElementById("btn-favorito").addEventListener("click", function(){

        try {

            const IDReceta = document.getElementById("id_publicacion_receta").value;

            const btnFavorito = document.getElementById("btn-favorito");

            fetch('../recetas/Scripts-Favorito/postFavoritoReceta.php', {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_publicacion_receta=${IDReceta}`
            })
            .then(res => res.json())
            .then(data => {

                if ( (data.success == true) && (data.accion == "delete") ) {

                    console.log("Receta eliminada de favoritos..");
                    btnFavorito.classList.remove("active");

                    document.getElementById("toast-success-msg").textContent = "Receta eliminada de favoritos..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();

                } else if( (data.success == true) && (data.accion == "insert") ){

                    console.log("Receta agregada a favoritos..");
                    btnFavorito.classList.add("active");

                    document.getElementById("toast-success-msg").textContent = "Receta agregada a favoritos..";

                    var toastElement = document.getElementById('formToastSuccess');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();

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
        
    });

});