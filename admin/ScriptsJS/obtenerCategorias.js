export function obtenerCategorias(){

    let contadorDeCategorias = 0;

    const panelContenido = document.querySelector(".panel-body");

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'border', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-categorias";

    let urlActual = window.location.href;
    let palabraClave = "recipes-web-master/";

    // Encuentra el índice de la palabra "recipes-web-master/" en la URL
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {

        // Guarda la URL desde el inicio hasta la palabra "recipes-web-master/"
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
                throw new Error('Error en la solicitud: ' + res.status);
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

            const ContenedorDeCategorias = document.getElementById('contenedor-categorias');

            ContenedorDeCategorias.classList.add("pb-3");

            if (data.length > 0) {
                
                data.forEach( (e) => {
    
                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-3');
        
                        divPadre.innerHTML = `
                            <div class="card-body d-flex flex-row p-0 px-3">
        
                                <img src="${urlCortada}/categorias/imgs/${e.nombre_imagen}" alt="Imagen ${e.titulo}" class="w-25 h-25 m-2 rounded-circle">
        
                                <div class="container-sm d-flex flex-column justify-content-evenly align-items-center">
                                    <h4>${e.titulo}</h4>
                                    <h5 class="text-secondary">Sección: ${e.seccion}</h5>
                                </div>
                            </div/
                        `;
        
                    const divHijo = document.createElement('div');
                    divHijo.classList.add('d-flex', 'flex-row', 'w-75', 'mb-2', 'align-self-end');
        
                    const editButton = document.createElement("button");
                    editButton.type = "submit";
                    editButton.className = "btn btn-custom-bg btn-sm ms-1 m-2 w-50 align-self-center btn-editar-categoria";
                    editButton.setAttribute("data-bs-toggle", "modal");
                    editButton.setAttribute("data-bs-target", "#modalGestionCategoria");
                    editButton.textContent = "Editar categoria";
        
                    editButton.addEventListener("click", function (){
                        document.getElementById("modalGestionCategoriaTitulo").textContent = "Editar categoría";
                        document.getElementById("inputCategoriaTitulo").value = e.titulo;
        
                        const imgPreviaCategoria = document.getElementById("imgPreviaCategoria");
                        imgPreviaCategoria.classList.remove("d-none");
                        imgPreviaCategoria.src = `data:image/jpeg;base64,${e.imagen}`;
                        imgPreviaCategoria.alt = 'Imagen ' + e.titulo;
                        document.getElementById("seccion").value = e.seccion;
        
                        document.getElementById("formulario-gestion-categorias").dataset.accion = 'editar';
                        document.getElementById("categoriaID").value = e.id_categoria;
                    });
        
                    divHijo.appendChild(editButton);
                            
                    const deleteButton = document.createElement("button");
                    deleteButton.type = "submit";
                    deleteButton.className = "btn btn-danger btn-sm ms-1 m-2 w-50 align-self-center btn-eliminar-categoria";
                    deleteButton.setAttribute("data-bs-toggle", "modal");
                    deleteButton.setAttribute("data-bs-target", "#modalEliminarItem");
                    deleteButton.textContent = "Eliminar categoria";
    
                    deleteButton.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Eliminar categoría";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de que desea eliminar la categoría '<strong>${e.titulo}</strong>' ?`;
                        document.getElementById("ItemID").value = e.id_categoria;
                    });
                            
                    divHijo.appendChild(deleteButton);
                    divPadre.appendChild(divHijo);
        
                    ContenedorDeCategorias.appendChild(divPadre);
    
                    contadorDeCategorias++;
    
                });

            }else{

                ContenedorDeCategorias.innerHTML = `<h3 class="align-self-center mt-3">No hay categorias</h3>`;
                
            }
            
            document.getElementById("cont-categorias").textContent = contadorDeCategorias;

        });

    } else {
        console.log("La cadena 'recipes-web-master/' no se encontró en la URL.");
    }

    panelContenido.appendChild(contenedorCards);
}