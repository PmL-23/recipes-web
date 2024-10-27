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

            let urlActual = window.location.href;
            let palabraClave = "recipes-web/";

            // Encuentra el índice de la palabra "recipes-web/" en la URL
            let indice = urlActual.indexOf(palabraClave);


            if (indice !== -1) {
                // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
                let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                try {

                    const IDReceta = document.getElementById("id_publicacion_receta").value;
    
                    fetch(urlCortada + "recetas/Scripts-Valoracion/postValoracionReceta.php", {
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

                            console.log(data.message);

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

    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";

    // Encuentra el índice de la palabra "recipes-web/" en la URL
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {
        // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        try {

            const IDReceta = document.getElementById("id_publicacion_receta").value;
    
            fetch(urlCortada + "recetas/Scripts-Valoracion/getPromedioValoraciones.php", {
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

                    fetch(urlCortada + "recetas/Scripts-Valoracion/getCantidadValoraciones.php", {
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

                        let cincoEstrellasPorcentaje = (resultado.cantCincoEstrellas / resultado.cantTotalValoraciones) * 100;
                        document.querySelector(".contenedor-porcentaje-cinco-estrellas").setAttribute("aria-valuenow", cincoEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-cinco-estrellas").style.width = cincoEstrellasPorcentaje + "%";
                        document.querySelector(".cant-val-cinco-estrellas").textContent = resultado.cantCincoEstrellas;

                        let cuatroEstrellasPorcentaje = (resultado.cantCuatroEstrellas / resultado.cantTotalValoraciones) * 100;
                        document.querySelector(".contenedor-porcentaje-cuatro-estrellas").setAttribute("aria-valuenow", cuatroEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-cuatro-estrellas").style.width = cuatroEstrellasPorcentaje + "%";
                        document.querySelector(".cant-val-cuatro-estrellas").textContent = resultado.cantCuatroEstrellas;

                        let tresEstrellasPorcentaje = (resultado.cantTresEstrellas / resultado.cantTotalValoraciones) * 100;
                        document.querySelector(".contenedor-porcentaje-tres-estrellas").setAttribute("aria-valuenow", tresEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-tres-estrellas").style.width = tresEstrellasPorcentaje + "%";
                        document.querySelector(".cant-val-tres-estrellas").textContent = resultado.cantTresEstrellas;

                        let dosEstrellasPorcentaje = (resultado.cantDosEstrellas / resultado.cantTotalValoraciones) * 100;
                        document.querySelector(".contenedor-porcentaje-dos-estrellas").setAttribute("aria-valuenow", dosEstrellasPorcentaje);
                        document.querySelector(".barra-porcentaje-dos-estrellas").style.width = dosEstrellasPorcentaje + "%";
                        document.querySelector(".cant-val-dos-estrellas").textContent = resultado.cantDosEstrellas;

                        let unaEstrellaPorcentaje = (resultado.cantUnaEstrella / resultado.cantTotalValoraciones) * 100;
                        document.querySelector(".contenedor-porcentaje-una-estrella").setAttribute("aria-valuenow", unaEstrellaPorcentaje);
                        document.querySelector(".barra-porcentaje-una-estrella").style.width = unaEstrellaPorcentaje + "%";
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
        
    }else{
        console.log("error url");
    }
}