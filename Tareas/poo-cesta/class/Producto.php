<?php
class Producto {
	private $id;
	private $nombre;
	private $nombre_corto;
	private $descripcion;
	private $pvp;
	// private Familia $familia;

	public function getId() {
		return $this -> id;
	}

	public function getNombre() {
		return $this -> nombre;
	}

	public function getCorto() {
		return $this -> nombre_corto;
	}

	public function getDescripcion() {
		return $this -> descripcion;
	}

	public function getPvp() {
		return $this -> pvp;
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function setNombre($nombre) {
		$this -> nombre = $nombre;
	}

	public function setCorto($corto) {
		$this -> nombre_corto = $corto;
	}

	public function setDescripcion($descripcion) {
		$this -> descripcion = $descripcion;
	}

	public function setPvp($pvp) {
		$this -> pvp = $pvp;
	}

	public function getProductos() {
		require_once "conexion.php";

		$conex = conexion();

		$productos = $conex -> query("SELECT * FROM productos");

		$productos = $productos -> fetchAll(PDO::FETCH_CLASS, "Producto");

		return $productos;

		$conex = null;
	}
}

?>