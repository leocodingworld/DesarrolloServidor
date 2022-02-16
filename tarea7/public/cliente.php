<?php

$url = 'http://localhost/Servicios/tarea7/servidorSoap/servicio.php';
$uri = 'http://localhost/Servicios/tarea7/servidorSoap';

try {
	$cliente = new SoapClient(null, ['location' => $url, 'uri' => $uri]);

	echo "{$cliente -> getPvp(1)}<br/> <br/>";
} catch (SoapFault $sf){
	die("Error al conectarse al servicio SOAP: <br/> {$sf -> getMessage()}");
}