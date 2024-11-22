const inicio = function ()
{
        agregarEtiqueta();
        agregarPaso();
        subirImagenPaso();
        mostrarCategoria();

        const visualizarPortada = function (){   
                const imgPreview = document.getElementById("preview-portada");
                const filePortada = document.getElementById("foto-portada");   
                
                        filePortada.addEventListener("change", () => {
                        if (filePortada.files && filePortada.files.length > 0) {
                                
                                imgPreview.src = URL.createObjectURL(filePortada.files[0]);
                                imgPreview.classList.add("preview");
                        } else {
        
                                imgPreview.src = "default-image.png";
                                imgPreview.classList.remove("preview");
                        }
                        });
                };
                
                visualizarPortada();

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
                
                fetch("obtener_ingredientes.php?ing=" + encodeURIComponent(ingreso))
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
        
        

        const agregarPaisBtn = document.getElementById('agregar-pais');
        let paisesSeleccionados = []; 
        let valorAnterior = null;
        
                
                function actualizarOpciones() {
                const selectPaises = document.querySelectorAll('.select-pais');
                selectPaises.forEach(select => {
                        const opciones = select.querySelectorAll('option');
                        opciones.forEach(opcion => {
                        
                        if (opcion.value !== "" && paisesSeleccionados.includes(opcion.value)) {
                                opcion.classList.add("d-none");
                        } else {
                                opcion.classList.remove("d-none");
                        }
                        });
                });
                }
                
                
                function manejarCambioSelect(event) {
                const select = event.target;
                const valorSeleccionado = select.value;
                
                
                if (valorAnterior !== "" && paisesSeleccionados.includes(valorAnterior)) {
                        const index = paisesSeleccionados.indexOf(valorAnterior);
                        if (index >= 0) {
                        paisesSeleccionados.splice(index, 1);
                        }
                }
                
                
                if (valorSeleccionado !== "" && !paisesSeleccionados.includes(valorSeleccionado)) {
                        paisesSeleccionados.push(valorSeleccionado);
                }
                
                
                actualizarBandera(select);
                actualizarOpciones();
                valorAnterior = valorSeleccionado;
                actualizarBotonAgregarPais();
                }
                
                

                function actualizarBandera(select) {

                        const optionSeleccionado = select.options[select.selectedIndex];
                        const imgUrl = optionSeleccionado.getAttribute('data-pais');
                        const bandera = select.closest('.pais-container').querySelector('.bandera');
                
                        if (imgUrl) {
                                bandera.src = imgUrl;
                                bandera.classList.remove("d-none");
                        } else {
                                bandera.classList.add("d-none");
                        }
                }
                
                
                
                function actualizarBotonAgregarPais() {
                const selectPaises = document.querySelectorAll('.select-pais');
                agregarPaisBtn.classList.toggle('d-none', selectPaises.length >= 3); 
                }
                
                
                const selectPaises = document.querySelectorAll('.select-pais');
                selectPaises.forEach(select => {
                select.addEventListener('focus', function () {
                        valorAnterior = select.value;
                });
                select.addEventListener('change', manejarCambioSelect);
                });
                
                
                agregarPaisBtn.addEventListener('click', function () {
                if (document.querySelectorAll('.select-pais').length >= 3) return; // Limitar a 3 selects
                
                const paisContainerOriginal = document.querySelector('.pais-container');
                const nuevoPaisContainer = paisContainerOriginal.cloneNode(true);
                const nuevoSelect = nuevoPaisContainer.querySelector('.select-pais');
                const nuevaBandera = nuevoPaisContainer.querySelector('.bandera');
                

                nuevoSelect.value = ""; 
                nuevaBandera.src = "";
                nuevaBandera.classList.add('d-none');
                

                nuevoSelect.addEventListener('focus', function () {
                        valorAnterior = nuevoSelect.value;
                });
                nuevoSelect.addEventListener('change', manejarCambioSelect);
                
                
                nuevoPaisContainer.appendChild(crearBotonQuitar(nuevoPaisContainer));
                document.getElementById('input-paises').appendChild(nuevoPaisContainer);
                
                
                actualizarOpciones();
                actualizarBotonAgregarPais(); 
                });

                function verTodosLosValores() {
        const selectPaises = document.querySelectorAll('.select-pais');
        selectPaises.forEach(select => {
                console.log("Valor del select", select, select.value); 
        });
        }


        agregarPaisBtn.addEventListener('click', function() {
        verTodosLosValores(); 
        });
                
                
                function crearBotonQuitar(container) {
                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("boton-secundario", "d-flex", "ms-2");
                quitarBoton.type = "button";
                quitarBoton.innerHTML = "<i class='bi bi-trash me-1'></i> Quitar";
                
                quitarBoton.addEventListener("click", function () {
                        const select = container.querySelector('.select-pais');
                        const valorSeleccionado = select.value;
                
                        
                        if (valorSeleccionado) {
                        const index = paisesSeleccionados.indexOf(valorSeleccionado);
                        if (index >= 0) {
                                paisesSeleccionados.splice(index, 1);
                        }
                        }
                
                
                        container.remove();
                
                
                        actualizarOpciones();
                        actualizarBotonAgregarPais();
                });
                
                return quitarBoton;
                }
        
        
        actualizarBotonAgregarPais();
        
                
        
        

        document.getElementById("frm-receta").addEventListener("keydown", function (e) {
                if (e.key === 'Enter') {
                e.preventDefault(); 
                }
        });

        document.getElementById("frm-receta").addEventListener("submit", function (e){
                e.preventDefault();

                let urlActual = window.location.href;
                let palabraClave = "recipes-web/";

        
                let indice = urlActual.indexOf(palabraClave);

                if (indice !== -1) {


                        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

                        if(validar() == true){

                                fetch(urlCortada + "crearReceta/form_crearReceta.php", {
                        
                                        method: "POST",
                                        body: new FormData(e.target)
                                })
                                .then(res => res.json())
                                .then(data => {
                        
                                        if (data.success == true) {
                                        console.log("Receta creada con éxito");
                                        window.location.href = "../recetas/receta-plantilla.php?id=" + data.nueva_receta_id;
                                        }else{
                                                console.log("Error al crear receta:", data.msj_error); 
                                                console.log('Errores:', data.errors);
                                                console.log('Errores:', data.errorsIng);
                                                console.log('Errores:', data.errorsPaso);
                                        }
                        
                                });
                                
                        }
                }

        });
};      

