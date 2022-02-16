<?php
namespace CarlosPaez\Clases;
require "../vendor/autoload.php";

use CarlosPaez\Clases\Conexion;
use PDO;
use PDOException;

class Producto {
	private $id;
	private $nombre;
	private $nombre_corto;
	private $descripcion;
	private float $pvp;
	private $familia;

	public function __constructor($id, $nombre, $nombre_corto, $descripcion, $pvp, $familia) {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> nombre_corto = $nombre_corto;
		$this -> descripcion = $descripcion;
		$this -> pvp = $pvp;
		$this -> familia = $familia;
	}

	public function getId() {
		return $this -> id;
	}

	public function getNombre() {
		return $this -> nombre;
	}

	public function getNombreCorto() {
		return $this -> nombre_corto;
	}

	public function getDescripcion() {
		return $this -> descripcion;
	}

	public function getPvp() {
		return $this -> pvp;
	}

	public function getFamilia() {
		return $this -> familia;
	}

	public function setNombre($nombre) {
		$this -> nombre = $nombre;
	}

	public function setNombreCorto($nombre_corto) {
		$this -> nombre_corto = $nombre_corto;
	}

	public function setDescripcion($descripcion) {
		$this -> descripcion = $descripcion;
	}

	public function setPvp($pvp) {
		$this -> pvp = $pvp;
	}

	public static function getProductos() {
		$conex = (new Conexion())-> conectar();
		
		$productos = $conex -> query("SELECT * FROM productos");
		$productos = $productos -> fetchAll(PDO::FETCH_CLASS, "CarlosPaez\Clases\Producto");

		$conex = null;
		
		return $productos;
	}

	public static function getProductoById($id = 0) {
		$conex = (new Conexion()) -> conectar();

		$producto = $conex -> prepare("SELECT * FROM productos WHERE id = :id");
		$producto -> bindParam(":id", $id);

		try {
			$producto -> execute();
			$producto -> setFetchMode(PDO::FETCH_CLASS, "CarlosPaez\Clases\Producto");

			return $producto -> fetch();
		} catch (PDOException $pe) {}
		
	}

	public static function getProductosByFamilia($familia) {
		$conex = (new Conexion()) -> conectar();

		$productos = $conex -> prepare("SELECT * FROM productos WHERE id = :id");
		$productos -> bindParam(":id", $id);

		try {
			$productos -> execute();

			return $productos -> fetchAll(PDO::FETCH_CLASS, "CarlosPaez\Clases\Producto");
		} catch (PDOException $pe) {}
	}
}
?>