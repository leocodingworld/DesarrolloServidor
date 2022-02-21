<?php
require "../../vendor/autoload.php";

use Leo\Ajax\Persistencia\VotoDB;

$metodo = $_SERVER["REQUEST_METHOD"];
$controller = new VotoDB();

if($metodo == "GET") {
	if($_GET) {
		echo json_encode($controller -> getVotosProductos($_GET["producto"]));
	} else {
		echo json_encode($controller -> getVotosProductos());
	}


} else if ($metodo == "POST") {
	$data = json_decode(file_get_contents("php://input", true));

	if($data -> op == "usuario") {
		echo json_encode($controller -> votosUsuario($data -> usuario));
	} else {
		echo $controller -> votar($data -> valoracion, $data -> producto, $data -> usuario);
	}

}
