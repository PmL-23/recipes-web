export function obtenerUsuariosReportados(){

    const panelContenido = document.querySelector(".panel-body");
    panelContenido.innerHTML = ``;

    const contenedorCards = document.createElement("div");
    contenedorCards.classList.add('w-100', 'd-flex', 'flex-column', 'overflow-y-auto');

    panelContenido.innerHTML = ``;
    contenedorCards.id = "contenedor-usuarios";

    try {
        fetch('../admin/Scripts-Usuarios/obtenerUsuariosReportados.php', {
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
        
            const ContenedorDeUsuarios = document.getElementById('contenedor-usuarios');

            ContenedorDeUsuarios.classList.add("pb-3");

            if (data.usuarios.length > 0) {
                
                data.usuarios.forEach( (usuario) => {

                    const divPadre = document.createElement('div');
                    divPadre.classList.add('card', 'm-5');
        
                        divPadre.innerHTML = `
                            <div class="card-body d-flex flex-row">
    
                                <img class="w-25 h-25 m-2 rounded-circle border" src="${usuario.foto_usuario}"/>
    
                                <div class="container-sm d-flex flex-column align-items-center">
                                    <h3>${usuario.nombre_usuario}</h3>
    
                                    <div class="w-100 p-2 mt-4 d-flex flex-row justify-content-around">
    
                                        <div class="d-flex flex-column align-items-center">
                                            <h4>${usuario.cant_publicaciones}</h4>
                                            <h6>Publicaciones</h6>
                                        </div>
    
                                        <div class="d-flex flex-column align-items-center">
                                            <h4>${usuario.cant_reportes}</h4>
                                            <h6>Reportes</h6>
                                        </div>
    
                                        <div class="d-flex flex-column align-items-center">
                                            <h4>${usuario.cant_seguidores}</h4>
                                            <h6>Seguidores</h6>
                                        </div>
    
                                    </div>
    
                                    <div class="m-2 d-flex flex-row btns-${usuario.id_usuario}">
    
                                        <a href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=${usuario.nombre_usuario}" target="_blank"><button class="btn btn-custom-bg btn-sm ms-1 m-2 btn-ver-usuario">Ir a perfil</button></a>
    
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="card-footer">
                                <div class="d-flex flex-row">
    
                                    <div class="w-100 p-2 d-flex flex-row align-items-center">
    
                                        <span class="text-secondary">${usuario.nombre_completo}</span>
    
                                    </div>
    
                                    <div class="w-100 p-2 d-flex flex-column align-items-end justify-content-center">
    
                                        
                                        <p class="text-secondary m-0">${usuario.correo}</p>
    
                                    </div>
                                </div>
                            </div>
                        `;
                        
                    const btnSuspenderUsuario = document.createElement("button");
                    btnSuspenderUsuario.type = "submit";
                    btnSuspenderUsuario.className = "btn btn-danger btn-sm ms-1 m-2 btn-suspender-usuario";
                    btnSuspenderUsuario.setAttribute("data-bs-toggle", "modal");
                    btnSuspenderUsuario.setAttribute("data-bs-target", "#modalSuspenderUsuario");
                    btnSuspenderUsuario.textContent = "Suspender usuario";
        
                    btnSuspenderUsuario.addEventListener("click", function (){
                        document.getElementById("modalSuspenderUsuarioTitle").innerHTML = `Aplicar suspensión a "<strong>${usuario.nombre_usuario}</strong>"`;
                        document.getElementById("cuentaID").value = usuario.id_usuario;
                    });

                    const btnListarReportes = document.createElement("button");
                    btnListarReportes.type = "submit";
                    btnListarReportes.className = "btn btn-primary btn-sm ms-1 m-2 btn-listar-reportes";
                    btnListarReportes.setAttribute("data-bs-toggle", "modal");
                    btnListarReportes.setAttribute("data-bs-target", "#modalListaReportes");
                    btnListarReportes.setAttribute("data-id", usuario.id_usuario);
                    btnListarReportes.textContent = "Ver reportes";

                    const btnIgnorarReportes = document.createElement("button");
                    btnIgnorarReportes.type = "submit";
                    btnIgnorarReportes.className = "btn btn-secondary btn-sm m-2 btn-ignorar-usuario";
                    btnIgnorarReportes.setAttribute("data-bs-toggle", "modal");
                    btnIgnorarReportes.setAttribute("data-bs-target", "#modalEliminarItem");
                    btnIgnorarReportes.textContent = "Ignorar reportes";
    
                    btnIgnorarReportes.addEventListener("click", function (){
                        document.getElementById("modalEliminarItemTitulo").textContent = "Ignorar reportes";
                        document.getElementById("modalEliminarItemMensaje").innerHTML = `¿Está seguro de NO penalizar a '<strong>${usuario.nombre_usuario}</strong>' y eliminar reportes?`;
                        document.getElementById("ItemID").value = usuario.id_usuario;
                    });
                    
                    ContenedorDeUsuarios.appendChild(divPadre);

                    const reportesContainer = document.querySelector(`.btns-${usuario.id_usuario}`);

                    reportesContainer.appendChild(btnSuspenderUsuario);
                    reportesContainer.appendChild(btnListarReportes);
                    reportesContainer.appendChild(btnIgnorarReportes);

                });

                document.querySelectorAll(".btn-listar-reportes").forEach( (e) => {

                    e.addEventListener("click", function(){
            
                        listarReportesUsuario(e.dataset.id);
                    });

                });

            }else{

                ContenedorDeUsuarios.innerHTML = `<h3 class="w-100 text-center py-5">No hay usuarios reportados</h3>`;

            }

        });
    } catch (error) {
        console.error(error);
    }

    panelContenido.appendChild(contenedorCards);
}

function listarReportesUsuario(id_usuario){

    try {
                
        fetch('../admin/Scripts-Usuarios/listarReportesUsuario.php?id_usuario=' + id_usuario, {
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