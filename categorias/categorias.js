const categorias = [
    {
        id: 1,
        nombre: "Arroces",
        imagen: "./imgs/saladas/arroces.webp",
        seccion: "saladas"
    },
    {
        id: 2,
        nombre: "Carnes",
        imagen: "./imgs/saladas/carnes.webp",
        seccion: "saladas",
    },
    {
        id: 3,
        nombre: "Cerdo",
        imagen: "./imgs/saladas/cerdo.webp",
        seccion: "saladas",
    },
    {
        id: 4,
        nombre: "Ensaladas",
        imagen: "./imgs/saladas/ensaladas.webp",
        seccion: "saladas",
    },
    {
        id: 5,
        nombre: "Guisos",
        imagen: "./imgs/saladas/guisos.webp",
        seccion: "saladas",
    },
    {
        id: 6,
        nombre: "Panes",
        imagen: "./imgs/saladas/panes.webp",
        seccion: "saladas",
    },
    {
        id: 7,
        nombre: "Pastas",
        imagen: "./imgs/saladas/pastas.webp",
        seccion: "saladas",
    },
    {
        id: 8,
        nombre: "Pescados y Mariscos",
        imagen: "./imgs/saladas/pescados.webp",
        seccion: "saladas",
    },
    {
        id: 9,
        nombre: "Pizzas, tartas y empanadas",
        imagen: "./imgs/saladas/pizzastartasempanadas.webp",
        seccion: "saladas",
    },
    {
        id: 10,
        nombre: "Pollo",
        imagen: "./imgs/saladas/pollo.webp",
        seccion: "saladas",
    },
    {
        id: 11,
        nombre: "Sopas y cremas",
        imagen: "./imgs/saladas/sopasycremas.webp",
        seccion: "saladas",
    },
    {
        id: 12,
        nombre: "Tapas y snacks",
        imagen: "./imgs/saladas/tapasysnacks.webp",
        seccion: "saladas",
    },
    {
        id: 13,
        nombre: "Vegano",
        imagen: "./imgs/saladas/vegano.webp",
        seccion: "saladas",
    },
    {
        id: 14,
        nombre: "Vegetariano",
        imagen: "./imgs/saladas/vegetariano.webp",
        seccion: "saladas",
    },
    {
        id: 15,
        nombre: "Día de la madre",
        imagen: "./imgs/Ocasiones Especiales/diamadre.webp",
        seccion: "ocasiones-especiales",
    },
    {
        id: 16,
        nombre: "Halloween",
        imagen: "./imgs/Ocasiones Especiales/halloween.webp",
        seccion: "ocasiones-especiales",
    },
    {
        id: 17,
        nombre: "Navidad",
        imagen: "./imgs/Ocasiones Especiales/navidad.webp",
        seccion: "ocasiones-especiales",
    },
    {
        id: 18,
        nombre: "San Valentin",
        imagen: "./imgs/Ocasiones Especiales/sanvalentin.webp",
        seccion: "ocasiones-especiales",
    },
    {
        id: 19,
        nombre: "Sin Tacc",
        imagen: "./imgs/Dietas Especiales/sintacc.webp",
        seccion: "dietas-especiales",
    },
    {
        id: 20,
        nombre: "Bebidas",
        imagen: "./imgs/bebidas/bebidas.webp",
        seccion: "bebidas",
    },
    {
        id: 21,
        nombre: "Galletitas",
        imagen: "./imgs/Dulces/galletitas.webp",
        seccion: "dulces",
    },
    {
        id: 22,
        nombre: "Helados",
        imagen: "./imgs/Dulces/helados.webp",
        seccion: "dulces",
    },
    {
        id: 23,
        nombre: "Postres",
        imagen: "./imgs/Dulces/postres.webp",
        seccion: "dulces",
    },
    {
        id: 24,
        nombre: "Tartas Dulces",
        imagen: "./imgs/Dulces/tartasdulces.webp",
        seccion: "dulces",
    },
    {
        id: 25,
        nombre: "Tortas y budines",
        imagen: "./imgs/Dulces/tortasybudines.webp",
        seccion: "dulces",
    }
];

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

                const SaladasContainer = document.getElementById("saladas-container");

                SaladasContainer.innerHTML = ``;

                categorias.forEach((e) => {
                    if (e.seccion == "saladas") {
                        
                        SaladasContainer.innerHTML += `
                            <a class="categoria" href="./categorias/categoria-${e.nombre}.html">
                                <img src="${e.imagen}" alt="${e.nombre} imagen">
                                <p>${e.nombre}</p>
                            </a>
                        `;
                    }
                });

            }else if(e.textContent == "Ocasiones especiales"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[2].classList.add("item-active");

                document.getElementById("ocasiones-esp-seccion").classList.remove("d-none");

                const OcasEspContainer = document.getElementById("ocasiones-especiales-container");

                OcasEspContainer.innerHTML = ``;

                categorias.forEach((e) => {
                    if (e.seccion == "ocasiones-especiales") {
                        
                        OcasEspContainer.innerHTML += `
                            <a class="categoria" href="./categorias/categoria-${e.nombre}.html">
                                <img src="${e.imagen}" alt="${e.nombre} imagen">
                                <p>${e.nombre}</p>
                            </a>
                        `;
                    }
                });

            }else if(e.textContent == "Dietas especiales"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[3].classList.add("item-active");

                document.getElementById("dietas-esp-seccion").classList.remove("d-none");

                const DietasEspContainer = document.getElementById("dietas-especiales-container");

                DietasEspContainer.innerHTML = ``;

                categorias.forEach((e) => {
                    if (e.seccion == "dietas-especiales") {
                        
                        DietasEspContainer.innerHTML += `
                            <a class="categoria" href="./categorias/categoria-${e.nombre}.html">
                                <img src="${e.imagen}" alt="${e.nombre} imagen">
                                <p>${e.nombre}</p>
                            </a>
                        `;
                    }
                });

            }else if(e.textContent == "Bebidas"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[4].classList.add("item-active");

                document.getElementById("bebidas-seccion").classList.remove("d-none");

                const BebidasContainer = document.getElementById("bebidas-container");

                BebidasContainer.innerHTML = ``;

                categorias.forEach((e) => {
                    if (e.seccion == "bebidas") {
                        
                        BebidasContainer.innerHTML += `
                            <a class="categoria" href="./categorias/categoria-${e.nombre}.html">
                                <img src="${e.imagen}" alt="${e.nombre} imagen">
                                <p>${e.nombre}</p>
                            </a>
                        `;
                    }
                });

            }else if(e.textContent == "Dulces"){

                FiltrosSecciones.forEach( (e) => {
                    e.classList.add("d-none");
                });

                FiltrosItems.forEach((e) => {
                    e.classList.remove("item-active");
                });

                FiltrosItems[5].classList.add("item-active");

                document.getElementById("dulces-seccion").classList.remove("d-none");

                const DulcesContainer = document.getElementById("dulces-container");

                DulcesContainer.innerHTML = ``;

                categorias.forEach((e) => {
                    if (e.seccion == "dulces") {
                        
                        DulcesContainer.innerHTML += `
                            <a class="categoria" href="./categorias/categoria-${e.nombre}.html">
                                <img src="${e.imagen}" alt="${e.nombre} imagen">
                                <p>${e.nombre}</p>
                            </a>
                        `;
                    }
                });

            }
        });
    } );
});

function cargarTodasCategorias(){

    document.querySelectorAll(".filtro-container").forEach( (e) => {
        e.innerHTML = ``;
    });
    
    categorias.forEach( (e) => {

        let seccion = document.getElementById( e.seccion + "-container");

        seccion.innerHTML += `
            <a class="categoria" href="./categorias/categoria-${e.nombre}.html">
                <img src="${e.imagen}" alt="${e.nombre} imagen">
                <p>${e.nombre}</p>
            </a>
        `;
    });

}