fetch("json/entradas.php")
    .then(response => response.json())
    .then(function(response){
        // Selecciono a a etiqueta de la sección
        var seccion = document.querySelector("section")
        // Vacío la sección para traer los artículos verdaderos
        seccion.innerHTML = ""
        console.log(response);
        for(let i = 0;i<response.entradas.length;i++){
            console.log("hola")
            seccion.innerHTML += `
                <article>
                    <h4>`+response.entradas[i].título+`</h4>
                    <time>`+response.entradas[i].fecha+`</time>
                    <p>`+response.entradas[i].texto+`</p>
                </article>
            `;
        }
    })  