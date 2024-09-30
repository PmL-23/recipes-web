const inicio = function ()
{
        visualizarPortada();
        agregarIngrediente();
        agregarPaso ();
        subirImagenPaso();
        visualizarBandera();

        validar();

}

function validarPortada() {
        const inputPortada = document.getElementById("foto-portada");
        const errorPortada = document.getElementById("errorPortada");
        
        inputPortada.addEventListener("change", function() {
                if (inputPortada.files.length > 0) {
                        errorPortada.textContent = "";
                        inputPortada.classList.remove("is-invalid");
                        inputPortada.classList.add("is-valid");
                        } else {
                        inputPortada.classList.remove("is-valid");
                        }
        });
                
                if (inputPortada.files.length === 0) {
                        inputPortada.classList.add("is-invalid");
                        errorPortada.textContent = "La foto de portada es requerida.";
                }
}


function validarTitulo() {
        const titulo = document.getElementById("titulo")
        const titulov= titulo.value.trim();
        const errorTitulo = document.getElementById("error-titulo");
        errorTitulo.textContent = "";
        
                const palabras = titulov.split(" ").filter(palabra => palabra !== "");
        
        titulo.addEventListener("change", function()
        {      
                if (palabras.length > 1 ||palabras.length < 50)
                {
                        errorTitulo.textContent = "";
                        titulo.classList.remove("is-invalid");
                        titulo.classList.add("is-valid");
                }else {
                        titulo.classList.remove("is-valid");
                }
                
        });
                if (titulov === "") {
                errorTitulo.textContent = "Debe ingresar un título.";
                titulo.classList.add("is-invalid");
                } else if (palabras.length < 1 ||palabras.length > 50) {
                errorTitulo.textContent = "Debe ingresar entre 1 a 50 palabras.";
                titulo.classList.add("is-invalid");
                titulo.classList.remove("is-valid");
                }            
        
}
        


function validarDescripcion() {
        const descripcion = document.getElementById("descripcion");
        const descripcionv = descripcion.value.trim(); 
        const errorDescripcion = document.getElementById("error-descripcion");
                
        const palabras = descripcionv.split(" ").filter(palabra => palabra !== "");
        
        descripcion.addEventListener("change", function()
        {   
                if (palabras.length > 3 ||palabras.length < 50)
                        {
                                errorDescripcion.textContent = "";
                                descripcion.classList.remove("is-invalid");
                                descripcion.classList.add("is-valid");
                        }else {
                                descripcion.classList.remove("is-valid");
                        }
                        
                });
                        if (descripcionv === "") {
                        errorDescripcion.textContent = "Debe ingresar una descripción.";
                        descripcion.classList.add("is-invalid");
                        } else if (palabras.length < 3 ||palabras.length > 100) {
                        errorDescripcion.textContent = "Debe ingresar entre 3 a 100 palabras.";
                        descripcion.classList.add("is-invalid");
                        descripcion.classList.remove("is-valid");
                        }            
                
}

function validarIngrediente() {
        const ingrediente = document.getElementById("primer-ingrediente");
        const ingredientev = ingrediente.value.trim(); 
        const errorIngrediente = document.getElementById("error-ingrediente");
                
        const palabras = ingredientev.split(" ").filter(palabra => palabra !== "");
        
        ingrediente.addEventListener("change", function()
        {   
                if (palabras.length > 2 ||palabras.length < 15)
                        {
                                errorIngrediente.textContent = "";
                                ingrediente.classList.remove("is-invalid");
                                ingrediente.classList.add("is-valid");
                        }else {
                                ingrediente.classList.remove("is-valid");
                        }
                        
                });
                        if (ingredientev === "") {
                        errorIngrediente.textContent = "Debe ingresar un ingrediente.";
                        ingrediente.classList.add("is-invalid");
                        } else if (palabras.length < 2 ||palabras.length > 15) {
                        errorIngrediente.textContent = "Debe ingresar entre 2 a 15 palabras. Podes escribir el nombre del ingrediente y la cantidad que utilizaste";
                        ingrediente.classList.add("is-invalid");
                        ingrediente.classList.remove("is-valid");
                        }            
                
}

