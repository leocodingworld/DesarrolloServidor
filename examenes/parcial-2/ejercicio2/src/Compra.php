<?php
namespace Clases;
require "../vendor/autoload.php";

use Clases\Conexion;
use PDO;

class Compra {
	private $contador;
	private $id_matricula;
	private $cliente;
	private $cuota;
	private $f_compra;
	private $pendiente;

	public function getContador() {
		return $this -> contador;
	}

	public function getMatricula() {
		return $this -> id_matricula;
	}

	public function getCliente() {
		return $this -> cliente;
	}

	public function getCuota() {
		return $this -> cuota;
	}

	public function getFechaCompra() {
		return $this -> f_compra;
	}

	public function getPendiente() {
		return $this -> pendiente;
	}

	public static function getCompras() {
		$conex = Conexion::conectar();

		$compras = $conex -> query("SELECT * FROM compras");
		$compras = $compras ->fetchAll(PDO::FETCH_CLASS, "Clases\Compra");

		$conex = null;

		return $compras;
	}
}
?>