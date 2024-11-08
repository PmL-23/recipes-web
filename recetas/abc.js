//copiar link
function compartirReceta(idPublicacion) {
    const enlaceReceta = `https://97e8-201-176-196-32.ngrok-free.app/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php?id=${idPublicacion}`;
    
    navigator.clipboard.writeText(enlaceReceta) // copiar link en el portapapeles
        .then(() => {
            alert("El enlace de la receta ha sido copiado al portapapeles.");
        })
        .catch(err => {
            console.error("Error al copiar el enlace: ", err);
        });
}
// ir a fc y compartir
function compartirPorFacebook(idPublicacion) {
    const enlaceReceta = `https://97e8-201-176-196-32.ngrok-free.app/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php?id=${idPublicacion}`;
    const mensaje = `¡Mira esta receta!`;
    const urlFacebook = `http://www.facebook.com/sharer.php?u=${encodeURIComponent(enlaceReceta)}&quote=${encodeURIComponent(mensaje)}`;

    window.open(urlFacebook, "_blank");//nueva ventana
}


// ir a wsp elegir un contacto y compartir
function compartirPorWhatsApp(idPublicacion) {
    const enlaceReceta = `https://97e8-201-176-196-32.ngrok-free.app/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php?id=${idPublicacion}`;
    const mensaje = `¡Mira esta receta! ${encodeURIComponent(enlaceReceta)}`;
    const urlWhatsApp = `https://wa.me/?text=${mensaje}`;
    
    window.open(urlWhatsApp, "_blank");//nueva ventana
}

// no anda compartir en ig
function compartirPorInstagram(idPublicacion) {
    const enlaceReceta = `https://97e8-201-176-196-32.ngrok-free.app/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php?id=${idPublicacion}`;
    const mensaje = `Instagram no permite compartir enlaces directamente.\n\nEl enlace ha sido copiado al portapapeles.`;

    navigator.clipboard.writeText(enlaceReceta) // copiar link en el portapapeles
        .then(() => {
            alert(mensaje); 
            setTimeout(() => {
                window.open("https://www.instagram.com/", "_blank"); // ir a instagram después de mostrar el mensaje
            }, 500); // retraso de 500 ms para permitir que el mensaje se vea antes de redirigir
        })
        .catch(err => {
            console.error("Error al copiar el enlace: ", err);
            alert("Hubo un error al copiar el enlace.");
        });
}


// ir a tw y compartir
function compartirPorTwitter(idPublicacion) {
    const enlaceReceta = `https://97e8-201-176-196-32.ngrok-free.app/xampp/proyecto_final/recipes-web/recetas/receta-plantilla.php?id=${idPublicacion}`;
    const mensaje = `¡Mira esta receta!`;
    const urlTwitter = `https://twitter.com/intent/tweet?text=${encodeURIComponent(mensaje)}&url=${encodeURIComponent(enlaceReceta)}`;
    
    window.open(urlTwitter, "_blank");//nueva ventana
}
