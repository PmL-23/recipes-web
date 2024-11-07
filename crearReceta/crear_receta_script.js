const inicio = function ()
{
        visualizarPortada();
        agregarEtiqueta();
        agregarPaso();
        subirImagenPaso();
        mostrarCategoria();

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
                
                        const colCantidad = document.createElement("div");
                        colCantidad.classList.add("col-md-4", "mt-4");
                
                        const inputCantidad = document.createElement("input");
                        inputCantidad.classList.add("form-control");
                        inputCantidad.type = "text";
                        inputCantidad.name = "cantidad[]";
                        inputCantidad.placeholder = "400gr, una pizca...";
                
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
                
                        rowIngrediente.appendChild(colCantidad);
                        colCantidad.appendChild(inputCantidad);
                
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
        
        

        // Evento para actualizar la bandera al seleccionar un país
        document.querySelectorAll('.select-pais').forEach(select => {
                select.addEventListener('change', function() {
                        actualizarBandera(this);
                });
        });

        // Función para clonar el select con la funcionalidad de la bandera
        document.getElementById('agregar-pais').addEventListener('click', function() {
                const paisContainerOriginal = document.querySelector('.pais-container');
                const nuevoPaisContainer = paisContainerOriginal.cloneNode(true);

                // Limpia el nuevo select y la imagen
                const nuevoSelect = nuevoPaisContainer.querySelector('.select-pais');
                nuevoSelect.value = "";  // Restablece la selección
                const nuevaBandera = nuevoPaisContainer.querySelector('.bandera');
                nuevaBandera.src = "";

                nuevaBandera.classList.add("d-none")// Oculta la bandera en el nuevo select

                // Agrega el evento de cambio al nuevo select
                nuevoSelect.addEventListener('change', function() {
                        actualizarBandera(this);
                });

                //Agrego boton para quitar cada input de pais
                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("boton-secundario", "d-flex", "ms-2");
                quitarBoton.type = "button";
                quitarBoton.innerHTML = "<i class='bi bi-trash me-1'></i> Quitar";


                //borrar ingredientes (solo los creados por la función)
                quitarBoton.addEventListener("click", function () {
                        nuevoPaisContainer.remove();
                });

                nuevoPaisContainer.appendChild(quitarBoton);

                // Agrega el nuevo select al container
                document.getElementById('input-paises').appendChild(nuevoPaisContainer);
        });

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

                        errorPortada.textContent = "";
                        inputPortada.classList.remove("is-invalid");
                        inputPortada.classList.add("is-valid");

                        FlagValidacion = true;

                } else {

                        inputPortada.classList.remove("is-valid");

                        FlagValidacion = false;

                }
        });
                
        if (inputPortada.files.length === 0) {
                inputPortada.classList.add("is-invalid");
                errorPortada.textContent = "La foto de portada es requerida.";

                FlagValidacion = false;
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
                        titulo.classList.add("is-valid");
                        FlagValidacion = true;

                }else {
                        titulo.classList.remove("is-valid");
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
                titulo.classList.remove("is-valid");
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

                if (palabras.length > 2 || palabras.length < 50){
                        errorDescripcion.textContent = "";
                        descripcion.classList.remove("is-invalid");
                        descripcion.classList.add("is-valid");

                        FlagValidacion = true;

                }else {
                        descripcion.classList.remove("is-valid");

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
                descripcion.classList.remove("is-valid");

                FlagValidacion = false;
        }            
                

        return FlagValidacion;
}

function validarIngrediente() {

        let FlagValidacion = true;

        const ingrediente = document.getElementById("ingrediente");
        const ingredientev = ingrediente.value.trim(); 
        const errorIngrediente = document.getElementById("error-ingrediente");
                
        const palabras = ingredientev.split(" ").filter(palabra => palabra !== "");
        
        ingrediente.addEventListener("change", function(){   

                if (palabras.length > 0 || palabras.length < 15){

                        errorIngrediente.textContent = "";
                        ingrediente.classList.remove("is-invalid");
                        ingrediente.classList.add("is-valid");

                        FlagValidacion = true;

                }else {
                        ingrediente.classList.remove("is-valid");

                        FlagValidacion = false;
                }
                        
        });
        
        if (ingredientev === "") {
        
                errorIngrediente.textContent = "Debe ingresar un ingrediente.";
        
                ingrediente.classList.add("is-invalid");

                FlagValidacion = false;
        
        } else if (palabras.length > 15) {
        
                errorIngrediente.textContent = "Debe ingresar menos de 15 palabras"; 
                ingrediente.classList.add("is-invalid");
                ingrediente.classList.remove("is-valid");

                FlagValidacion = false;     
        }            

        return FlagValidacion;            
}

