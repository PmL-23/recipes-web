document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("content").addEventListener("click", function(event) {
        if (event.target && event.target.classList.contains("verReceta")) {
            event.preventDefault();
            let idReceta = event.target.getAttribute("data-id");

            fetchPasosReceta(idReceta);
            fetchIngredientesReceta(idReceta); // Llamada para obtener ingredientes
        }
    });
});

function fetchPasosReceta(idReceta) {
    let modal = document.getElementById("modalReceta");
    let pasosLista = document.getElementById("pasosReceta");

    let url = "pasos.php";
    let formData = new FormData();
    formData.append('id_receta', idReceta);

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        pasosLista.innerHTML = '';

        if (data.length > 0) {
            data.forEach(paso => {
                // Dividir el texto del paso en oraciones separadas por un punto
                let oraciones = paso.texto.split('.');

                oraciones.forEach((oracion, index) => {
                    if (oracion.trim() !== '') { // Evitar agregar oraciones vacías
                        let li = document.createElement("li");
                        li.textContent = `${oracion.trim()}.`; // Agregar el punto al final
                        pasosLista.appendChild(li);
                    }
                });
            });
        } else {
            pasosLista.innerHTML = '<li>No se encontraron pasos.</li>';
        }

        modal.style.display = "block";
    })
    .catch(error => console.log(error));
}

function fetchIngredientesReceta(idReceta) {
    let ingredientesLista = document.getElementById("ingredientesReceta");
    
    let url = "ingredientes.php";
    let formData = new FormData();
    formData.append('id_receta', idReceta);

    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        ingredientesLista.innerHTML = '';

        if (data.length > 0) {
            data.forEach(ingrediente => {
                let li = document.createElement("li");
                li.textContent = ingrediente.nombre; // Ajustar según cómo se reciba el nombre
                ingredientesLista.appendChild(li);
            });
        } else {
            ingredientesLista.innerHTML = '<li>No se encontraron ingredientes.</li>';
        }
    })
    .catch(error => console.log(error));
}

// Cerrar el modal
document.querySelector(".cerrar").addEventListener("click", function() {
    document.getElementById("modalReceta").style.display = "none";
});

// Cerrar el modal al hacer clic fuera de él
window.addEventListener("click", function(event) {
    let modal = document.getElementById("modalReceta");
    if (event.target === modal) {
        modal.style.display = "none"; // Oculta el modal
    }
});