function validarPortada() {
        let FlagValidacion = true;

        const inputPortada = document.getElementById("foto-portada");
        const errorPortada = document.getElementById("errorPortada");

        inputPortada.addEventListener("change", function() {
                if (inputPortada.files.length > 0) {
                        const file = inputPortada.files[0];
                        const validImageTypes = ["image/gif", "image/jpeg", "image/png"];

                        if (validImageTypes.includes(file.type)) {
                                errorPortada.textContent = "";
                                inputPortada.classList.remove("is-invalid");
                                FlagValidacion = true;

                        } else {
                                errorPortada.textContent = "Debe seleccionar un archivo de imagen válido (gif, jpeg, png).";
                                inputPortada.classList.add("is-invalid");

                                FlagValidacion = false;
                        }
                } else {
                        errorPortada.textContent = "La foto de portada es requerida.";
                        inputPortada.classList.add("is-invalid");
                        FlagValidacion = false;
                }
        });

        if (inputPortada.files.length === 0) {
                errorPortada.textContent = "La foto de portada es requerida.";
                inputPortada.classList.add("is-invalid");

                FlagValidacion = false;
        } else {
                const file = inputPortada.files[0];
                const validImageTypes = ["image/gif", "image/jpeg", "image/png"];

                if (!validImageTypes.includes(file.type)) {
                        errorPortada.textContent = "Debe seleccionar un archivo de imagen válido (gif, jpeg, png).";
                        inputPortada.classList.add("is-invalid");

                        FlagValidacion = false;
                } else {
                        errorPortada.textContent = "";
                        inputPortada.classList.remove("is-invalid");
                        
                        FlagValidacion = true;
                }
        }

        return FlagValidacion;
}