function validarPaso() {
        const paso = document.getElementById("primer-paso");
        const pasov = paso.value.trim(); 
        const errorPaso = document.getElementById("error-paso");
                
        const palabras = pasov.split(" ").filter(palabra => palabra !== "");
        
        paso.addEventListener("change", function()
        {   
                if (palabras.length > 4 ||palabras.length < 30)
                {
                        errorPaso.textContent = "";
                        paso.classList.remove("is-invalid");
                        paso.classList.add("is-valid");
                }else{
                        paso.classList.remove("is-valid");
                }
                        
        });
                if (pasov === "") {
                errorPaso.textContent = "Debe ingresar las instrucciones del paso.";
                paso.classList.remove("is-valid");
                paso.classList.add("is-invalid");
                } else if (palabras.length < 4) {
                        errorPaso.textContent = "Debe ingresar al menos 4 palabras. Trate de detallar las intrucciones";
                        paso.classList.add("is-invalid");
                        paso.classList.remove("is-valid");
                }
                else if (palabras.length > 30) {
                        errorPaso.textContent = "Debe ingresar menos de 30 palabras. Si necesitas detallar más agregue un nuevo paso";
                        paso.classList.add("is-invalid");
                        paso.classList.remove("is-valid");
                }            
                
}

function validarTiempo ()
{
        const tiempo = document.getElementById("tiempo-elaboracion");
        const tiempov= tiempo.value;
        const errorTiempo = document.getElementById("error-tiempo");

       // console.log(tiempov);

                        if (tiempov === "") {
                        errorTiempo.textContent = "Debe ingresar el tiempo de elaboración";
                        tiempo.classList.add("is-invalid");
                        } else if (!isNaN(tiempo) && tiempov < 0) {
                        errorTiempo.textContent = "Debe ingresar un numero mayor o igual a 1";
                        tiempo.classList.add("is-invalid");
                        tiempo.classList.remove("is-valid");
                        }else{
                                tiempo.classList.remove("is-invalid");
                                tiempo.classList.add("is-valid");
                                errorTiempo.textContent = "";
                        }            
}

function validarDificultad() {
        const dificultad = document.getElementById("dificultad");
        const errorDificultad = document.getElementById("error-dificultad");
        const dificultadv = dificultad.value;
        
                if (dificultadv !== "facil" && dificultadv !== "media" && dificultadv !== "dificil") {
                errorDificultad.textContent = "Debes seleccionar la dificultad de elaboración.";
                dificultad.classList.add("is-invalid");
                dificultad.classList.remove("is-valid");
                } else {
                dificultad.classList.remove("is-invalid");
                dificultad.classList.add("is-valid");
                errorDificultad.textContent = ""; 
                }

}


function validar() {
        let enviar = document.getElementById("btn-publicar");
        enviar.addEventListener("click", function (event) {
        
                event.preventDefault();

                //Funciones
                validarPortada();
                validarTitulo();
                validarDescripcion();
                validarIngrediente();
                validarPaso();
                validarTiempo();
                validarDificultad();
                document.getElementById("dificultad").addEventListener("change", validarDificultad);

                
                });


}



const visualizarPortada = function ()
{   
        const img_preview = document.getElementById("preview-portada");
        const file_portada = document.getElementById("foto-portada");   

        file_portada.addEventListener("change",() => {
        img_preview.src= URL.createObjectURL(file_portada.files[0]);
        img_preview.classList.add("preview");      
});

}

