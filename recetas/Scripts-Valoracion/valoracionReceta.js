import { cargarComentariosReceta } from "../Scripts-Comentarios/comentariosReceta.js";

document.addEventListener("DOMContentLoaded", function (){

    const Estrellas = document.querySelectorAll('.estrella');
    const ratingValue = document.getElementById("valoracion");
    let currentRating = 0;

    Estrellas.forEach(estrella => {

        estrella.addEventListener('mouseover', function() {
            resetEstrellas(Estrellas);
            iluminarEstrellas(this.dataset.value, Estrellas);
        });

        estrella.addEventListener('mouseout', function() {
            currentRating = ratingValue.dataset.value;
            resetEstrellas(Estrellas);
            if (currentRating > 0) iluminarEstrellas(currentRating, Estrellas);
        });

        estrella.addEventListener('click', function() {
            currentRating = this.dataset.value;
            ratingValue.dataset.value = currentRating;

            try {

                const IDReceta = document.getElementById("id_publicacion_receta").value;

                fetch('../recetas/Scripts-Valoracion/postValoracionReceta.php', {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `id_publicacion_receta=${IDReceta}&valoracion=${currentRating}`
                })
                .then(res => res.json())
                .then(data => {

                    if ( (data.success == true) && (data.accion == "delete") ) {

                        resetEstrellas(Estrellas);
                        currentRating = 0;
                        ratingValue.dataset.value = 0;
                        /* console.log(data.accion + " en valoración"); */
                        document.querySelector(".puntuacion").textContent = "-";

                    } else if( (data.success == true) && (data.accion == "insert") ){

                        iluminarEstrellas(currentRating, Estrellas);
                        /* console.log(data.accion + " en valoración"); */
                        document.querySelector(".puntuacion").textContent = currentRating;

                    }else if((data.success == true) && (data.accion == "update")){

                        /* console.log(data.accion + " en valoración"); */
                        document.querySelector(".puntuacion").textContent = currentRating;

                    }else{

                        /* console.log(data.message); */

                        // Mostrar el toast de error
                        var toastElement = document.getElementById('formToastError');
                        document.getElementById("toast-error-msg").textContent = data.message;
                        var toast = new bootstrap.Toast(toastElement);
                        toast.show();

                    }

                    cargarPromedioValoraciones();
                    cargarComentariosReceta();

                })
                .catch(error => {
                    console.error("Error al valorar publicación: ", error);
                });

            } catch (error) {
                console.log(error);
            }

        });
    });

    cargarPromedioValoraciones();
});

function iluminarEstrellas(rating, Estrellas) {
    for (let i = 0; i < rating; i++) {
        Estrellas[i].classList.add('hover');
    }
}

function resetEstrellas(Estrellas) {
    Estrellas.forEach(estrella => {
        estrella.classList.remove('hover');
    });
}

