function obtenerEnlaceReceta(idPublicacion) {
    const baseURL = `${window.location.origin}/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php`;
    return `${baseURL}?id=${idPublicacion}`;
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

    // Configurar el botón de aceptar
    const aceptarBtn = document.querySelector("#modalMensaje .btn-primary");
    aceptarBtn.onclick = () => {
        if (onAccept) onAccept(); // Ejecutar callback si está definido
        modalMensaje.hide(); // Cerrar el modal
    };

    // Mostrar el modal
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
