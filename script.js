document.addEventListener("DOMContentLoaded", function() {
  const recetas = document.querySelectorAll('.receta-item');

  recetas.forEach(receta => {
      const cardInfo = receta.querySelector('.card_info');

      receta.addEventListener('mouseenter', function() {
          cardInfo.style.transform = 'translateX(0)'; // Mostrar al hacer hover
      });

      receta.addEventListener('mouseleave', function() {
          cardInfo.style.transform = 'translateX(100%)'; // Ocultar al salir
      });
  });
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

function redirigirConIdPlatos(idBoton) {
  const boton = document.getElementById(idBoton);
  
  if (boton) {
    boton.addEventListener("click", function() {
      //vs  a la página con  nombre corresponde al id del botón, que se pone en el html
      window.location.href = "platos/platos_" + idBoton.replace('platos', '').toLowerCase() + ".html";
    });
  }
}
redirigirConIdPlatos("snacks");
redirigirConIdPlatos("cenas");
redirigirConIdPlatos("pastas");
redirigirConIdPlatos("pescado");
redirigirConIdPlatos("postres");
redirigirConIdPlatos("desayunos");
redirigirConIdPlatos("carne");
redirigirConIdPlatos("pollo");
redirigirConIdPlatos("vegetariano");
redirigirConIdPlatos("almuerzos");