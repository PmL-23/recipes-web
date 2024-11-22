const agregarIngrediente = function () {
        const agregarBoton = document.getElementById("agregar-ing");
        const ingredientesContainer = document.getElementById("ingredientes");
        let ingredienteContador = 0; 


        const primerInput = document.querySelector(".ingrediente-input");
        if (primerInput) {
                primerInput.addEventListener('keyup', function () {
                obtenerSugerencias(this.value, primerInput.nextElementSibling);
                });
        }
        
        agregarBoton.addEventListener("click", function () {
                ingredienteContador++; 
        
                const rowIngrediente = document.createElement("div");
                rowIngrediente.classList.add("row", "container-fluid");
        
                const colIngrediente = document.createElement("div");
                colIngrediente.classList.add("col-md-6", "mt-4");
        
                const inputIngrediente = document.createElement("input");
                inputIngrediente.type = "text";
                inputIngrediente.classList.add("form-control", "ingrediente-input");
                inputIngrediente.name = "ingrediente[]";
                inputIngrediente.placeholder = "Harina, Sal...";
                
                const searchDiv = document.createElement("div");
                searchDiv.classList.add("search-ingrediente");
                searchDiv.id = `search-ingrediente-${ingredienteContador}`; 

                const errorIngredienteDiv = document.createElement("div");
                const errorIngrediente = document.createElement("small");
                errorIngrediente.classList.add("text-danger","error-ingrediente");
                
        
                const colCantidad = document.createElement("div");
                colCantidad.classList.add("col-md-4", "mt-4");
        
                const inputCantidad = document.createElement("input");
                inputCantidad.classList.add("form-control","cantidad-input");
                inputCantidad.type = "text";
                inputCantidad.name = "cantidad[]";
                inputCantidad.placeholder = "400gr, una pizca...";

                const errorCantidadDiv = document.createElement("div");
                const errorCantidad = document.createElement("small");
                errorCantidad.classList.add("text-danger","error-ingrediente-cantidad");
        
                const colQuitar = document.createElement("div");
                colQuitar.classList.add("col-md-2", "mt-4","d-flex", "justify-content-end");
        
                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("boton-secundario");
                quitarBoton.type = "button";
                quitarBoton.innerHTML = "<i class='bi bi-trash me-1'></i> Quitar";
        
                quitarBoton.addEventListener("click", function () {
                rowIngrediente.remove();
                });
        
                rowIngrediente.appendChild(colIngrediente);
                colIngrediente.appendChild(inputIngrediente);
                colIngrediente.appendChild(searchDiv);  
                errorIngredienteDiv.appendChild(errorIngrediente);
                colIngrediente.appendChild(errorIngredienteDiv);
        
                rowIngrediente.appendChild(colCantidad);
                colCantidad.appendChild(inputCantidad);
                errorCantidadDiv.appendChild(errorCantidad);
                colCantidad.appendChild(errorCantidadDiv);
                
                rowIngrediente.appendChild(colQuitar);
                colQuitar.appendChild(quitarBoton);
        
                ingredientesContainer.appendChild(rowIngrediente);
        


                inputIngrediente.addEventListener('keyup', function () {
                obtenerSugerencias(this.value, searchDiv);
                });

                inputIngrediente.addEventListener("keydown", function (e) {
                        if (e.key === 'Enter') {
                        e.preventDefault(); 
                        limpiarDiv(searchDiv.id); 
                        }
                });
        });
}


function limpiarDiv(searchDiv) {
    searchDiv.innerHTML = ""; //limpiar los divs
}

const mostrarIngredientes = function (data, searchDiv) {
        limpiarDiv(searchDiv);
        let selectIng = document.createElement("select");
        selectIng.classList.add("form-select");
        selectIng.size = 3;
        
        if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                let opcionIng = document.createElement("option");
                opcionIng.textContent = data[i].nombre;
                opcionIng.value = data[i].id_ingrediente;
                selectIng.appendChild(opcionIng);
                }
        } else {
                selectIng.classList.add("d-none");
        }

        searchDiv.appendChild(selectIng); //agregar al div el select
        

        //si cambia el select poner la opción en el input
        selectIng.addEventListener('change', function () {
                let selectedValue = this.value;        
                let inputIngrediente = searchDiv.previousElementSibling; 
                if (inputIngrediente) {
                        inputIngrediente.value = this.options[this.selectedIndex].textContent;
                        inputIngrediente.data = selectedValue;
                        inputIngrediente.setAttribute('data-id', selectedValue); 
                        limpiarDiv(searchDiv); 
                        }
                });
}


function obtenerSugerencias(ingreso, searchDiv) {
if (ingreso.length === 0) {
        limpiarDiv(searchDiv);
        return;
}

fetch("../crearReceta/obtener_ingredientes.php?ing=" + encodeURIComponent(ingreso))
        .then(response => response.json())
        .then(data => {
                mostrarIngredientes(data, searchDiv);
        })
        .catch(error => {
                console.error('Error:', error);
        });
}

//agrego los ingredientes después de darle las funcionalidades
agregarIngrediente();
