<?php

namespace Clases;

use PDO;
use PDOException;
use Clases\Conexion;

class Jugador {
	private $id;
	private $nombre;
	private $apellidos;
	private $dorsal;
	private $barcode;

	public function getId() {
		return $this -> id;
	}

	public function getNombre() {
		return $this -> nombre;
	}

	public function getApellidos() {
		return $this -> apellidos;
	}

	public function getDorsal() {
		return $this -> dorsal;
	}

	public function getPosicion() {
		return $this -> posicion;
	}

	public function getBarcode() {
		return $this -> barcode;
	}

	public function setId($i) {
		$this -> id = $i;
	}

	public function setNombre($nombre) {
		$this -> nombre = $nombre;
	}

	public function setApellidos($apellidos) {
		$this -> apellidos = $apellidos;
	}

	public function setDorsal($dorsal) {
		$this -> dorsal = $dorsal;
	}

	public function setPosicion($posicion) {
		$this -> posicion = $posicion;
	}

	public function setBarcode($barcode) {
		$this -> barcode = $barcode;
	}

	public function getJugadores() {
		$conex = Conexion::conectar();

		$jugadores = $conex -> query("SELECT * FROM jugadores");
		$jugadores = $jugadores -> fetchAll(PDO::FETCH_CLASS, "Clases\Jugador");

		$conex = null;

		return $jugadores;
	}

	public function addJugador() {
		$conex = Conexion::conectar();

		$nuevo = $conex -> prepare(
			"INSERT INTO jugadores VALUES" .
			"(@id, @nombre, @apellidos, @dorsal, @posicion, @barcode)"
		);

		$nuevo -> bindParam("@id", $this -> id);
		$nuevo -> bindParam("@nombre", $this -> nombre);
		$nuevo -> bindParam("@apellidos", $this -> apellidos);
		$nuevo -> bindParam("@dorsal", $this -> dorsal);
		$nuevo -> bindParam("@posicion", $this -> posicion);
		$nuevo -> bindParam("@barcode", $this -> barcode);

		try {
			$nuevo -> execute();
		} catch(PDOException $e) {

		}

		$conex = null;
	}
}