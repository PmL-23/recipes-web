document.addEventListener("DOMContentLoaded", function () {
    let facebook = document.getElementById("facebook");
    let twitter = document.getElementById("twitter");
    let instagram = document.getElementById("instagram");
    let link = document.getElementById("link");
    let whatsapp = document.getElementById("whatsapp");
    const idPublicacion = facebook.getAttribute("data-id"); 

    function obtenerEnlaceReceta(idPublicacion) {

        const urlActual = window.location.href;
    
        // tener la parte a modificar
        const indicePlantilla = urlActual.lastIndexOf('/receta-plantilla.php');
    
        // extraigo la parte base del enlace de antes de '/receta-plantilla.php' para solo modificar este ultimo
        const baseURL = indicePlantilla !== -1 ? urlActual.substring(0, indicePlantilla) : urlActual;
    
        // devuelvo la url con la receta
        return `${baseURL}/receta-plantilla.php?id=${idPublicacion}`;
    }

    function compartirReceta(idPublicacion) {
        const enlaceReceta = obtenerEnlaceReceta(idPublicacion);

        navigator.clipboard.writeText(enlaceReceta) // Copiar link en el portapapeles
            .then(() => {
                mostrarModal("El enlace de la receta ha sido copiado al portapapeles.");
            })
            .catch(err => {
                console.error("Error al copiar el enlace: ", err);
                mostrarModal("Hubo un error al copiar el enlace.");
            });
    }

    function mostrarModal(mensaje, onAccept = null) {
        document.getElementById("modalCompartirMensaje").innerText = mensaje;
        const modalMensaje = new bootstrap.Modal(document.getElementById("modalMensaje"));

        const aceptarBtn = document.querySelector("#modalMensaje .btn-primary");
        aceptarBtn.onclick = () => {
            if (onAccept) onAccept(); // ejecuto el callback si está definido
            modalMensaje.hide(); 
        };
        modalMensaje.show();
    }

    function compartirPorFacebook(idPublicacion) {
        const enlaceReceta = obtenerEnlaceReceta(idPublicacion);
        const mensaje = `¡Mira esta receta!`;
        const urlFacebook = `http://www.facebook.com/sharer.php?u=${encodeURIComponent(enlaceReceta)}&quote=${encodeURIComponent(mensaje)}`;
        window.open(urlFacebook, "_blank"); // Nueva ventana
    }

    function compartirPorWhatsApp(idPublicacion) {
        const enlaceReceta = obtenerEnlaceReceta(idPublicacion);
        const mensaje = `¡Mira esta receta! ${encodeURIComponent(enlaceReceta)}`;
        const urlWhatsApp = `https://wa.me/?text=${mensaje}`;
        window.open(urlWhatsApp, "_blank"); // Nueva ventana
    }

    function compartirPorInstagram(idPublicacion) {
        const enlaceReceta = obtenerEnlaceReceta(idPublicacion);
        const mensaje = `Instagram no permite compartir enlaces directamente.\n\nEl enlace ha sido copiado al portapapeles.`;

        navigator.clipboard.writeText(enlaceReceta) // Copiar link en el portapapeles
            .then(() => {
                mostrarModal(mensaje, () => {
                    window.open("https://www.instagram.com/", "_blank");
                });
            })
            .catch(err => {
                console.error("Error al copiar el enlace: ", err);
                mostrarModal("Hubo un error al copiar el enlace.");
            });
    }

    function compartirPorTwitter(idPublicacion) {
        const enlaceReceta = obtenerEnlaceReceta(idPublicacion);
        const mensaje = `¡Mira esta receta!`;
        const urlTwitter = `https://twitter.com/intent/tweet?text=${encodeURIComponent(mensaje)}&url=${encodeURIComponent(enlaceReceta)}`;
        window.open(urlTwitter, "_blank"); // Nueva ventana
    }

    // funciones a cada boton
    facebook.addEventListener('click', function (event) {
        event.preventDefault();
        compartirPorFacebook(idPublicacion);
    });
    twitter.addEventListener('click', function (event) {
        event.preventDefault();
        compartirPorTwitter(idPublicacion);
    });
    link.addEventListener('click', function (event) {
        event.preventDefault();
        compartirReceta(idPublicacion)
    });
    whatsapp.addEventListener('click', function (event) {
        event.preventDefault();
        compartirPorWhatsApp(idPublicacion)
    });
    instagram.addEventListener('click', function (event) {
        event.preventDefault();
        compartirPorInstagram(idPublicacion)
    });
});
