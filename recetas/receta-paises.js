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
    if (document.querySelectorAll('.select-pais').length >= 3) return; //limite de 3

    const paisContainerOriginal = document.querySelector('.pais-container');
    const nuevoPaisContainer = paisContainerOriginal.cloneNode(true);
    const nuevoSelect = nuevoPaisContainer.querySelector('.select-pais');
    const nuevaBandera = nuevoPaisContainer.querySelector('.bandera');


    nuevoSelect.value = ""; 
    nuevaBandera.src = "";
    nuevaBandera.classList.add('d-none');


    nuevoSelect.addEventListener('focus', function () { //valor antes de ser cambiado
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
    quitarBoton.classList.add("boton-secundario", "ms-2");
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

