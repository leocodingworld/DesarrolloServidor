<?php
require "Producto.php";

class Cesta {
	private Array $cesta = [];
	private $total = 0.0;

	public function __construct() {
		$this -> cesta = [];
		$this -> total = 0.0;
	}

	public function getTotal() {
		return $this -> total;
	}

	public function addProducto($producto) {
		$this -> cesta[] = $producto;
		$this -> total += $producto -> getPvp();
	}

	public function deleteProducto($producto) {
		$index = array_search($producto, $this -> cesta);

		array_splice($this -> cesta, $index, 1);
		$this -> total -= $producto -> getPvp();
	}

	public function listarProductos() {
		foreach($this -> cesta as $producto) {
			echo "<tr>";

			echo "<td>{$producto -> getNombre()}</td>";
			// echo "<td>{$producto -> getDescripcion()}</td>";
			echo "<td>{$producto -> getPvp()}</td>";
			echo "<td><button name='borrar' value='{$producto -> getId()}'>Eliminar Producto</button></td>";

			echo "</tr>";
		}
	}

	public function contarProductos() {
		return sizeof($this -> cesta);
	}

	public function vaciarCesta() {
		$this -> cesta = [];
		$this -> total = 0.0;
	}
}

?>