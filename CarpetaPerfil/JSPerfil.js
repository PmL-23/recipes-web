//usamos un query selector con data-background-image para obtener la imagen actual de cada
//carrousel. Despues aplicamos estilos desde este JS, no se pudo encontrar otra solución por
//el momento

document.querySelectorAll('.slide').forEach(function (slide) {
    var imgSrc = slide.getAttribute('data-background-image');
    slide.style.setProperty('--background-image', `url(${imgSrc})`);
    slide.style.backgroundImage = `url(${imgSrc})`;
});

//pequeño codigo para mostrar la vista previa de una nueva foto de perfil
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block'; // Mostrar la imagen
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        imagePreview.src = "#"; // Restablecer la vista previa si no hay archivo
        imagePreview.style.display = 'none'; // Ocultar la imagen
    }
}

//funcion para copiar en enlace para compartir el perfil.
function CopiarEnlacePerfil() {
    const profileLink = 'https://RecetasDeAmerica.com/MiPerfil';
    navigator.clipboard.writeText(profileLink).then(() => {
    }).catch(err => {
        console.error('Error al copiar el enlace: ', err);
    });
}

//ARRAYS QUE USO PARA SIMULAR DATOS PROVENIENTES DE UNA BASE DE DATOS
const Categorias = [
    {
        ID:1,
        Nombre:"Cena"
    },
    {
        ID:2,
        Nombre:"Almuerzo"
    },
    {
        ID:3,
        Nombre:"Infusión"
    },
    {
        ID:4,
        Nombre:"Postres"
    },
];
//ARRAYS QUE USO PARA SIMULAR DATOS PROVENIENTES DE UNA BASE DE DATOS
const Estiquetas = [
    {
        ID:1,
        Nombre:"Casero"
    },
    {
        ID:2,
        Nombre:"Vegano"
    },
    {
        ID:3,
        Nombre:"Bebidas"
    },
    {
        ID:4,
        Nombre:"Ensaladas"
    },
    {
        ID:5,
        Nombre:"Postres"
    },
    {
        ID:6,
        Nombre:"Low Cost"
    }
];

const Usuarios = [
    {
        ID:1,
        FechaDeNacimiento:"13-02-2001",
        NombreDeUsuario:"FCarino68",
        Correo: "fcarinosg@wattpad.com",
        FotoDePerfil:"https://i.redd.it/aozj4qmgq0o51.jpg",
        Nombre:"Fabian",
        Apellido: "Carino",
        CantidadPublicaciones: 2
    }
];

