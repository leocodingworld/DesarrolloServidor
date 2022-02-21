<?php
require "../vendor/autoload.php";
use Clases\Operaciones;
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "stock":
		$operacion = new Operaciones();
		$operacion->getStock($_GET["producto"], $_GET["tienda"]);
		break;
		
	case "precioproducto": // funciona
		$operacion = new Operaciones();
		echo json_encode($operacion->getPvp($_GET["id"]));
		break;

	case "productosfamilia" : 
		$operacion = new Operaciones();
		echo json_encode($operacion -> getProductosFamilia(strtoupper($_GET["familia"])));

		break;
	case "familias": //funciona
		$operacion = new Operaciones();
		echo json_encode($operacion -> getFamilias());

}
?>
