export function obtenerEtiquetas(){

    /* let contadorDeEtiquetas = 0; */

    const panelContenido = document.querySelector(".panel-body");

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'border', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-etiquetas";

    try {
        
        fetch('../admin/Scripts-Etiquetas/obtenerEtiquetas.php', {
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
    
            const ContenedorDeEtiquetas = document.getElementById('contenedor-etiquetas');
    
            ContenedorDeEtiquetas.classList.add("pb-3");
    
            if (data.length > 0) {
                
                data.forEach( (e) => {
    
                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-3', 'mb-0', 'flex-row', 'align-items-center');
        
                        divPadre.innerHTML = `
                            <div class="card-body d-flex flex-row p-0 w-75">
        
                                <h4 class="m-0 ms-2">${e.titulo}</h4>
    
                            </div/
                        `;
        
                    const divHijo = document.createElement('div');
                    divHijo.classList.add('d-flex', 'flex-row', 'w-50', 'justify-content-end');
        
                    const editButton = document.createElement("button");
                    editButton.type = "submit";
                    editButton.className = "btn btn-custom-bg btn-sm ms-1 m-2 w-100 align-self-center btn-editar-etiqueta";
                    editButton.setAttribute("data-bs-toggle", "modal");
                    editButton.setAttribute("data-bs-target", "#modalGestionEtiqueta");
                    editButton.textContent = "Editar";
        
                    editButton.addEventListener("click", function (){
                        document.getElementById("modalGestionEtiquetaTitulo").textContent = "Editar etiqueta";
                        document.getElementById("inputEtiquetaTitulo").value = e.titulo;
                        document.getElementById("formulario-gestion-etiquetas").dataset.accion = 'editar';
                        document.getElementById("etiquetaID").value = e.id_etiqueta;
                    });
        
                    divHijo.appendChild(editButton);
                            
                    const deleteButton = document.createElement("button");
                    deleteButton.type = "submit";
                    deleteButton.className = "btn btn-danger btn-sm ms-1 m-2 w-100 align-self-center btn-eliminar-etiqueta";
                    deleteButton.setAttribute("data-bs-toggle", "modal");
                    deleteButton.setAttribute("data-bs-target", "#modalEliminarItem");
                    deleteButton.textContent = "Eliminar";
    
                    deleteButton.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Eliminar etiqueta";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de que desea eliminar la etiqueta '<strong>${e.titulo}</strong>' ?`;
                        document.getElementById("ItemID").value = e.id_etiqueta;
                    });
                            
                    divHijo.appendChild(deleteButton);
                    divPadre.appendChild(divHijo);
        
                    ContenedorDeEtiquetas.appendChild(divPadre);
    
                    /* contadorDeEtiquetas++; */
    
                });
                
            }else{
    
                ContenedorDeEtiquetas.innerHTML = `<h3 class="align-self-center mt-3">No hay etiquetas</h3>`;
    
            }
            
            /* document.getElementById("cont-etiquetas").textContent = contadorDeEtiquetas; */
    
        });

    } catch (error) {
        console.log(error);
    }

    panelContenido.appendChild(contenedorCards);
}