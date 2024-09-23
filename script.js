const swiper = new Swiper('.slider-wrapper', { /* instanciamos un objeto Swiper aplicandolo al html 
                                                                        con clase slider-wrapper (el control deslizante)*/
  loop: true,/* esto permite que el slider se pueda desplazar todo loq ue quiera */
  grabCursor: true,/* pone la manito */
  spaceBetween: 30,/*espacio */
  // configura los puntos de abajo, en dodne se ven cuantos slides hay
  pagination: {
    el: '.swiper-pagination', /* especifica el elemento html que se usa, osea la clase */
    clickable: true,/* se puede hacer click en los puntitos para avanzar o retroceder */
    dynamicBullets: true /* hace responcivo los puntitos */
  },

  // configura las flechas de navegacion
  navigation: {
    nextEl: '.swiper-button-next', /* para adelante */
    prevEl: '.swiper-button-prev', /* para atrass */
  },

  // para cada tipo de pantalla
  breakpoints:{
      0: {
          slidesPerView: 1 /*solo 1 receta para celulares o tablets chicas*/
      },
      768: {
          slidesPerView: 2 /*solo 1 receta para tablets o notebooks chicsa*/
      },
      1024: {
          slidesPerView: 3 /*solo 1 receta para pantallas grandes*/
      },
  }
});

document.getElementById('toggleFiltro').addEventListener('click', function() {
  var filtroDiv = document.getElementById('filtro');
  if (filtroDiv.style.display === 'none' || filtroDiv.style.display === '') {
      filtroDiv.style.display = 'block';
  } else {
      filtroDiv.style.display = 'none';
  }
});



// PARA LAS RECETAS
//para que al dar click se vaya al documento correcto
function redirigirConId(idBoton) {
  const boton = document.getElementById(idBoton);
  
  if (boton) {
    boton.addEventListener("click", function() {
      //vs  a la página con  nombre corresponde al id del botón, que se pone en el html
      window.location.href = "html/pagina_" + idBoton.replace('boton', '').toLowerCase() + ".html";
    });
  }
}
redirigirConId("botonMilanesas");  // va a "html/pagina_milanesas.html"
redirigirConId("botonEmpanadas");  // va a "html/pagina_empanadas.html"
redirigirConId("botonAsado");      // va a "html/pagina_asado.html"
redirigirConId("botonNioquis");      // va a "html/pagina_asado.html"
redirigirConId("botonBondiola");      // va a "html/pagina_asado.html"
redirigirConId("botonSorrentinos");      // va a "html/pagina_asado.html"
redirigirConId("botonPanchos");      // va a "html/pagina_asado.html"
redirigirConId("botonPizza");      // va a "html/pagina_asado.html"


// PARA LAS BANDERAS
function redirigirConIdPaises(idBoton) {
  const boton = document.getElementById(idBoton);
  
  if (boton) {
    boton.addEventListener("click", function() {
      //vs  a la página con  nombre corresponde al id del botón, que se pone en el html
      window.location.href = "html_paises/pais_" + idBoton.replace('pais', '').toLowerCase() + ".html";
    });
  }
}
redirigirConIdPaises("paisArgentina");
redirigirConIdPaises("paisBolivia");
redirigirConIdPaises("paisBrasil");
redirigirConIdPaises("paisChile");
redirigirConIdPaises("paisColombia");
redirigirConIdPaises("paisEcuador");
redirigirConIdPaises("paisPeru");
redirigirConIdPaises("paisParaguay");
redirigirConIdPaises("paisUruguay");
redirigirConIdPaises("paisVenezuela");

/* Seccion de recetas */
document.querySelectorAll('.star').forEach(star => {
  star.addEventListener('click', () => {
      const rating = star.getAttribute('data-value');
      document.querySelectorAll('.star').forEach(s => {
          s.style.color = s.getAttribute('data-value') <= rating ? 'gold' : 'lightgray';
      });
  });
});

// Manejo de comentarios
const btnEnviarComentario = document.getElementById('btnEnviarComentario');
const comentarioText = document.getElementById('comentarioText');
const listaComentarios = document.getElementById('listaComentarios');
const btnComentar = document.getElementById('btnComentar');

// Redirigir al textarea de comentarios
btnComentar.addEventListener('click', () => {
  const seccionComentarios = document.getElementById('seccionComentarios');
  seccionComentarios.scrollIntoView({ behavior: 'smooth' });
});

// Enviar comentario
btnEnviarComentario.addEventListener('click', () => {
  const comentario = comentarioText.value.trim();
  if (comentario) {
      const nuevoComentario = document.createElement('li');
      nuevoComentario.className = 'list-group-item';
      nuevoComentario.textContent = comentario;
      listaComentarios.appendChild(nuevoComentario);
      comentarioText.value = ''; // Limpiar el textarea
  }
});
