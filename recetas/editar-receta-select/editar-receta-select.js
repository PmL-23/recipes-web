async function LLenarSelcetEtiquetasSelect(IDPublicacion){
    //console.log('estoy en la funcion ' + ContraseñaActual + NuevaContraseña + ConfirmaciónNuevaContraseña + IDUsuario);

    let url = 'editar-receta-select/ObtenerEtiquetas.php';
    
    fetch(url, {
        method: 'POST'
    })
    .then(response => response.json()) // Parsear la respuesta como JSON
    .then(result => {
        // Manejar la respuesta del servidor
        if (result) {
            //console.log(result);
            const selectEtiquetas = document.getElementById("SelectEtiquetas");

            result.forEach(item => {
                // Crear una nueva opción para el select
                const option = document.createElement("option");
                option.value = item.id_etiqueta; // Asigna el valor como id_categoria
                option.textContent = item.titulo; // Asigna el texto de la opción como titulo
                
                
                EtiquetasSeleccionadas.forEach(etiqueta => {
                    if(option.value == etiqueta.id_etiqueta){
                        option.selected = true;
                        
                    }

                });

                selectEtiquetas.appendChild(option); // Agrega la opción al select
            });

                    new MultiSelectTag('SelectEtiquetas', {
                        rounded: true,       // default true
                        shadow: false,       // default false
                        placeholder: 'Search...', // default Search...
                        tagColor: {
                            textColor: '#327b2c',
                            borderColor: '#92e681',
                            bgColor: '#eaffe6',
                        },
                        onChange: function(values) {
                            //console.log("Etiquetas seleccionadas:", values); // Esto muestra las etiquetas seleccionadas al cambiar
                        }
                    }); 

            
        } else {
            console.log('error en el fetch obtener etiquetas seleccionadas');

        }
    })
    .catch(error => {
        console.log('Error en la solicitud de traer etiquetas seleccionadas', error);
    });
}

let EtiquetasSeleccionadas=[];

async function LLenarEtiquetasSeleccionadas(IDPublicacion){
    //console.log('estoy en la funcion ' + ContraseñaActual + NuevaContraseña + ConfirmaciónNuevaContraseña + IDUsuario);
    let promesasDOMLLenarSelectEtiquetas = [];
    let url = 'editar-receta-select/ObtenerEtiquetasSeleccionadas.php?IDPublicacion=' + IDPublicacion;
    
    fetch(url, {
        method: 'GET'
    })
    .then(response => response.json()) // Parsear la respuesta como JSON
    .then(result => {
        if (result) {
        let i=0;
            result.forEach(item => {
                EtiquetasSeleccionadas[i] = {
                    id_etiqueta: item.id_etiqueta,
                    titulo: item.titulo
                };
                i++;
                console.log(EtiquetasSeleccionadas);                
            });
            promesasDOMLLenarSelectEtiquetas.push(LLenarSelcetEtiquetasSelect());
        } else {
            console.log('error en el fetch obtener etiquetas seleccionadas');
        }
    })
    .catch(error => {
        console.log('Error en la solicitud de traer etiquetas seleccionadas', error);
    });

    await Promise.all(promesasDOMLLenarSelectEtiquetas);
}

document.addEventListener("DOMContentLoaded", async function () {
    let formulario = document.querySelector('form[data-IDPublicacion]');
    let IDPublicacion = formulario.getAttribute('data-IDPublicacion');
    //console.log("ID de la publicación:", IDPublicacion);
    let promesasDOMEtiquetasSeleccionadas = [];
    promesasDOMEtiquetasSeleccionadas.push(LLenarEtiquetasSeleccionadas(IDPublicacion)); //si usamos un away en el for, se rompe, por eso hacemos esto
    await Promise.all(promesasDOMEtiquetasSeleccionadas); 
});