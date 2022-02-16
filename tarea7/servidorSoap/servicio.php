<?php
require "../vendor/autoload.php";

$uri = "http://localhost/Servicios/tarea7/servidorSoap";
$parametros = ["uri" => $uri];

$server = new SoapServer(NULL, $parametros);
$server -> setClass("CarlosPaez\Clases\Operaciones");
$server -> handle();