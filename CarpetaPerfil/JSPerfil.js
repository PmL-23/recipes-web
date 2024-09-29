
//usamos un query selector con data-background-image para obtener la imagen actual de cada
//carrousel. Despues aplicamos estilos desde este JS, no se pudo encontrar otra solución por
//el momento

document.querySelectorAll('.slide').forEach(function (slide) {
    var imgSrc = slide.getAttribute('data-background-image');
    slide.style.setProperty('--background-image', `url(${imgSrc})`);
    slide.style.backgroundImage = `url(${imgSrc})`;
});