function validarTitulo() {

        let FlagValidacion = true;

        const titulo = document.getElementById("titulo")
        const titulov= titulo.value.trim();
        const errorTitulo = document.getElementById("error-titulo");
                errorTitulo.textContent = "";
        
        const palabras = titulov.split(" ").filter(palabra => palabra !== "");
        
        titulo.addEventListener("change", function(){     

                if (palabras.length > 1 || palabras.length < 50){

                        errorTitulo.textContent = "";
                        titulo.classList.remove("is-invalid");
                        FlagValidacion = true;

                }else {
                        FlagValidacion = false;
                }
                
        });

        if (titulov === "") {

                errorTitulo.textContent = "Debe ingresar un título.";
                titulo.classList.add("is-invalid");
                FlagValidacion = false;

        } else if (palabras.length < 1 || palabras.length > 50) {

                errorTitulo.textContent = "Debe ingresar entre 1 a 50 palabras.";
                titulo.classList.add("is-invalid");
                FlagValidacion = false;
        }
        
        return FlagValidacion;
        
}
        


function validarDescripcion() {

        let FlagValidacion = true;

        const descripcion = document.getElementById("descripcion");
        const descripcionv = descripcion.value.trim(); 
        const errorDescripcion = document.getElementById("error-descripcion");
                
        const palabras = descripcionv.split(" ").filter(palabra => palabra !== "");
        
        descripcion.addEventListener("change", function(){   

                if (palabras.length > 2 || palabras.length < 100){
                        errorDescripcion.textContent = "";
                        descripcion.classList.remove("is-invalid");
                        FlagValidacion = true;

                }else {
                        descripcion.classList.add("is-invalid");
                        FlagValidacion = false;
                }
                        
        });
                
        if (descripcionv === "") {

                errorDescripcion.textContent = "Debe ingresar una descripción.";
                descripcion.classList.add("is-invalid");

                FlagValidacion = false;

        } else if (palabras.length < 2 ||palabras.length > 100) {

                errorDescripcion.textContent = "Debe ingresar entre 2 a 100 palabras.";
                descripcion.classList.add("is-invalid");

                FlagValidacion = false;
        }            
                

        return FlagValidacion;
}

