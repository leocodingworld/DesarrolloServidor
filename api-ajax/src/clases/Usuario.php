<?php
namespace Leo\Ajax\Clases;
require "../vendor/autoload.php";

class Usuario {
	private $usuario;
	private $pass;

	public function __construct($usuario, $pass) {
		$this -> usuario = $usuario;
		$this -> pass = hash("sha256", $pass) ?: "";
	}

	public function getUsuario() {
		return $this -> usuario;
	}
}
?>