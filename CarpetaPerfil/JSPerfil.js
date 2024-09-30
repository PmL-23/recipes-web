
//usamos un query selector con data-background-image para obtener la imagen actual de cada
//carrousel. Despues aplicamos estilos desde este JS, no se pudo encontrar otra solución por
//el momento

document.querySelectorAll('.slide').forEach(function (slide) {
    var imgSrc = slide.getAttribute('data-background-image');
    slide.style.setProperty('--background-image', `url(${imgSrc})`);
    slide.style.backgroundImage = `url(${imgSrc})`;
});
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block'; // Mostrar la imagen
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        imagePreview.src = "#"; // Restablecer la vista previa si no hay archivo
        imagePreview.style.display = 'none'; // Ocultar la imagen
    }
}
    function CopiarEnlacePerfil() {
        const profileLink = 'https://RecetasDeAmerica.com/MiPerfil';
        navigator.clipboard.writeText(profileLink).then(() => {
        }).catch(err => {
            console.error('Error al copiar el enlace: ', err);
        });
    }

