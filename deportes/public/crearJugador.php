<?php
require "../vendor/autoload.php";

use Clases\{
	Jugador,
	Puesto
};
$puestos = Puesto::getPuestos();

$jugador = new Jugador();

$jugador -> setId(6);
$jugador -> setNombre($nombre);
$jugador -> setApellidos($apellidos);
$jugador -> setDorsal($dorsal);
$jugador -> setPosicion($posicion);
$jugador -> setBarcode($barcode);

$jugador -> addJugador();

// header('Location: index.php');
?>