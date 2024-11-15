const agregarEtiqueta = function()
{

        const agregarEtiquetaBoton = document.getElementById("agregar-etiqueta");
        const etiquetaInput = document.getElementById("etiquetas");

        agregarEtiquetaBoton.addEventListener("click", function () {

                const nuevoInputEtiqueta = etiquetaInput.cloneNode(true);

                nuevoInputEtiqueta.classList.remove("flex-column");
                nuevoInputEtiqueta.classList.add("flex-row");

                document.getElementById("etiquetas").appendChild(nuevoInputEtiqueta);

                const quitarBotonEtiqueta = document.createElement("button");
                quitarBotonEtiqueta.classList.add("boton-secundario", "d-flex");
                quitarBotonEtiqueta.type = "button";
                quitarBotonEtiqueta.innerHTML = "<i class='bi bi-trash me-1'></i> Quitar";
        
        
                quitarBotonEtiqueta.addEventListener("click", function () {
                        nuevoInputEtiqueta.remove();
                });

                nuevoInputEtiqueta.appendChild(quitarBotonEtiqueta);
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
                imgSrc.src = "../recetas/galeria/default/default-image.png";
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
                newCElemento.appendChild(quitarBotonImagen);
                pasosLista.appendChild(newPasoLi);
        });
}


agregarPaso();
