class Utiles {
	static crearElemento = (etiqueta, texto = "", atributos = []) => {
		let elementoNuevo = document.createElement(etiqueta) || "";
		let textoInterno = document.createTextNode(texto);

		elementoNuevo.appendChild(textoInterno);

		for(const [atributo, valor] of atributos) {
			elementoNuevo.setAttribute(atributo, valor);
		}

		return elementoNuevo;
	}

	static cambiarEstilos(elemento, estilos = []) {
		for(const [propiedad, valor] of estilos) {
			elemento.style[propiedad] = valor;
		}
	}

	static esNumero(string) {
		return isFinite(string);
	}

	static esEntero(numero) {
		return
	}
}
