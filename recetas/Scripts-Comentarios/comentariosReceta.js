let urlActual = window.location.href;
let palabraClave = "recipes-web/";

// Encuentra el índice de la palabra "UIE/" en la URL
let indice = urlActual.indexOf(palabraClave);

document.addEventListener("DOMContentLoaded", function (){

    cargarComentariosReceta();

    document.getElementById("form-comentario").addEventListener("submit", function (e){
        e.preventDefault();

        if (indice !== -1) {
            // Guarda la URL desde el inicio hasta la palabra "UIE/"
            let urlCortada = urlActual.substring(0, indice + palabraClave.length);

            fetch(urlCortada + "recetas/Scripts-Comentarios/postComentarioReceta.php", {
                method: "POST",
                body: new FormData(e.target)
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);

                if (data.success == true) {

                    const CajaComentariosDeSitio = document.getElementById(`listaComentarios`);
    
                    const nuevoComentario = document.createElement('li');
                    nuevoComentario.className = 'comentario list-group-item';

                    nuevoComentario.innerHTML = `
                        <div class="comentario-header d-flex justify-content-between align-items-center">
                            <div>
                                <span class="username">${data.nombre}</span>
                                <span class="timestamp text-muted">${data.fechaPublicacion}</span>
                            </div>
                            <div class="acciones">
                                <button class="btn btn-light" onclick="toggleMenu(event)">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <div class="acciones-menu" style="display: none;">
                                    <button class="btn btn-light" onclick="reportarComentario(this)">
                                        <i class="bi bi-exclamation-circle"></i> Reportar
                                    </button>
                                    <button class="btn btn-light" onclick="eliminarComentario(this)">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="comentario-body">${data.texto_comentario}</div>
                    `;
                
                    CajaComentariosDeSitio.prepend(nuevoComentario);

                }else{
                    console.log("error al crear comentario");
                }
            });
        } else {
            console.log("La palabra 'UIE/' no se encontró en la URL.");
        }
    });

});

function cargarComentariosReceta() {

    const IDReceta = document.getElementById("id_publicacion_receta").value;

    if (indice !== -1) {

        // Guarda la URL desde el inicio hasta la palabra "UIE/"
        let urlCortada = urlActual.substring(0, indice + palabraClave.length);

        fetch(urlCortada + "recetas/Scripts-Comentarios/getComentariosReceta.php?id_publicacion_receta=" + IDReceta, {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(res => {
            // Verifico si la respuesta fue exitosa
            if (!res.ok) {
                throw new Error('Error en la solicitud: ' + res.status);
            }

            // Verifico si hay contenido en la respuesta
            if (res.headers.get('content-length') === '0') {
                return null; // No hay contenido
            }

            // Convierto a JSON
            return res.json();
        })
        .then(data => {

            if (data.length > 0) {
                //Hay comentarios
                console.log(data);

                const listaComentarios = document.getElementById("listaComentarios");

                data.forEach(e => {
                    const nuevoComentario = document.createElement('li');
                    nuevoComentario.className = 'comentario list-group-item';

                    nuevoComentario.innerHTML = `
                        <div class="comentario-header d-flex justify-content-between align-items-center">
                            <div>
                                <span class="username">${e.nombre}</span>
                                <span class="timestamp text-muted">${e.fechaPublicacion}</span>
                            </div>
                            <div class="acciones">
                                <button class="btn btn-light" onclick="toggleMenu(event)">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <div class="acciones-menu" style="display: none;">
                                    <button class="btn btn-light" onclick="reportarComentario(this)">
                                        <i class="bi bi-exclamation-circle"></i> Reportar
                                    </button>
                                    <button class="btn btn-light" onclick="eliminarComentario(this)">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="comentario-body">${e.textoComentario}</div>
                    `;

                    listaComentarios.appendChild(nuevoComentario);
                });
                
            }else{
                //No hay comentarios
                console.log("No hay comentarios en esta publicación..");
            }
        });
    }

}
