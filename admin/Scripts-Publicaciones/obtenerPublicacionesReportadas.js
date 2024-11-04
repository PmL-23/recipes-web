export function obtenerPublicacionesReportadas(){

    const panelContenido = document.querySelector(".panel-body");
    panelContenido.innerHTML = ``;

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-publicaciones";

    try {

        fetch('../admin/Scripts-Publicaciones/obtenerPublicacionesReportadas.php', {
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

            /* console.log(data); */
        
            const ContenedorDePublicaciones = document.getElementById('contenedor-publicaciones');

            ContenedorDePublicaciones.classList.add("pb-3");

            if (data.publicaciones.length > 0) {
                
                data.publicaciones.forEach( (publicacion) => {

                    const fechaHora = publicacion.fecha_publicacion;
                    const [fecha] = fechaHora.split(" "); // Extrae solo la parte de la fecha
                    const [year, month, day] = fecha.split("-"); // Divide en año, mes y día
                    const fechaFormateada = `${day}-${month}-${year}`; // Reordena a formato DD-MM-YYYY

                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-5');
        
                        divPadre.innerHTML = `
                            <div class="d-flex flex-column justify-content-center">

                                <div class="w-100 d-flex justify-content-center">
                                    <img src="${publicacion.ruta_imagen}" class="img-fluid rounded-start" alt="${publicacion.titulo}">
                                </div>

                                <div class="w-100 d-flex flex-row">
                                    <div class="card-body">

                                        <h4 class="card-title">${publicacion.titulo}</h4>
                                        <p class="card-text">${publicacion.descripcion}</p>
                                        <p class="card-text"><small class="text-secondary">${fechaFormateada} a las ${(publicacion.fecha_publicacion.split(" ")[1]).slice(0, 5)}</small></p>
                                        <h5 class="card-title">Cantidad de reportes: ${publicacion.cant_reportes}</h5>
                                        
                                    </div>

                                    <div class="card-body">

                                        <div class="d-flex flex-column justify-content-center w-100 btns-${publicacion.id_publicacion}">
                                            <a href="../recetas/receta-plantilla.php?id=${publicacion.id_publicacion}" target="_blank"><button class="w-100 btn btn-custom-bg btn-sm ms-1 m-2">Ir a publicacion</button></a>
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>
                        `;
                    const btnEliminar = document.createElement("button");
                    btnEliminar.type = "submit";
                    btnEliminar.className = "w-100 btn btn-danger btn-sm ms-1 m-2";
                    btnEliminar.setAttribute("data-bs-toggle", "modal");
                    btnEliminar.setAttribute("data-bs-target", "#modalEliminarObj");
                    btnEliminar.textContent = "Eliminar publicación";
        
                    btnEliminar.addEventListener("click", function (){
                        document.getElementById("modalEliminarObjTitulo").innerHTML = `¿Eliminar publicación del sistema?`;
                        document.getElementById("modalEliminarObjMensaje").innerHTML = `Publicación: "<strong>${publicacion.titulo}</strong>".`;
                        document.getElementById("ObjID").value = publicacion.id_publicacion;
                    });

                    const btnListarReportes = document.createElement("button");
                    btnListarReportes.type = "submit";
                    btnListarReportes.className = "w-100 btn btn-primary btn-sm ms-1 m-2 btn-listar-reportes";
                    btnListarReportes.setAttribute("data-bs-toggle", "modal");
                    btnListarReportes.setAttribute("data-bs-target", "#modalListaReportes");
                    btnListarReportes.setAttribute("data-id", publicacion.id_publicacion);
                    btnListarReportes.textContent = "Ver reportes";

                    const btnIgnorarReportes = document.createElement("button");
                    btnIgnorarReportes.type = "submit";
                    btnIgnorarReportes.className = "w-100 btn btn-secondary btn-sm ms-1 m-2";
                    btnIgnorarReportes.setAttribute("data-bs-toggle", "modal");
                    btnIgnorarReportes.setAttribute("data-bs-target", "#modalEliminarItem");
                    btnIgnorarReportes.textContent = "Ignorar reportes";
    
                    btnIgnorarReportes.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Ignorar reportes de publicación";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de eliminar los reportes y conservar la publicación "<strong>${publicacion.titulo}</strong>" ?`;
                        document.getElementById("ItemID").value = publicacion.id_publicacion;
                    });
                    
                    ContenedorDePublicaciones.appendChild(divPadre);

                    const buttonsContainer = document.querySelector(`.btns-${publicacion.id_publicacion}`);

                    buttonsContainer.appendChild(btnEliminar);
                    buttonsContainer.appendChild(btnListarReportes);
                    buttonsContainer.appendChild(btnIgnorarReportes);

                });

                document.querySelectorAll(".btn-listar-reportes").forEach( (e) => {

                    e.addEventListener("click", function(){
            
                        listarReportesPublicacion(e.dataset.id);
                    });

                });

            }else{

                ContenedorDePublicaciones.innerHTML = `<h3 class="w-100 text-center py-5">No hay publicaciones reportadas</h3>`;

            }

        });

    } catch (error) {

        console.error(error);

    }

    panelContenido.appendChild(contenedorCards);
}

function listarReportesPublicacion(id_publicacion){

    try {
                
        fetch('../admin/Scripts-Publicaciones/listarReportesPublicacion.php?id_publicacion=' + id_publicacion, {
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

            console.log(data);
            const reportesContainer = document.getElementById("listadoDeReportes");
            reportesContainer.innerHTML = ``;

            if (data.success == true) {

                data.reportes.forEach( (e) => {
    
                    const fechaHora = e.fecha_reporte;
                    const [fecha] = fechaHora.split(" "); // Extrae solo la parte de la fecha
                    const [year, month, day] = fecha.split("-"); // Divide en año, mes y día
                    const fechaFormateada = `${day}-${month}-${year}`; // Reordena a formato DD-MM-YYYY

                    reportesContainer.innerHTML += `
                        <li class="w-100 mb-5">
                            <span class="text-dark fw-bolder">Reportado por:</span> <a href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=${e.usuario_reportante}"><span class="text-primary">${e.usuario_reportante}</span></a>
                            <p class="mb-0"><span class="text-dark fw-bolder">Motivo:</span> <span class="text-dark">${e.motivo_reporte}</span></p>
                            <p class="mb-0"><span class="text-dark fw-bolder">Fecha:</span> <span class="text-dark">${fechaFormateada}</span></p>
                            <p class="mb-0"><span class="text-dark fw-bolder">Hora:</span> <span class="text-dark">${(e.fecha_reporte.split(" ")[1]).slice(0, 5)}</span></p>
                            <p class="mb-0"><span class="text-dark fw-bolder">Detalles:</span> <span class="text-dark">${e.detalles_reporte}</span></p>
                        </li>
                    `;
                });
                
            }
        });


    } catch (er) {
        console.error(er);
    }

}