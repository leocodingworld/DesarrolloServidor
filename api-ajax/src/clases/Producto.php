<?php
namespace Leo\Ajax\Clases;
require "../vendor/autoload.php";

class Producto {
	private $id;
	private $nombre;
	private $nombre_corto;
	private $descripcion;
	private $pvp;
	private $familia;

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

	public function getFamilia() {
		return $this -> familia;
	}
}
?>