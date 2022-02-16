<?php
namespace CarlosPaez\Clases;
require "../vendor/autoload.php";

use CarlosPaez\Clases\Conexion;
use PDO;

class Familia {
	private $cod;
	private $nombre;

	public function __constructor($cod, $nombre) {
		$this -> cod = $cod;
		$this -> nombre = $nombre;
	}

	public function getCodigo() {
		return $this -> cod;
	}

	public function getNombre() {
		return $this -> nombre;
	}

	public function setNombre($nombre) {
		$this -> nombre = $nombre;
	}

	public static function getFamilias() {
		$conex = (new Conexion());
		$conex -> conectar();
		
		$familias = $conex -> conexion -> query("SELECT * FROM familias");
		$familias = $familias -> conexion -> fetchAll(PDO::FETCH_CLASS ,"CarlosPaez\Clases\Familias");

		$conex = null;
		
		return $familias;
	}
}
?>