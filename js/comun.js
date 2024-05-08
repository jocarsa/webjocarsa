window.onload = function(){
	elementos = document.querySelectorAll("section img")
	longitud = elementos.length;
	origen = elementos[Math.floor(Math.random()*longitud)].getAttribute("src")
	document.getElementById("banner").setAttribute("src",origen)
}