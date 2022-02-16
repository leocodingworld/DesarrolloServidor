<?php
namespace Leo\Ajax\Clases;
require "../vendor/autoload.php";

class Voto {
	private $id;
	private $cantidad;
	private $idPr;
	private $idUs;

	public function __construct($id, $cantidad, $idPr, $idUs) {
		$this -> id = $id ?: "";
		$this -> cantidad = $cantidad ?: "";
		$this -> idPr = $idPr ?: "";
		$this -> idUs = $idUs ?: "";
	}

	public function getId() {
		return $this -> id;
	}

	public function getCantidad() {
		return $this -> cantidad;
	}

	public function getIdProducto() {
		return $this -> idPr;
	}

	public function getIdUsuario() {
		return $this -> idUs;
	}
}

?>