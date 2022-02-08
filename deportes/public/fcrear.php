<?php
require '../vendor/autoload.php';

use Clases\Puesto;
use Philo\Blade\Blade;

$views = "../views";
$cache = "../cache";
$titulo = 'Puestos';
$encabezado = 'Listado de Puestos';

$blade = new Blade($views, $cache);

$puestos = Puesto::getPuestos();

echo $blade
	-> view() 
	-> make('vcrear', compact('titulo', 'encabezado', 'puestos'))
	-> render();