function validarPaso() {

        let FlagValidacion = true;

        const paso = document.querySelectorAll(".item-paso");

        paso.forEach(element => {

                const pasov = element.value.trim(); 
                const errorPaso = document.getElementById("error-paso");
                        
                const palabras = pasov.split(" ").filter(palabra => palabra !== "");
                
                element.addEventListener("change", function(){   

                        if (palabras.length > 4 || palabras.length < 30){

                                errorPaso.textContent = "";
                                element.classList.remove("is-invalid");
                                element.classList.add("is-valid");

                                FlagValidacion = true;
                        }else{
                                element.classList.remove("is-valid");

                                FlagValidacion = false;
                        }
                                
                });

                if (pasov === "") {

                        errorPaso.textContent = "Debe ingresar las instrucciones del paso.";
                        element.classList.remove("is-valid");
                        element.classList.add("is-invalid");

                        FlagValidacion = false;

                } else if (palabras.length < 4) {

                        errorPaso.textContent = "Debe ingresar al menos 4 palabras. Trate de detallar las intrucciones";
                        element.classList.add("is-invalid");
                        element.classList.remove("is-valid");

                        FlagValidacion = false;

                }else if (palabras.length > 30) {

                        errorPaso.textContent = "Debe ingresar menos de 30 palabras. Si necesitas detallar más agregue un nuevo paso";
                        element.classList.add("is-invalid");
                        element.classList.remove("is-valid");

                        FlagValidacion = false;

                }   
        });
          
        return FlagValidacion;   
}

function validarTiempo (){

        let FlagValidacion = true;

        const tiempo = document.getElementById("tiempo-elaboracion");
        const tiempov= tiempo.value;
        const errorTiempo = document.getElementById("error-tiempo");

       // console.log(tiempov);

        if (tiempov === "") {

                errorTiempo.textContent = "Debe ingresar el tiempo de elaboración";
                tiempo.classList.add("is-invalid");

                FlagValidacion = false;

        } else if (!isNaN(tiempo) && tiempov < 0) {

                errorTiempo.textContent = "Debe ingresar un numero mayor o igual a 1";
                tiempo.classList.add("is-invalid");
                tiempo.classList.remove("is-valid");

                FlagValidacion = false;

        }else{

                tiempo.classList.remove("is-invalid");
                tiempo.classList.add("is-valid");
                errorTiempo.textContent = "";

                FlagValidacion = true;

        }            


        return FlagValidacion;
}

function validarDificultad() {

        let FlagValidacion = true;

        const dificultad = document.getElementById("dificultad");
        const errorDificultad = document.getElementById("error-dificultad");
        const dificultadv = dificultad.value;
        
        if (dificultadv !== "Fácil" && dificultadv !== "Media" && dificultadv !== "Dificil") {

                errorDificultad.textContent = "Debes seleccionar la dificultad de elaboración.";
                dificultad.classList.add("is-invalid");
                dificultad.classList.remove("is-valid");

                FlagValidacion = false;

        } else {

                dificultad.classList.remove("is-invalid");
                dificultad.classList.add("is-valid");
                errorDificultad.textContent = ""; 

                FlagValidacion = true;
        }

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
        if( !validarTiempo() ) FlagValidacion = false;
        if( !validarDificultad() ) FlagValidacion = false;

        document.getElementById("dificultad").addEventListener("change", function(){

                if(!validarDificultad()){
                        FlagValidacion = false;
                }else{
                        FlagValidacion = true;
                }

        });

        return FlagValidacion;
}



const visualizarPortada = function (){   
        
        const img_preview = document.getElementById("preview-portada");
        const file_portada = document.getElementById("foto-portada");   

        file_portada.addEventListener("change",() => {
                img_preview.src = URL.createObjectURL(file_portada.files[0]);
                img_preview.classList.add("preview");      
        });

}
        
//Pais

function actualizarBandera(select) {

        const optionSeleccionado = select.options[select.selectedIndex];
        const imgUrl = optionSeleccionado.getAttribute('data-pais');
        const bandera = select.closest('.pais-container').querySelector('.bandera');

        if (imgUrl) {
                bandera.src = imgUrl;
                bandera.classList.remove("d-none")// Muestra la imagen si tiene URL
        } else {
                bandera.classList.add("d-none")// Oculta la imagen si no hay selección
        }
}

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

//Ingredientes



//Pasos
const agregarPaso = function() {
        const agregarPasoBoton = document.getElementById("agregar-paso");
        const pasosLista = document.getElementById("list-paso");

        agregarPasoBoton.addEventListener("click", function() {

                const numPaso = document.querySelectorAll(".li-paso");

                const newPasoLi = document.createElement("li");
                newPasoLi.classList.add("item-lista", "list-group-item", "li-paso");


                const newPasoDiv = document.createElement("div");
                newPasoDiv.classList.add("un_paso", "d-grid", "d-flex", "justify-content-end");
                
                newPasoDiv.innerHTML= ' <textarea class="form-control input-paso textarea-resize primer-paso" name="paso[]" placeholder="Ej: Mezcla los ingredientes en un bowl..." required></textarea> ';

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