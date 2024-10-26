export function obtenerIngredientes(){

    let contadorDeIngredientes = 0;

    const panelContenido = document.querySelector(".panel-body");

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'border', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-ingredientes";

    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";

    // Encuentra el índice de la palabra "recipes-web/" en la URL
    let indice = urlActual.indexOf(palabraClave);

    if (indice !== -1) {

        // Guarda la URL desde el inicio hasta la palabra "recipes-web/"
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "admin/IngredientesPHP/obtenerIngredientes.php", {
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

            const ContenedorDeIngredientes = document.getElementById('contenedor-ingredientes');

            ContenedorDeIngredientes.classList.add("pb-3");

            if (data.length > 0) {
                
                data.forEach( (e) => {
    
                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-3', 'mb-0', 'flex-row', 'align-items-center');
        
                        divPadre.innerHTML = `
                            <div class="card-body d-flex flex-row p-0 w-75">
        
                                <h4 class="m-0 ms-2">${e.nombre}</h4>
    
                            </div/
                        `;
        
                    const divHijo = document.createElement('div');
                    divHijo.classList.add('d-flex', 'flex-row', 'w-50', 'justify-content-end');
        
                    const editButton = document.createElement("button");
                    editButton.type = "submit";
                    editButton.className = "btn btn-custom-bg btn-sm ms-1 m-2 w-100 align-self-center btn-editar-ingrediente";
                    editButton.setAttribute("data-bs-toggle", "modal");
                    editButton.setAttribute("data-bs-target", "#modalGestionIngrediente");
                    editButton.textContent = "Editar";
        
                    editButton.addEventListener("click", function (){
                        document.getElementById("modalGestionIngredienteTitulo").textContent = "Editar ingrediente";
                        document.getElementById("inputIngredienteTitulo").value = e.nombre;
                        document.getElementById("formulario-gestion-ingredientes").dataset.accion = 'editar';
                        document.getElementById("ingredienteID").value = e.id_ingrediente;
                    });
        
                    divHijo.appendChild(editButton);
                            
                    const deleteButton = document.createElement("button");
                    deleteButton.type = "submit";
                    deleteButton.className = "btn btn-danger btn-sm ms-1 m-2 w-100 align-self-center btn-eliminar-ingrediente";
                    deleteButton.setAttribute("data-bs-toggle", "modal");
                    deleteButton.setAttribute("data-bs-target", "#modalEliminarItem");
                    deleteButton.textContent = "Eliminar";
    
                    deleteButton.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Eliminar ingrediente";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de que desea eliminar el ingrediente '<strong>${e.nombre}</strong>' ?`;
                        document.getElementById("ItemID").value = e.id_ingrediente;
                    });
                            
                    divHijo.appendChild(deleteButton);
                    divPadre.appendChild(divHijo);
        
                    ContenedorDeIngredientes.appendChild(divPadre);
    
                    contadorDeIngredientes++;
    
                });
                
            }else{

                ContenedorDeIngredientes.innerHTML = `<h3 class="align-self-center mt-3">No hay ingredientes</h3>`;

            }
            
            document.getElementById("cont-ingredientes").textContent = contadorDeIngredientes;

        });

    } else {
        console.log("La cadena 'recipes-web/' no se encontró en la URL.");
    }

    panelContenido.appendChild(contenedorCards);
}