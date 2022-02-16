<?php
namespace CarlosPaez\Clases;
require "../vendor/autoload.php";

use CarlosPaez\Clases\{
	Familia,
	Conexion,
	Producto,
	Stock
};

class Operaciones {
	public function getPvp($codigo) {
		$producto = Producto::getProductoById($codigo);
		$pvp = $producto -> getPvp();

		return $pvp;
	}

	public function getFamilias() {
		return Familia::getFamilias();
	}

	public function getProductoByFamilia($familia){
		
	}
}

?>