//OBJETOS QUE USO PARA SIMULAR DATOS PROVENIENTES DE UNA BASE DE DATOS
const publicacion = [
    {
        ID: 1,
        IDCreador: 1,
        FechaDePublicacion: "30-02-2024 10:61",
        Fotos: ["https://i.pinimg.com/564x/d5/83/be/d583beeae1f9def909f332224247f3a6.jpg", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMaJ7xOt3ipD13Dhc0FW09PILR5KamQ7xv5w&s"],        
        Titulo: "Pancho Cacero",
        Descripcion: "Este gran pancho lo podes hacer en tu casa con una cantidad muy pequeña de ingredientes!",
        IDCategoria: 1,
        IDEtiquetas: [1,6],
        Ingredientes:"Pan de pancho, salchicha, salsa criolla, agua",
        Valoracion:4,
        CantidadValoraciones: 42,
        CantidadComentaios: 10

    },

    {
        ID: 2,
        IDCreador: 1,
        FechaDePublicacion: "44-12-2023 25:19",
        Fotos: ["https://i.redd.it/aozj4qmgq0o51.jpg", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMaJ7xOt3ipD13Dhc0FW09PILR5KamQ7xv5w&s"],        
        Titulo: "Asado vegano",
        Descripcion: "Por mas que no sea carne, no pierde el sabor!",
        IDCategoria: 2,
        IDEtiquetas: [1,2],
        Ingredientes:"Soja y hambre ",
        Valoracion:1,
        CantidadValoraciones: 999,
        CantidadComentaios: 540
    }
];


document.addEventListener("DOMContentLoaded", function () {
    let cantidad = Usuarios[0].CantidadPublicaciones;
    const contenedor = document.getElementById("IDContenedorPublicacionesPropias"); // Selecciona el contenedor
    
cantidad=0;

if(cantidad==0){
    const fragmentoHTML =`
    <div class="container-fluid row d-flex justify-content-center align-items-center">
        <div class="col-1"></div>
        <div class="col-10 text-center">
            <p class="h2">Todavia no hay publicaciones!</p>
        </div>
        <div class="col-1"></div>
        <br>
    </div>`;
    // Agregar el fragmento de HTML al contenedor
    contenedor.innerHTML += fragmentoHTML;  
}

else{
    for (let i = 0; i < cantidad; i++) {
        // Crear el fragmento de HTML con las variables del objeto
        const categoria = Categorias.find(cat => cat.ID === publicacion[i].IDCategoria);
            // Usar forEach para obtener los nombres de las etiquetas
    // Crear un string para las etiquetas
    let etiquetasHTML = '';
    publicacion[i].IDEtiquetas.forEach(etiquetaID => {
        const etiqueta = Estiquetas.find(eti => eti.ID === etiquetaID);
        if (etiqueta) {
            etiquetasHTML += `<p class="card-text EstilosEstiquetas">${etiqueta.Nombre}</p>`;
        }
    });

        // Imprime en consola para ver las etiquetas
//        console.log(`${etiquetas.map(etiqueta => `<span class="EstilosEtiquetas">${etiqueta.Nombre}</span>`).join('')}`);
        
        const fragmentoHTML =`
    <div class="container-fluid row" id="DivPublicacion${i}">
        <div class="col-1 "></div>
        
        <div class="card p-0 col-10">
                <div class=" DivEncabezadoPublicacion ">
                    <img class="d-inline " alt="Texto si no ve imagen" src="${Usuarios[0].FotoDePerfil}"width="25" height="25">
                    <p class="d-inline" id="IDNombreCompletoDeUsuarioEnPublicacion">${Usuarios[0].Nombre} ${Usuarios[0].Apellido}</p>
                    <p class="d-inline text-secondary" id="IDNombreDeUsuarioEnPublicacion">@${Usuarios[0].NombreDeUsuario}</p>
                </div>

                <div id="carouselExampleIndicators${i}" class="carousel slide carouselPerfil bg-black">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner"> <!---buscar manera para que el tamaño de una imagen no perjudique la UX-->
                        <div class="carousel-item active slide" data-background-image="${publicacion[i].Fotos[0]}">
                            <img src="${publicacion[i].Fotos[0]}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item slide" data-background-image="${publicacion[i].Fotos[1]}">
                            <img src="${publicacion[i].Fotos[1]}" class="d-block w-100 " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators${i}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                <div class="card-body ">
                    <h5 class="card-title ">${publicacion[i].Titulo}</h5>
                    <p class="card-text">${publicacion[i].Descripcion}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt-3">
                        <p class="card-text EstilosCategorias">${categoria.Nombre}</p>
                            ${etiquetasHTML}
                    </li>
                    <li class="list-group-item">
                        <ul>
                            <li><p class="card-text">${publicacion[i].Ingredientes}</p></li>
                        </ul>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Valoración y cantidad de valoraciones -->
                        <div class="valoracion">
                            <p>${publicacion[i].Valoracion} (${publicacion[i].CantidadValoraciones})</p>
                        </div>
                        
                        <!-- Cantidad de comentarios -->
                        <div class="comentarios">
                            <p>${publicacion[i].CantidadComentaios} comentarios</p>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="d-flex justify-content-end mt-2">
                        <!-- Botón para compartir -->
                        <button class="btn btn-outline-primary me-2" type="button">
                            Compartir
                        </button>
                
                        <!-- Botón para guardar en favoritos -->
                        <button class="btn btn btn-outline-dark" type="button">
                            Guardar en Favoritos
                        </button>
                    </div>
                </div>
        </div>

        <div class="col-1 "></div>

    </div>
<br>
<hr>
<br>
    `;

        // Agregar el fragmento de HTML al contenedor
        contenedor.innerHTML += fragmentoHTML;  

    }
}
alert("termino");


});
