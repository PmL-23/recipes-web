function guardarNuevosDatos ()
{
    const formulario=  document.getElementById("frm-receta-editar");
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        getRespuesta(e.target);
    });
}

guardarNuevosDatos();

const respuesta = function (data) {
 /*    let cartelError = document.getElementById('cartel-error');
    let listaError = document.getElementById('lista-error');
    limpiarMensajes(); */

    if (data.success) {
        
        window.location.href = "../recetas/receta-plantilla.php?id=" + data.receta_id;


    } else {
        //cartelError.classList.remove('d-none');
        for (let i = 0; i < data.errors.length; i++) {
            let error = data.errors[i];
            /*       
          //  listaError.innerHTML += '<li>' + error + '</li>';
            let item = document.createElement("li");
           // item.classList.add("list-group-item","pb-3");
            item.textContent = error;
            
            listaError.appendChild(item); */

            console.log(error);
        }
    }
}

function getRespuesta(form) {
    let urlActual = window.location.href;

    let urlParams = new URLSearchParams(window.location.search); 
    let id_publicacion = urlParams.get('id'); 
    if (id_publicacion) {  
        let palabraClave = "recipes-web/";
        let indice = urlActual.indexOf(palabraClave);

        if (indice !== -1) {
            let urlCortada = urlActual.substring(0, indice + palabraClave.length);

            // Ahora podemos usar el id_publicacion en la URL del fetch
            fetch(urlCortada + "recetas/form-receta-editar.php?id=" + id_publicacion, {
                method: "POST",
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                console.log("data", data);
                respuesta(data);
            })
            .catch(error => {
                console.error("Error:", error);
            });
        }
    } else {
        console.error("No se encontró el parámetro 'id' en la URL");
    }
}
