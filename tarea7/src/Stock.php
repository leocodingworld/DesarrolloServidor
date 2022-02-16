<?php
namespace CarlosPaez\Clases;
require "../vendor/autoload.php";

use CarlosPaez\Clases\Conexion;
use PDO;

class Stock {
	private $producto; // Tiene que ser el Objeto Producto
	private $tienda; // ??
	private int $unidades; 

	public function getProducto() {
		return $this -> producto;
	}

	public function getUnidades() {
		return $this -> unidades;
	}

	public static function getStock() {
		$conex = (new Conexion());
		$conex -> conectar();
		
		$stock = $conex -> conexion -> query("SELECT * FROM stock");
		$stock = $stock -> conexion -> fetchAll(PDO::FETCH_CLASS ,"CarlosPaez\Clases\Stock");

		$conex = null;
		
		return $stock;
	}
}
?>