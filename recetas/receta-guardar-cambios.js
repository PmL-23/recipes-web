
let form = document.getElementById("frm-receta-editar");

form.addEventListener("keydown", function (e) {
    if (e.key === 'Enter') {
    e.preventDefault(); 
    }
});

form.addEventListener("submit", function (e){
    e.preventDefault();

    let urlActual = window.location.href;
    let palabraClave = "recipes-web/";
    let indice = urlActual.indexOf(palabraClave);
    let urlParams = new URLSearchParams(window.location.search); 
    let id_publicacion = urlParams.get('id'); 

    if (indice !== -1) {
            let urlCortada = urlActual.substring(0, indice + palabraClave.length);

            if(validar() == true){

                    if (id_publicacion) {  

                    fetch(urlCortada + "recetas/form-receta-editar.php?id=" + id_publicacion, {
                            method: "POST",
                            body: new FormData(e.target)
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log("data", data);
                        if (data.success == true) {
                        console.log("Cambios guardados con éxito");
                        eliminarPasos(id_publicacion, pasosEliminados);

                        window.location.href = "../recetas/receta-plantilla.php?id=" + data.receta_id;

                        }else{
                            console.log("Error al crear receta:", data.msj_error); 
                            console.log('Errores:', data.errors);
                            console.log('Errores:', data.errorsIng);
                            console.log('Errores:', data.errorsPaso);
                            
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
        }
        }
        }

});

function validarPortada() {
        let FlagValidacion = true;
        
        const imagenes = document.querySelectorAll(".file-portada");
        
        imagenes.forEach(function(imagen) {       
            const errorImagen = imagen.parentElement.querySelector(".error-portada");
            errorImagen.textContent = "";
        
            imagen.addEventListener("change", function() {
                    if (imagen.files.length > 0) {
                    const file = imagen.files[0];
                    const validImageTypes = ["image/jpeg", "image/png"];
        
                            if (!validImageTypes.includes(file.type)) {
                                    errorImagen.textContent = "Debe seleccionar un archivo de imagen válido ( jpeg, png).";
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
                    const validImageTypes = ["image/jpeg", "image/png"];
        
                    if (!validImageTypes.includes(file.type)) {
                            errorImagen.textContent = "Debe seleccionar un archivo de imagen válido (jpeg, png).";
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

    if (palabras.length > 2 || palabras.length < 50){
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
            const validImageTypes = ["image/jpeg", "image/png"];

                    if (!validImageTypes.includes(file.type)) {
                            errorImagen.textContent = "Debe seleccionar un archivo de imagen válido ( jpeg, png).";
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
            const validImageTypes = ["image/jpeg", "image/png"];

            if (!validImageTypes.includes(file.type)) {
                    errorImagen.textContent = "Debe seleccionar un archivo de imagen válido (jpeg, png).";
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

const minutoHora = ["minutos", "hora"];

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


const quitarPaises = document.querySelectorAll('.quitar-pais');
quitarPaises.forEach(quitarPais => {
        quitarPais.addEventListener('click', function() {
        const paisContainer = this.closest('.pais-container');
        const idPaisReceta = this.getAttribute('data-id-pais');

        paisContainer.remove();

        if (validar === true)
        {
                if (idPaisReceta) {
                        fetch('form-receta-editar.php', {
                        method: 'POST',
                        headers: {
                                'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id_pais_receta: idPaisReceta })
                        })
                        .then(response => response.json())
                        .then(dataPais => {
                        if (dataPais.success) {
                                console.log("País eliminado con éxito");
                        } else {
                                console.error("Error al eliminar el país:", dataPais.message);
                        }
                        })
                        .catch(error => console.error("Error:", error));
                }

        }
        });
});




let pasosEliminados = []; 

const quitarPasos = document.querySelectorAll('.quitar-paso');

quitarPasos.forEach(quitarPaso => {
        quitarPaso.addEventListener('click', function() {
        const pasoContainer = this.closest('.paso-container');
        const idPasoReceta = this.getAttribute('data-id-paso');

        pasosEliminados.push(idPasoReceta);

        pasoContainer.remove();
        
        });
});


function eliminarPasos(id_publicacion, pasosAEliminar) {
        pasosAEliminar.forEach(id_paso => {
                fetch('eliminar-paso.php', {
                        method: 'POST',
                        headers: {
                        'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id_paso_receta: id_paso })
                })
                .then(response => response.json())
                .then(data => {
                        if (data.success) {
                        console.log("Paso eliminado con éxito", id_paso);
                        } else {
                        console.error("Error al eliminar el paso:", data.message);
                        }
                })
                .catch(error => console.error("Error:", error));
                });
}



const quitarIng = document.querySelectorAll('.quitar-ingrediente');
quitarIng.forEach(quitarIngrediente => {
        quitarIngrediente.addEventListener('click', function() {
        const ingContainer = this.closest('.ingrediente-container');
        const idIngReceta = this.getAttribute('data-id-ingrediente');

        ingContainer.remove();

        if (validar === true)
        {
                if (idIngReceta) {
                        fetch('form-receta-editar.php', {
                        method: 'POST',
                        headers: {
                                'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id_ingrediente_receta: idIngReceta })
                        })
                        .then(response => response.json())
                        .then(dataIng => {
                        if (dataIng.success) {
                                console.log("Ingrediente eliminado con éxito");
                        } else {
                                console.error("Error al eliminar el ingrediente:", dataIng.message);
                        }
                        })
                        .catch(error => console.error("Error:", error));
                }

        }
        });
});

const quitarEtiquetas = document.querySelectorAll('.quitar-etiqueta');
quitarEtiquetas.forEach(quitarEtiqueta => {
        quitarEtiqueta.addEventListener('click', function() {
        const etiquetaContainer = this.closest('.una_etiqueta');
        const idEtiqueta = this.getAttribute('data-id-etiqueta');

        etiquetaContainer.remove();

        if (validar === true)
        {
                if (idIngReceta) {
                        fetch('form-receta-editar.php', {
                        method: 'POST',
                        headers: {
                                'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id_etiqueta_receta: idEtiqueta })
                        })
                        .then(response => response.json())
                        .then(dataEtiqueta => {
                        if (dataEtiqueta.success) {
                        } else {
                                console.error("Error al eliminar el etiqueta:", dataEtiqueta.message);
                        }
                        })
                        .catch(error => console.error("Error:", error));
                }

        }
        });
});
