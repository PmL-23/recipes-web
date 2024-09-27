const inicio = function ()
{
        visualizarPortada();
        agregarIngrediente();
        agregarPaso ();
        subirImagenPaso();
        visualizarBandera();

        const frmReceta = document.getElementById("frm-receta");

        frmReceta.addEventListener("submit", function(e) {

                e.preventDefault(); 

                const portada = document.getElementById("foto-portada").src;

                const titulo = document.getElementById("titulo");
                const descripcion = document.getElementById("descripcion");
                const pais = document.getElementById("select-pais");
                const categoria = document.getElementById("categoria");
                const dificultad = document.getElementById("dificultad");
                const tiempo = document.getElementById("tiempo-elaboracion");
                const unidad = document.getElementById("tiempo-unidad");
                const etiqueta = document.getElementById("etiqueta");
                const ingrediente = document.getElementById("primer-ingrediente");
                const paso = document.getElementById("primer-paso");

                const tituloV = titulo.value;
                const descripcionV = descripcion.value;
                const paisV = pais.value;
                const categoriaV = categoria.value;
                const dificultadV = dificultad.value;
                const tiempoV = tiempo.value;
                const unidadV = unidad.value;
                const etiquetaV = etiqueta.value;
                const ingredienteV = ingrediente.value;
                const pasoV = paso.value;

                const errorTitulo = document.getElementById("errorTitulo");
                const errorDescripcion = document.getElementById("errorDescripcion");
                const errorPais = document.getElementById("errorPais");
                const errorCategoria = document.getElementById("errorCategoria");
                const errorDificultad = document.getElementById("errorDificultad");
                const errorTiempo = document.getElementById("errorTiempo");
                const errorUnidad = document.getElementById("errorUnidad");
                const errorEtiqueta = document.getElementById("errorEtiqueta");
                const errorIngrediente = document.getElementById("errorIngrediente");
                const errorPaso = document.getElementById("errorPaso");

                
                if (tituloV.length < 2 || tituloV.length > 100) {
                        errorTitulo.textContent= "Campo titulo en blanco";
                        
                }
        
                if (descripcionV.length < 2 || descripcionV.length > 200) {
                        errorDescripcion.textContent= "Campo descripcion en blanco";
                }

                if (tiempoV < 1)
                {
                        tiempo.classList.add("is-invalid");
                        errorTiempo.textContent= "El numero debe ser mayor o igual a 1";
                }

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
                        imgBandera.src = "/recipes-web-master/svg/argentina.svg";
                }
                else if (paisSeleccionado === "bol") 
                {
                        imgBandera.src = "/recipes-web-master/svg/bolivia.svg";
                }
                else if (paisSeleccionado === "bra")
                {
                        imgBandera.src = "/recipes-web-master/svg/brasil.svg";
                }
                else if (paisSeleccionado === "chi") {
                        imgBandera.src = "/recipes-web-master/svg/chile.svg";
                }
                else if (paisSeleccionado === "col") {
                        imgBandera.src = "/recipes-web-master/svg/colombia.svg";
                }
                else if (paisSeleccionado === "ecu") {
                        imgBandera.src = "/recipes-web-master/svg/ecuador.svg";
                }
                else if (paisSeleccionado === "par") {
                        imgBandera.src = "/recipes-web-master/svg/paraguay.svg";
                }
                else if (paisSeleccionado === "uru") {
                        imgBandera.src = "/recipes-web-master/svg/uruguay.svg";
                }
                else if (paisSeleccionado === "ven") {
                        imgBandera.src = "/recipes-web-master/svg/venezuela.svg";
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