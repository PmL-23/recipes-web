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
                // Mostrar nombre y cantidad del ingrediente
                li.textContent = `${ingrediente.nombre} - Cantidad: ${ingrediente.cantidad}`; 
                ingredientesLista.appendChild(li);
            });
        } else {
            ingredientesLista.innerHTML = '<li>No se encontraron ingredientes.</li>';
        }
    })
    .catch(error => console.log(error));
}
