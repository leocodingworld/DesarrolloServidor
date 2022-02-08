<?php
require '../vendor/autoload.php';
session_start();

use Philo\Blade\Blade;
use Clases\Vehiculo;

if(!isset($_SESSION["vehiculos"])) {
    $_SESSION["vehiculos"] = Vehiculo::getVehiculos();
}

if(isset($_POST["rebajar"])) {
    $vehiculo = array_values(array_filter($_SESSION["vehiculos"], function ($v) {
		return $v -> getMatricula() === $_POST["rebajar"];
	}))[0];

    $index = array_search($vehiculo, $_SESSION["vehiculos"]);
    $_SESSION["vehiculos"][$index] -> rebajar();
}

$views = "../views";
$cache = "../cache";
$titulo = 'Vehiculos';
$cabecera = 'Listado de Vehiculos';

$blade = new Blade($views, $cache);
$vehiculos = $_SESSION["vehiculos"];


echo $blade
	-> view() 
	-> make('vgestion', compact('titulo', 'cabecera', 'vehiculos'))
	-> render();
?>