function cargarPromedioValoraciones(){

    try {

        const IDReceta = document.getElementById("id_publicacion_receta").value;

        fetch('../recetas/Scripts-Valoracion/getPromedioValoraciones.php', {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id_publicacion_receta=${IDReceta}`
        })
        .then(res => res.json())
        .then(data => {
            
            if (data.success == true) {

                document.getElementById("numPromedioValoraciones").textContent = (Math.floor(data.valor * 10) / 10) + " / 5 estrellas";
                const contenedorEstrellasPromedioValoracion = document.getElementById("estrellasPromedioValoraciones");
                contenedorEstrellasPromedioValoracion.innerHTML = ``;

                for (let index = 1; index <= 5; index++) {

                    const estrella = document.createElement("span");

                    if (index <= Math.floor(data.valor)) {
                        estrella.className = "star full";

                    }else if( (index === Math.ceil(data.valor)) && (data.valor - Math.floor(data.valor) > 0) ){
                        estrella.className = "star half";

                    }else{
                        estrella.className = "star";
                    }

                    contenedorEstrellasPromedioValoracion.appendChild(estrella);

                }

                fetch('../recetas/Scripts-Valoracion/getCantidadValoraciones.php', {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `id_publicacion_receta=${IDReceta}`
                })
                .then(res => res.json())
                .then(resultado => {

                    /* console.log(resultado); */

                    const contadorValoraciones = document.getElementById("valoracionesContador");

                    if(resultado.cantTotalValoraciones > 0){
                        contadorValoraciones.textContent = "Veces valorado: " + resultado.cantTotalValoraciones;
                    }else{
                        contadorValoraciones.textContent = "0 valoraciones";
                    }

                    //Modifico barra de porcentaje para valoraciones de 5 estrellas
                    let cincoEstrellasPorcentaje = (resultado.cantCincoEstrellas / resultado.cantTotalValoraciones) * 100;

                    if (cincoEstrellasPorcentaje > 0) {
                        document.querySelector(".contenedor-porcentaje-cinco-estrellas").setAttribute("aria-valuenow", cincoEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-cinco-estrellas").style.width = cincoEstrellasPorcentaje + "%";
                    }else{
                        document.querySelector(".contenedor-porcentaje-cinco-estrellas").setAttribute("aria-valuenow", "0");
                        document.querySelector(".barra-porcentaje-cinco-estrellas").style.width = "0%";
                        
                    }

                    document.querySelector(".cant-val-cinco-estrellas").textContent = resultado.cantCincoEstrellas;
                    
                    //Modifico barra de porcentaje para valoraciones de 4 estrellas
                    let cuatroEstrellasPorcentaje = (resultado.cantCuatroEstrellas / resultado.cantTotalValoraciones) * 100;

                    if (cuatroEstrellasPorcentaje > 0) {
                        document.querySelector(".contenedor-porcentaje-cuatro-estrellas").setAttribute("aria-valuenow", cuatroEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-cuatro-estrellas").style.width = cuatroEstrellasPorcentaje + "%";
                    }else{
                        document.querySelector(".contenedor-porcentaje-cuatro-estrellas").setAttribute("aria-valuenow", "0");
                        document.querySelector(".barra-porcentaje-cuatro-estrellas").style.width = "0%";
                    }

                    document.querySelector(".cant-val-cuatro-estrellas").textContent = resultado.cantCuatroEstrellas;

                    //Modifico barra de porcentaje para valoraciones de 3 estrellas
                    let tresEstrellasPorcentaje = (resultado.cantTresEstrellas / resultado.cantTotalValoraciones) * 100;

                    if (tresEstrellasPorcentaje > 0) {
                        document.querySelector(".contenedor-porcentaje-tres-estrellas").setAttribute("aria-valuenow", tresEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-tres-estrellas").style.width = tresEstrellasPorcentaje + "%";
                    }else{
                        document.querySelector(".contenedor-porcentaje-tres-estrellas").setAttribute("aria-valuenow", "0");
                        document.querySelector(".barra-porcentaje-tres-estrellas").style.width = "0%";
                    }

                    document.querySelector(".cant-val-tres-estrellas").textContent = resultado.cantTresEstrellas;

                    //Modifico barra de porcentaje para valoraciones de 2 estrellas
                    let dosEstrellasPorcentaje = (resultado.cantDosEstrellas / resultado.cantTotalValoraciones) * 100;

                    if (dosEstrellasPorcentaje > 0) {
                        document.querySelector(".contenedor-porcentaje-dos-estrellas").setAttribute("aria-valuenow", dosEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-dos-estrellas").style.width = dosEstrellasPorcentaje + "%";
                    }else{
                        document.querySelector(".contenedor-porcentaje-dos-estrellas").setAttribute("aria-valuenow", "0");
                        document.querySelector(".barra-porcentaje-dos-estrellas").style.width = "0%";
                    }

                    document.querySelector(".cant-val-dos-estrellas").textContent = resultado.cantDosEstrellas;

                    //Modifico barra de porcentaje para valoraciones de 1 estrella
                    let unaEstrellaPorcentaje = (resultado.cantUnaEstrella / resultado.cantTotalValoraciones) * 100;
                    
                    if (unaEstrellaPorcentaje > 0) {
                        document.querySelector(".contenedor-porcentaje-una-estrella").setAttribute("aria-valuenow", unaEstrellaPorcentaje);
                        document.querySelector(".barra-porcentaje-una-estrella").style.width = unaEstrellaPorcentaje + "%";
                    }else{
                        document.querySelector(".contenedor-porcentaje-una-estrella").setAttribute("aria-valuenow", "0");
                        document.querySelector(".barra-porcentaje-una-estrella").style.width = "0%";
                    }
                    
                    document.querySelector(".cant-val-una-estrella").textContent = resultado.cantUnaEstrella;

                })
                .catch(err => console.error(err));

            }else{

                console.log(data.message);

            }
        })
        .catch(error => {
            console.error("Error al valorar publicación: ", error);
        });

    } catch (error) {
        console.log(error);
    }
}