function validarIngrediente() {
        const ingredientes = document.querySelectorAll(".ingrediente-input");
        let FlagValidacion = true; 

        ingredientes.forEach(function (ingrediente) {
                const errorIngrediente = ingrediente.parentElement.querySelector(".error-ingrediente");
                errorIngrediente.textContent = "";
        
                ingrediente.addEventListener("change", function() { 
                        const ingredienteValue = ingrediente.value;
                        const palabras = ingredienteValue.split(" ").filter(palabra => palabra !== "");
        
                        if (ingredienteValue === "") {
                                errorIngrediente.textContent = "Debe ingresar un ingrediente.";
                                ingrediente.classList.add("is-invalid");
                                FlagValidacion = false;

                        } else if (palabras.length < 1 || palabras.length > 14) {
                                errorIngrediente.textContent = "Debe ingresar entre 1 a 15 palabras.";
                                ingrediente.classList.add("is-invalid");
                                FlagValidacion = false;

                        } else {
                                ingrediente.classList.remove("is-invalid");
                                errorIngrediente.textContent = "";
                                FlagValidacion = true;
                        }
                });
        
                const ingredienteValue = ingrediente.value;
                const palabras = ingredienteValue.split(" ").filter(palabra => palabra !== "");
        
                if (ingredienteValue === "") {
                        errorIngrediente.textContent = "Debe ingresar un ingrediente.";
                        ingrediente.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (palabras.length < 1 || palabras.length > 14) {
                        errorIngrediente.textContent = "Debe ingresar entre 1 a 15 palabras.";
                        ingrediente.classList.add("is-invalid");
                        FlagValidacion = false;

                } else {
                        ingrediente.classList.remove("is-invalid");
                        errorIngrediente.textContent = "";
                }
        });

        return FlagValidacion;
}


function validarCantidad() {
        const cantidades = document.querySelectorAll(".cantidad-input");
        let FlagValidacion = true; 

        cantidades.forEach(function (cantidad) {
                const errorCantidad = cantidad.parentElement.querySelector(".error-ingrediente-cantidad");
                errorCantidad.textContent = "";
        
                cantidad.addEventListener("change", function() { 
                        const cantidadValue = cantidad.value;
                        const palabras = cantidadValue.split(" ").filter(palabra => palabra !== "");
        
                        if (cantidadValue === "") {
                                errorCantidad.textContent = "Debe ingresar un cantidad.";
                                cantidad.classList.add("is-invalid");
                                FlagValidacion = false;

                        } else if (palabras.length < 1 || palabras.length > 24) {
                                errorCantidad.textContent = "Debe ingresar entre 1 a 25 palabras.";
                                cantidad.classList.add("is-invalid");
                                FlagValidacion = false;

                        } else {
                                cantidad.classList.remove("is-invalid");
                                errorCantidad.textContent = "";
                                FlagValidacion = true;
                        }
                });
        
                const cantidadValue = cantidad.value;
                const palabras = cantidadValue.split(" ").filter(palabra => palabra !== "");
        
                if (cantidadValue === "") {
                        errorCantidad.textContent = "Debe ingresar una cantidad.";
                        cantidad.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (palabras.length < 1 || palabras.length > 24) {
                        errorCantidad.textContent = "Debe ingresar entre 1 a 25 palabras.";
                        cantidad.classList.add("is-invalid");
                        FlagValidacion = false;

                } else {
                        cantidad.classList.remove("is-invalid");
                        errorCantidad.textContent = "";
                }
        });

        return FlagValidacion;
}


function validarPaso() {
        let FlagValidacion = true;
        const pasos = document.querySelectorAll(".input-paso");

        pasos.forEach(function (paso) {
        const errorPaso = paso.parentElement.querySelector(".error-paso");
        errorPaso.textContent = "";

        paso.addEventListener("input", function() {  
                const pasov = paso.value.trim();
                const palabras = pasov.split(" ").filter(palabra => palabra !== "");

                if (pasov === "") {
                        errorPaso.textContent = "Debe ingresar las instrucciones del paso.";
                        paso.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (palabras.length < 4) {
                        errorPaso.textContent = "Debe ingresar al menos 4 palabras. Trate de detallar las instrucciones.";
                        paso.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (palabras.length > 30) {
                        errorPaso.textContent = "Debe ingresar menos de 30 palabras. Si necesita detallar más, agregue un nuevo paso.";
                        paso.classList.add("is-invalid");
                        FlagValidacion = false;

                } else {
                        errorPaso.textContent = "";
                        paso.classList.remove("is-invalid");
                        FlagValidacion = true;
                }
        });


                const pasov = paso.value.trim();
                const palabras = pasov.split(" ").filter(palabra => palabra !== "");

                if (pasov === "") {
                        errorPaso.textContent = "Debe ingresar las instrucciones del paso.";
                        paso.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (palabras.length < 4) {
                        errorPaso.textContent = "Debe ingresar al menos 4 palabras. Trate de detallar las instrucciones.";
                        paso.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (palabras.length > 30) {
                        errorPaso.textContent = "Debe ingresar menos de 30 palabras. Si necesita detallar más, agregue un nuevo paso.";
                        paso.classList.add("is-invalid");
                        FlagValidacion = false;

                } else {
                        errorPaso.textContent = "";
                        paso.classList.remove("is-invalid");
                        FlagValidacion = true;
                }
        });

        return FlagValidacion;
}



function validarImagenPaso() {
        let FlagValidacion = true;

        const imagenes = document.querySelectorAll(".file-paso");

        imagenes.forEach(function(imagen) {       
                const errorImagen = imagen.parentElement.querySelector(".error-imagen-paso");
                errorImagen.textContent = "";

                imagen.addEventListener("change", function() {
                        if (imagen.files.length > 0) {
                        const file = imagen.files[0];
                        const validImageTypes = ["image/gif", "image/jpeg", "image/png"];

                                if (!validImageTypes.includes(file.type)) {
                                        errorImagen.textContent = "Debe seleccionar un archivo de imagen válido (gif, jpeg, png).";
                                        imagen.classList.add("is-invalid");

                                        FlagValidacion = false;
                                } else {
                                        errorImagen.textContent = "";
                                        imagen.classList.remove("is-invalid");
                                        
                                        FlagValidacion = true;
                                } 
                        }
                });


                if (imagen.files.length > 0) {
                        const file = imagen.files[0];
                        const validImageTypes = ["image/gif", "image/jpeg", "image/png"];

                        if (!validImageTypes.includes(file.type)) {
                                errorImagen.textContent = "Debe seleccionar un archivo de imagen válido (gif, jpeg, png).";
                                imagen.classList.add("is-invalid");

                                FlagValidacion = false;
                        } else {
                                errorImagen.textContent = "";
                                imagen.classList.remove("is-invalid");
                                
                                FlagValidacion = true;
                        } 
                }
        });

        return FlagValidacion;
}



function validarTiempo() {
        let FlagValidacion = true;

        const tiempo = document.getElementById("tiempo-elaboracion");
        const errorTiempo = document.getElementById("error-tiempo");

        
        tiempo.addEventListener("input", function() {
                const tiempov = tiempo.value;

                if (tiempov === "") {
                        errorTiempo.textContent = "Debe ingresar el tiempo de elaboración";
                        tiempo.classList.add("is-invalid");
                        FlagValidacion = false;

                }else if (tiempov < 1) {
                        errorTiempo.textContent = "Debe ingresar un número mayor o igual a 1";
                        tiempo.classList.add("is-invalid");
                        FlagValidacion = false;
                        
                } else {
                        tiempo.classList.remove("is-invalid");
                        errorTiempo.textContent = "";
                        FlagValidacion = true;
                }
        });

        const tiempov = tiempo.value;
        if (tiempov === "") {
                errorTiempo.textContent = "Debe ingresar el tiempo de elaboración";
                tiempo.classList.add("is-invalid");
                FlagValidacion = false;
        } else if (tiempov < 1) {
                errorTiempo.textContent = "Debe ingresar un número mayor o igual a 1";
                tiempo.classList.add("is-invalid");
                FlagValidacion = false;
        } else {
                tiempo.classList.remove("is-invalid");
                errorTiempo.textContent = "";
                FlagValidacion = true;
        }

        return FlagValidacion;
}

function validarUnidadTiempo() {
        const selectUnidad = document.getElementById("tiempo-unidad");
        const errorUnidad = document.getElementById("error-unidad");
        let FlagValidacion = true;

        const minutoHora = ["min", "hora"];

        selectUnidad.addEventListener("change", function() {
        if (!minutoHora.includes(selectUnidad.value)) {
                errorUnidad.textContent = "Debe seleccionar una unidad de tiempo válida";
                selectUnidad.classList.add("is-invalid");
                FlagValidacion = false;

        } else {
                errorUnidad.textContent = "";
                selectUnidad.classList.remove("is-invalid");
                FlagValidacion = true;

        }
        });


        if (!minutoHora.includes(selectUnidad.value)) {
                errorUnidad.textContent = "Debe seleccionar una unidad de tiempo válida";
                selectUnidad.classList.add("is-invalid");
                FlagValidacion = false;

        } else {
                errorUnidad.textContent = "";
                selectUnidad.classList.remove("is-invalid");

        }

        return FlagValidacion;
}



function validarDificultad() {
        let FlagValidacion = true;

        const dificultad = document.getElementById("dificultad");
        const errorDificultad = document.getElementById("error-dificultad");

        
        dificultad.addEventListener("change", function() {
                const dificultadv = dificultad.value;

                if (dificultadv === "") {
                        errorDificultad.textContent = "Debes seleccionar la dificultad de elaboración.";
                        dificultad.classList.add("is-invalid");
                        FlagValidacion = false;

                } else if (dificultadv !== "Fácil" && dificultadv !== "Media" && dificultadv !== "Dificil") {
                        errorDificultad.textContent = "Debes seleccionar una dificultad válida";
                        dificultad.classList.add("is-invalid");
                        FlagValidacion = false;

                } else {
                        dificultad.classList.remove("is-invalid");
                        errorDificultad.textContent = "";  
                        FlagValidacion = true;
                }
        });

        
        const dificultadv = dificultad.value;
        if (dificultadv === "") {
                errorDificultad.textContent = "Debes seleccionar la dificultad de elaboración.";
                dificultad.classList.add("is-invalid");
                FlagValidacion = false;

        } else if (dificultadv !== "Fácil" && dificultadv !== "Media" && dificultadv !== "Dificil") {
                errorDificultad.textContent = "Debes seleccionar una dificultad válida.";
                dificultad.classList.add("is-invalid");
                FlagValidacion = false;

        } else {
                dificultad.classList.remove("is-invalid");
                errorDificultad.textContent = "";  
                FlagValidacion = true;
        }

        return FlagValidacion;
}



function validarCategoria() {
        let FlagValidacion = true;

        const categoria = document.getElementById("categoria");
        const errorCategoria = document.getElementById("error-categoria");


        categoria.addEventListener("change", function () {

        if (categoria.value === "") {
                errorCategoria.textContent = "Seleccione una categoría";
                categoria.classList.add("is-invalid"); 
                FlagValidacion = false;

        } else {
                categoria.classList.remove("is-invalid");
                errorCategoria.textContent = "";
                FlagValidacion = true;
        }
        });


        if (categoria.value === "") {
                errorCategoria.textContent = "Seleccione un categoría";
                categoria.classList.add("is-invalid");
                FlagValidacion = false;

        } else {
                categoria.classList.remove("is-invalid");
                errorCategoria.textContent = "";
                FlagValidacion = true;
        }

        return FlagValidacion;
}




function validarPaises() {
        const paises = document.querySelectorAll(".select-pais");
        let FlagValidacion = true; 

        paises.forEach(function (pais) {
                const errorPais = pais.parentElement.querySelector(".error-pais");
                errorPais.textContent = "";

                pais.addEventListener("change", function(){   
                        if (pais.value === "") {
                                errorPais.textContent = "Seleccione un país";
                                pais.classList.add("is-invalid");
                                FlagValidacion = false; 

                        } else {
                                pais.classList.remove("is-invalid");
                                errorPais.textContent = "";
                                FlagValidacion = true;
                        }

                });

                if (pais.value === "") {
                        errorPais.textContent = "Seleccione un país";
                        pais.classList.add("is-invalid");
                        FlagValidacion = false; 

                } else {
                        pais.classList.remove("is-invalid");
                        errorPais.textContent = "";
                        FlagValidacion = true;
                }
        
        });

        return FlagValidacion;
}

function validarEtiquetas() {
        const etiquetas = document.querySelectorAll(".select-etiqueta");
        let FlagValidacion = true; 

        etiquetas.forEach(function (etiqueta) {
                const errorEtiqueta = etiqueta.parentElement.querySelector(".error-etiqueta");
                errorEtiqueta.textContent = "";
                etiqueta.addEventListener("change", function(){   
                        if (etiqueta.value === "") {
                                errorEtiqueta.textContent = "Seleccione una etiqueta";
                                etiqueta.classList.add("is-invalid");
                                FlagValidacion = false; 

                        } else {
                                etiqueta.classList.remove("is-invalid");
                                errorEtiqueta.textContent = "";
                                FlagValidacion = true;
                        }

                });

                if (etiqueta.value === "") {
                        errorEtiqueta.textContent = "Seleccione una etiqueta";
                        etiqueta.classList.add("is-invalid");
                        FlagValidacion = false; 
                        
                } else {
                        etiqueta.classList.remove("is-invalid");
                        errorEtiqueta.textContent = "";
                        FlagValidacion = true;
                }
        
        });

        return FlagValidacion;
}




function validar() {

        let FlagValidacion = true;

        //Valido retorno de funciones
        if( !validarPortada() ) FlagValidacion = false;
        if( !validarTitulo() ) FlagValidacion = false;
        if( !validarDescripcion() ) FlagValidacion = false;
        if( !validarIngrediente() ) FlagValidacion = false;
        if( !validarPaso() ) FlagValidacion = false;
        if( !validarImagenPaso() ) FlagValidacion = false;
        if( !validarTiempo() ) FlagValidacion = false;
        if( !validarUnidadTiempo() ) FlagValidacion = false;
        if( !validarDificultad() ) FlagValidacion = false;
        if( !validarCategoria() ) FlagValidacion = false;
        if( !validarPaises() ) FlagValidacion = false;
        if( !validarEtiquetas() ) FlagValidacion = false;
        if( !validarCantidad() ) FlagValidacion = false;


        return FlagValidacion;
}




        
//Pais


//Categoria
const mostrarCategoria = function () {       

        const selectCat = document.getElementById("categoria");
        const tagCategoria = document.getElementById("tag-categoria");
        
        selectCat.addEventListener("change", function () {

                const selectCatIndex = selectCat.options[selectCat.selectedIndex]; 
                const catSeleccionada = selectCatIndex.textContent;
        
                if (catSeleccionada) {
                        tagCategoria.classList.remove("d-none");
                        tagCategoria.textContent = catSeleccionada; 
                } else {
                        tagCategoria.classList.add("d-none");
                        tagCategoria.textContent = ""; 
                }
        });
}

//Etiquetas
const agregarEtiqueta = function()
{

        const agregarEtiquetaBoton = document.getElementById("agregar-etiqueta");
        const etiquetaInput = document.getElementById("item-etiqueta");

        agregarEtiquetaBoton.addEventListener("click", function () {

                const nuevoInputEtiqueta = etiquetaInput.cloneNode(true);

                nuevoInputEtiqueta.classList.remove("flex-column");
                nuevoInputEtiqueta.classList.add("flex-row");

                document.getElementById("etiquetas").appendChild(nuevoInputEtiqueta);

                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("boton-secundario", "d-flex");
                quitarBoton.type = "button";
                quitarBoton.innerHTML = "<i class='bi bi-trash me-1'></i> Quitar";
        
                //borrar ingredientes (solo los creados por la función)
                quitarBoton.addEventListener("click", function () {
                        nuevoInputEtiqueta.remove();
                });

                nuevoInputEtiqueta.appendChild(quitarBoton);
        });
}




//Pasos
const agregarPaso = function() {
        const agregarPasoBoton = document.getElementById("agregar-paso");
        const pasosLista = document.getElementById("list-paso");

        agregarPasoBoton.addEventListener("click", function() {

                const numPaso = document.querySelectorAll(".li-paso");

                const newPasoLi = document.createElement("li");
                newPasoLi.classList.add("item-lista", "list-group-item", "li-paso");


                const newPasoDiv = document.createElement("div");
                newPasoDiv.classList.add("un_paso", "d-grid", "gap-2", "flex-column", "d-flex", "justify-content-end");
                
                const textPaso = document.createElement("textarea");
                textPaso.classList.add("form-control", "input-paso", "textarea-resize", "primer-paso");
                textPaso.name = "paso[]";
                textPaso.placeholder = "Ej: Mezcla los ingredientes en un bowl..."; 

                const errorPaso = document.createElement("small");
                errorPaso.classList.add("text-danger","error-paso")

                const divBoton = document.createElement("div");
                divBoton.classList.add("d-grid", "d-flex", "justify-content-end", "mt-2");
        
                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("boton-secundario", "d-flex");
                quitarBoton.type = "button";
                quitarBoton.innerHTML = "<i class='bi bi-trash me-1'></i> Quitar";
        
                quitarBoton.addEventListener("click", function() {
                        newPasoLi.remove();
                });
        
                newPasoLi.appendChild(newPasoDiv);
                newPasoLi.appendChild(divBoton);
                newPasoDiv.appendChild(textPaso);
                newPasoDiv.appendChild(errorPaso);
                divBoton.appendChild(quitarBoton);
        

                const newElementoPasoDiv = document.createElement("div");
                newElementoPasoDiv.classList.add("elementos-paso", "d-grid", "gap-2", "d-md-flex", "justify-content-md-start");
        
                newPasoLi.appendChild(newElementoPasoDiv);
        
                const newCElemento = document.createElement("div");
                newCElemento.classList.add("contenedor-paso-img");
        
                newElementoPasoDiv.appendChild(newCElemento);
        
                const imgSrc = document.createElement("img");
                imgSrc.src = "default-image.png";
                imgSrc.classList.add("img-paso", "border", "rounded", "img-fluid");
        
                const inputFile = document.createElement("input");
                inputFile.type = "file";
                inputFile.setAttribute("multiple", "");
                inputFile.name = `imagenes_paso${numPaso.length + 2}[]`;
                inputFile.classList.add("form-control", "mt-2", "file-paso");

                const errorImagenFile = document.createElement("small");
                errorImagenFile.classList.add("text-danger","error-imagen-paso");
        
                const quitarBotonImagen = document.createElement("button");
                quitarBotonImagen.type = "button";
                quitarBotonImagen.innerHTML = "<i class='bi bi-trash me-1'></i>Quitar Imagen";
                quitarBotonImagen.classList.add("boton-secundario", "d-flex", "mt-2", "d-none");
                
        
                inputFile.addEventListener("change", function() {

                        if (inputFile.files.length > 0) {
                                imgSrc.src = URL.createObjectURL(inputFile.files[0]);
                                quitarBotonImagen.classList.remove("d-none");
                        } else {
                                imgSrc.src = "default-image.png";
                                quitarBotonImagen.classList.add("d-none");
                        }
                });

                quitarBotonImagen.addEventListener("click", function() {

                        inputFile.value = "";
                        imgSrc.src = "default-image.png";
                        quitarBotonImagen.classList.add("d-none");
                });

                newCElemento.appendChild(imgSrc);
                newCElemento.appendChild(inputFile);
                newCElemento.appendChild(errorImagenFile);
                newCElemento.appendChild(quitarBotonImagen);
                pasosLista.appendChild(newPasoLi);
        });
}


const subirImagenPaso = function () {
        const imgPasoPreview = document.querySelector(".img-paso-id");
        const filePaso = document.querySelector(".file-paso");
        const imagenPredeterminada = "default-image.png";
        const botonQuitarImagen = document.querySelector(".quitar-imagen");

        imgPasoPreview.src = imagenPredeterminada;

        filePaso.addEventListener("change", function () {
                if (filePaso.files.length > 0) 
                {
                        imgPasoPreview.src = URL.createObjectURL(filePaso.files[0]);
                        imgPasoPreview.classList.add("img-paso");

                        botonQuitarImagen.classList.remove("d-none");// Muestra el botón
                        botonQuitarImagen.classList.add("d-inline-block");

                }
                botonQuitarImagen.addEventListener("click", function () {
                        filePaso.value = "";
                        imgPasoPreview.src = imagenPredeterminada;
                        botonQuitarImagen.classList.add("d-none"); // Oculta el botón
                });
        });
};




window.onload = inicio;