const visualizarBandera = function ()
{   
        const imgBandera= document.getElementById("banderita");
        const selectPais = document.getElementById("select-pais");   

        selectPais.addEventListener("change",function () {

                const paisSeleccionado = selectPais.value;

                if (paisSeleccionado === "sin") {
                        imgBandera.classList.add("d-none");
                        imgBandera.src = "";
                        return;
                }
                imgBandera.classList.remove("d-none");
                
                if (paisSeleccionado === "arg") 
                {
                        imgBandera.src = "../svg/argentina.svg";
                }
                else if (paisSeleccionado === "bol") 
                {
                        imgBandera.src = "../svg/bolivia.svg";
                }
                else if (paisSeleccionado === "bra")
                {
                        imgBandera.src = "../svg/brasil.svg";
                }
                else if (paisSeleccionado === "chi") {
                        imgBandera.src = "../svg/chile.svg";
                }
                else if (paisSeleccionado === "col") {
                        imgBandera.src = "../svg/colombia.svg";
                }
                else if (paisSeleccionado === "ecu") {
                        imgBandera.src = "../svg/ecuador.svg";
                }
                else if (paisSeleccionado === "par") {
                        imgBandera.src = "../svg/paraguay.svg";
                }
                else if (paisSeleccionado === "uru") {
                        imgBandera.src = "../svg/uruguay.svg";
                }
                else if (paisSeleccionado === "ven") {
                        imgBandera.src = "../svg/venezuela.svg";
                }

});
}


const agregarIngrediente = function()
{
        const agregarBoton = document.getElementById("agregar-ing");
        const ingredientesContainer = document.getElementById("ingredientes");

        

        agregarBoton.addEventListener("click", function () {
                const newIngrediente = document.createElement("div");
                newIngrediente.classList.add("un_ingrediente", "d-grid", "gap-2", "d-md-flex", "justify-content-md-end");
                
                const input = document.createElement("input");
                input.type = "text";
                input.classList.add("form-control", "me-md-2");
                input.placeholder = "";
                
                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("btn", "border", "rounded", "remove-button");
                quitarBoton.type = "button";
                quitarBoton.innerText = "Quitar";
        
        //borrar ingredientes (solo los creados por la función)
                quitarBoton.addEventListener("click", function () {
                        newIngrediente.remove();
                });
                
                newIngrediente.appendChild(input);
                newIngrediente.appendChild(quitarBoton);
                ingredientesContainer.appendChild(newIngrediente);
        });
}



const agregarPaso = function() {
        const agregarPasoBoton = document.getElementById("agregar-paso");
        const pasosLista = document.getElementById("list-paso");
        
                agregarPasoBoton.addEventListener("click", function() {
                const newPasoLi = document.createElement("li");
                newPasoLi.classList.add("item-lista", "list-group-item");
        

                const newPasoDiv = document.createElement("div");
                newPasoDiv.classList.add("un_paso", "d-grid", "gap-2", "d-md-flex", "justify-content-md-end");
        
                const input = document.createElement("textarea");
                input.classList.add("form-control", "me-md-2", "input-paso", "textarea-resize");
                input.placeholder = "";
                input.required = true;
        
                const quitarBoton = document.createElement("button");
                quitarBoton.classList.add("btn-sm", "border", "rounded", "p-2", "px-3");
                quitarBoton.type = "button";
                quitarBoton.innerText = "Quitar";
        
                quitarBoton.addEventListener("click", function() {
                        newPasoLi.remove();
                });
        
                newPasoLi.appendChild(newPasoDiv);
                newPasoDiv.appendChild(input);
                newPasoDiv.appendChild(quitarBoton);
        

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
                inputFile.accept = "image/*";
                inputFile.classList.add("form-control", "mt-2");
        
                const quitarBotonImagen = document.createElement("button");
                quitarBotonImagen.type = "button";
                quitarBotonImagen.innerText = "Quitar Imagen";
                quitarBotonImagen.classList.add("btn-sm", "border", "rounded", "ms-2", "d-none");
                
        
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
        const imgPasoPreview = document.getElementById("img-paso-id");
        const filePaso = document.getElementById("file-paso");
        const imagenPredeterminada = "default-image.png";
        const botonQuitarImagen = document.getElementById("quitar-imagen");

        imgPasoPreview.src = imagenPredeterminada;

        filePaso.addEventListener("change", function () {
                if (filePaso.files.length > 0) 
                {
                        imgPasoPreview.src = URL.createObjectURL(filePaso.files[0]);
                        imgPasoPreview.classList.add("img-paso");

                        botonQuitarImagen.classList.remove("d-none");
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