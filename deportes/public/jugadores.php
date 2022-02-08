<?php
require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Clases\Jugador;

$views = "../views";
$cache = "../cache";
$titulo = 'Jugador';
$cabecera = 'Listado de Jugadores';

$blade = new Blade($views, $cache);
$jugadores = (new Jugador()) -> getJugadores();

echo $blade
	-> view() 
	-> make('vjugadores', compact('titulo', 'cabecera', 'jugadores'))
	-> render();

?>