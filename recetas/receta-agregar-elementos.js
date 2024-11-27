const agregarEtiqueta = function()
{

        const agregarEtiquetaBoton = document.getElementById("agregar-etiqueta");
        const etiquetaContainer = document.getElementById("etiquetas");

        agregarEtiquetaBoton.addEventListener("click", function () {

                const nuevoRowEtiqueta = document.createElement("div");
                nuevoRowEtiqueta.classList.add("una_etiqueta", "d-grid", "gap-2", "d-flex", "flex-column", "justify-content-md-end", "mt-3");
                const row = document.createElement("div");
                row.classList.add("row");
                const col = document.createElement("div");
                col.classList.add("col-md-10", "col-8");
                const selectEtiqueta= document.createElement("select");
                selectEtiqueta.classList.add("form-select", "select-etiqueta");
                selectEtiqueta.name="etiqueta[]";
                const opcionDefault = document.createElement("option");
                opcionDefault.value="";
                opcionDefault.textContent="Selecciona una etiqueta";
                opcionDefault.disabled= true;
                opcionDefault.selected= true;
                selectEtiqueta.appendChild(opcionDefault);

                fetch("../crearReceta/obtener_etiquetas.php")
                        .then(response => response.json())
                        .then(data => {
                                for (let item of data) {
                                        let opcion = document.createElement("option");
                                        opcion.value = item.id_etiqueta;
                                        opcion.textContent = item.titulo;
                                        selectEtiqueta.appendChild(opcion);
                                       /*  selectEtiqueta.innerHTML += '<option value="'+ item.id_etiqueta +'">'+ item.titulo +'</option>'; */
                                }
                        })
                        .catch(error => {
                        console.error("Error en:", error);
                        });
                
                const small= document.createElement("small");
                small.classList.add("text-danger", "error-etiqueta");


                etiquetaContainer.appendChild(nuevoRowEtiqueta);
                nuevoRowEtiqueta.appendChild(row);
                row.appendChild(col);
                col.appendChild(selectEtiqueta);
                col.appendChild(small);

                const colQuitarEtiqueta = document.createElement("div");
                colQuitarEtiqueta.classList.add("col-md-2", "col-4", "d-flex", "container", "justify-content-end");
                const quitarBotonEtiqueta = document.createElement("button");
                quitarBotonEtiqueta.classList.add("boton-secundario", "quitar-etiqueta");
                quitarBotonEtiqueta.type = "button";
                quitarBotonEtiqueta.innerHTML = "<i class='bi bi-trash me-1 icono'></i> Quitar";
        

                colQuitarEtiqueta.appendChild(quitarBotonEtiqueta);
                row.appendChild(colQuitarEtiqueta);
        });
}

agregarEtiqueta();


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
                imgSrc.src = "../recetas/galeria/default/default-image.png";
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
                                imgSrc.src = "../recetas/galeria/default/default-image.png";
                                quitarBotonImagen.classList.add("d-none");
                        }
                });

                quitarBotonImagen.addEventListener("click", function() {

                        inputFile.value = "";
                        imgSrc.src = "../recetas/galeria/default/default-image.png";
                        quitarBotonImagen.classList.add("d-none");
                });

                newCElemento.appendChild(imgSrc);
                newCElemento.appendChild(inputFile);
                newCElemento.appendChild(errorImagenFile);
                newCElemento.appendChild(quitarBotonImagen);
                pasosLista.appendChild(newPasoLi);
        });
}

agregarPaso();

const subirImagenPaso = function () {
        const imagenesPaso = document.querySelectorAll(".img-paso-id");
        
        imagenesPaso.forEach(function(imgPasoPreview) {
        const filePaso = imgPasoPreview.closest("li").querySelector(".file-paso");
        const imagenPredeterminada = "../recetas/galeria/default/default-image.png";
        const botonQuitarImagen = imgPasoPreview.closest("li").querySelector(".quitar-imagen");

        imgPasoPreview.src = imgPasoPreview.getAttribute("src") || imagenPredeterminada;

        filePaso.addEventListener("change", function () {
        if (filePaso.files.length > 0) {
                imgPasoPreview.classList.add("img-paso");
                imgPasoPreview.src = URL.createObjectURL(filePaso.files[0]);

                if (botonQuitarImagen) {
                botonQuitarImagen.classList.remove("d-none"); 
                botonQuitarImagen.classList.add("d-inline-block");
                }
        }

        if (botonQuitarImagen) {
                botonQuitarImagen.addEventListener("click", function () {
                filePaso.value = "";
                imgPasoPreview.src = imagenPredeterminada;
                botonQuitarImagen.classList.add("d-none"); 
                });
        }
        });
});
};

subirImagenPaso();


const mostrarCategoria = function () {       

        const selectCat = document.getElementById("categoria");
        const tagCategoria = document.getElementById("tag-categoria");
        
        selectCat.addEventListener("change", function () {

                const selectCatIndex = selectCat.options[selectCat.selectedIndex]; 
                const catSeleccionada = selectCatIndex.textContent;
        
                if (catSeleccionada) {
                        tagCategoria.classList.remove("d-none");
                        tagCategoria.textContent = catSeleccionada; 
                } 
        });
}

mostrarCategoria();