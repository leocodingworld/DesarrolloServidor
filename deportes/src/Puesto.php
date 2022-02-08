<?php
namespace Clases;

use PDO;
use Clases\Conexion;

class Puesto {
	private $id;
    private $nombre;

	public function getId() {
		return $this -> id;
	}

	public function getNombre() {
		return $this -> nombre;
	}

	public function setId($i) {
		$this -> id = $i;
	}

	public function setNombre($nombre) {
		$this -> nombre = $nombre;
	}

	public static function getPuestos() {
		$conex = Conexion::conectar();

		$puestos = $conex -> query("SELECT * FROM puestos");
		$puestos = $puestos -> fetchAll(PDO::FETCH_CLASS, "Clases\Puesto");

		$conex = null;

		return $puestos;
	}
}