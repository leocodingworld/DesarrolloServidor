<?php
require '../vendor/autoload.php';
session_start();

use Philo\Blade\Blade;
use Clases\Compra;

if(!isset($_SESSION["compras"])) {
	$_SESSION["compras"] = Compra::getCompras();
}

if(isset($_POST["detalle"])) {

    $vehiculo = array_values(array_filter($_SESSION["compras"], function ($v) {
		return $v -> getMatricula() === $_POST["detalle"];
	}))[0];

    $index = array_search($vehiculo, $_SESSION["compras"]);
    $vehiculo = $_SESSION["compras"][$index];

}

$views = "../views";
$cache = "../cache";
$titulo = 'Detalle Compra';
$cabecera = 'Listado de Vehiculos';

$blade = new Blade($views, $cache);

echo $blade
	-> view() 
	-> make('vdetalle', compact('titulo', 'cabecera', 'vehiculo'))
	-> render();


?>