getData();

document.getElementById("campo").addEventListener("keyup", getData);

function getData() {
    let input = document.getElementById("campo").value;
    let content = document.getElementById("content"); // Asegúrate de tener este contenedor en tu HTML
    let url = "load.php";
    let formaData = new FormData();
    formaData.append('campo', input);
    
    fetch(url, {
        method: "POST",
        body: formaData
    }).then(response => response.json())
    .then(data => {
        content.innerHTML = data;  // Inserta el HTML generado
    }).catch(err => console.log(err));
}
