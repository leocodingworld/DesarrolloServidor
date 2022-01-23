<?php
class Familia {
	private $cod;
	private $nombre;

	public function getNombre() {
		return $this -> nombre;
	}

	public function getFamilias() {
		require "conexion.php";

		$conex = conexion();

		$familias = $conex -> query("SELECT * FROM familias");

		$familias = $familias -> fetchAll(PDO::FETCH_CLASS,	"Familia");

		return $familias;
	}
}

?>