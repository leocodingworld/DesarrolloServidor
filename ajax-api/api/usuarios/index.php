<?php
header("Content-Type: application/json");

require "../../vendor/autoload.php";

use Leo\Ajax\Persistencia\UsuarioDB;

$http = $_SERVER["REQUEST_METHOD"];
$controller = new UsuarioDB();

if($http == "POST") {
	$data = json_decode(file_get_contents("php://input", true));

	echo $controller -> verificarUsuario($data -> usuario, $data -> passwd);
}

?>