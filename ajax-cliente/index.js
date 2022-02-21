// Variables de la aplicación
// Constante de URL de PHP con la que recibe datos
const URL_API = "http://localhost/ajax-api/api";

var viewLogin; // Contenedor que contienen la vista de inicio de sesión
var viewVotos; // Contenedor que contiene la tabla de los votos
var view; // la vista actuala

var formLogin; // El elemento del formulario de inicio de sesión
var inUsuario; // input del usuario
var inPasswd; // input de la contraseña
var btnLogin; // Boton que controla el inicio de sesiom

var tabla; // tabla de productos y sus votaciones
var fila;
var selectVoto;
var botonVoto;
var user;
var productosVotados = [];

window.onload = () => {
	viewLogin = document.getElementById("view-login");
	viewVotos = document.getElementById("view-votos");
	view = viewLogin;

	inUsuario = document.getElementById("inUser");
	inPasswd = document.getElementById("inPasswd");

	tabla = document.getElementById("productos");
	btnLogin = document.getElementById("btnForm");

	btnLogin.addEventListener("click", verficarUsuario)
}

function verficarUsuario() {
	let xhr = new XMLHttpRequest();
	let data = {
		usuario: inUsuario.value,
		passwd: inPasswd.value
	}

	xhr.open("POST", `${URL_API}/usuarios/`, true);
	xhr.onreadystatechange = autentificacion;
	xhr.send(JSON.stringify(data));
}

function autentificacion() {
	if (this.readyState === 4 && this.status === 200) {
		if (this.responseText == 0) {
			user = inUsuario.value;
			inPasswd.value = "";

			getProductosVotados();
			cambiarVistas();

		} else {
			// Pendiente de implementar
			// Mostrar en la página, el error
		}
	}
}

function cambiarVistas() {
	view.style.display = "none"

	if (view === viewLogin) {
		view = viewVotos;

		getVotosProductos();
	} else {
		tabla.innerHTML = "";

		view = viewLogin;
	}

	view.style.display = "block"
}

function getVotosProductos() {
	let xhr = new XMLHttpRequest();

	xhr.open("GET", `${URL_API}/votos/`, true);
	xhr.onreadystatechange = respuestaVotosProductos;

	xhr.send(null);
}

function respuestaVotosProductos() { // funciona, perfiesto
	if (this.readyState === 4 && this.status === 200) {
		tabla.innerHTML = "";
		respuesta = JSON.parse(this.responseText);

		for (let { id, nombre, media, valoraciones } of respuesta) {
			fila = Utiles.crearElemento("tr");

			let celdaProducto = Utiles.crearElemento("td", nombre);

			let celdaBoton = Utiles.crearElemento("td");

			if (!productosVotados.some(({ producto }) => producto == id)) {
				let select = Utiles.crearElemento("select", "", [["id", `select${id}`]]);
				let opts = [
					Utiles.crearElemento("option", "1", [["value", "1"]]),
					Utiles.crearElemento("option", "2", [["value", "2"]]),
					Utiles.crearElemento("option", "3", [["value", "3"]]),
					Utiles.crearElemento("option", "4", [["value", "4"]]),
					Utiles.crearElemento("option", "5", [["value", "5"]])
				];

				opts.forEach(opt => select.appendChild(opt));

				let boton = Utiles.crearElemento("button", "Votar", [
					["type", "button"],
					["id", `votar${id}`],
					["value", id]
				])
				boton.addEventListener("click", votar, false);

				if (
					(!selectVoto && !botonVoto) ||
					(selectVoto.id != `select${id}` && botonVoto.id != `votar${id}`)
				) {
					celdaBoton.appendChild(select);
					celdaBoton.appendChild(boton);
				}

			}

			fila.appendChild(celdaProducto);
			dibujarEstrellas(media, valoraciones);
			fila.appendChild(celdaBoton);

			tabla.appendChild(fila);
		}
	}
}

function dibujarEstrellas(media, valoraciones) {
	let texto = "Sin valoraciones";
	let valorEntero = 0;
	let valorDecimal = 0;
	let decimales = 0;
	let estrella;
	let celdaEstrellas = Utiles.crearElemento("td");

	if(valoraciones > 0) {
		texto = valoraciones;
	}

	let celdaValoraciones = Utiles.crearElemento("td", texto);

	if (media) {
		valorEntero = parseInt(media);
		valorDecimal = parseFloat(media);
		decimales = valorDecimal - valorEntero;
	}

	for(let i = 1; i <= 5; i++) {
		if(i <= valorEntero) {
			estrella = "./img/estrellaEntera.png";
		} else {
			estrella = "./img/estrellaVacia.png";
		}

		celdaEstrellas.appendChild(Utiles.crearElemento("img", "", [["src", estrella]]));

		if(decimales >= 0.5 && (i + decimales == valorDecimal)) {
			estrella = "./img/estrellaMedia.png";
			celdaEstrellas.appendChild(Utiles.crearElemento("img", "", [["src", estrella]]));
			i++;
		}
	}

	fila.appendChild(celdaValoraciones);
	fila.appendChild(celdaEstrellas);
}

function votar(e) {
	let evento = window.event || e;

	let xhr = new XMLHttpRequest();
	selectVoto = document.getElementById(`select${evento.target.value}`);
	botonVoto = document.getElementById(`votar${evento.target.value}`);


	let data = {
		op: "votar",
		usuario: user,
		producto: evento.target.value,
		valoracion: selectVoto.value
	}

	xhr.open("POST", `${URL_API}/votos/`, true);
	xhr.onreadystatechange = votacion;
	xhr.send(JSON.stringify(data));
}

function votacion() {
	if (this.readyState === 4 && this.status === 200) {
		if (this.responseText == 0) {
			getVotosProductos();
		}
	}
}

function getProductosVotados() {
	let xhr = new XMLHttpRequest();
	let data = {
		usuario: user,
		op: "usuario"
	}

	xhr.open("POST", `${URL_API}/votos/`, true);
	xhr.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			productosVotados = JSON.parse(this.responseText);
		}
	};
	xhr.send(JSON.stringify(data));
}