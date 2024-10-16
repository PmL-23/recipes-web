document.addEventListener("DOMContentLoaded", function(){

    cargarTodasCategorias();

    const FiltrosSecciones = document.querySelectorAll(".filtro-seccion");

    const FiltrosItems = document.querySelectorAll(".filtro-item");

    FiltrosItems.forEach( (e) => {

        e.addEventListener("click", function (){
            
            if(e.textContent == "Todas"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.remove("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[0].classList.add("item-active");

                cargarTodasCategorias();

            }else if(e.textContent == "Saladas"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[1].classList.add("item-active");

                document.getElementById("saladas-seccion").classList.remove("d-none");

            }else if(e.textContent == "Ocasiones especiales"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[2].classList.add("item-active");

                document.getElementById("ocasiones-esp-seccion").classList.remove("d-none");

            }else if(e.textContent == "Dietas especiales"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[3].classList.add("item-active");

                document.getElementById("dietas-esp-seccion").classList.remove("d-none");

            }else if(e.textContent == "Bebidas"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[4].classList.add("item-active");

                document.getElementById("bebidas-seccion").classList.remove("d-none");


            }else if(e.textContent == "Dulces"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[5].classList.add("item-active");

                document.getElementById("dulces-seccion").classList.remove("d-none");

            }
        });
    } );
});

function cargarTodasCategorias(){

    document.querySelectorAll(".filtro-container").forEach( (e) => {
        e.innerHTML = ``;
    });

    let urlActual = window.location.href;
    let palabraClave = "recipes-web-master/";

        // Encuentra el índice de la palabra "UIE/" en la URL
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {

        // Guarda la URL desde el inicio hasta la palabra "UIE/"
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "admin/CategoriasPHP/obtenerCategorias.php", {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(res => {
            // Verifico si la respuesta fue exitosa
            if (!res.ok) {
                throw new Error('Error en la solicitud: ' + response.status);
            }

            // Verifico si hay contenido en la respuesta
            if (res.headers.get('content-length') === '0') {
                return null; // No hay contenido
            }

            // Convierto a JSON
            return res.json();
        })
        .then(data => {
        
            /* console.log(data); */

            data.forEach( (e) => {

                let seccion = document.getElementById( e.seccion + "-container");

                seccion.innerHTML += `
                    <a class="categoria" href="./recetas-categoria.php?categoria_id=${e.id_categoria}" data-seccion="${e.seccion}">
                        <img src="./imgs/${e.nombre_imagen}" alt="${e.titulo} imagen">
                        <p>${e.titulo}</p>
                    </a>
                `;

            });

        });

    } else {
        console.log("La cadena 'recipes-web-master/' no se encontró en la URL.");
    }

}