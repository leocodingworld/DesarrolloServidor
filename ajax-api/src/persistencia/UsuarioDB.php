<?php
namespace Leo\Ajax\Persistencia;
require "../../vendor/autoload.php";

use PDOException;
use Leo\Ajax\Clases\Conexion;

class UsuarioDB{
	public function verificarUsuario($usuario, $passwd) {
		$verificado = "-1";
		$conex = (new Conexion()) -> getConexion();
		$passwd = hash("sha256", $passwd);

		$verificar = $conex -> prepare(
			"SELECT * FROM usuarios WHERE " .
			"usuario = :usuario AND pass = :passwd"
		);

		$verificar -> bindParam(":usuario", $usuario);
		$verificar -> bindParam(":passwd", $passwd);

		try {
			$verificar -> execute();

			if($verificar -> rowCount() > 0) {
				$verificado = "0";
			}

		} catch(PDOException $pdoEx) {

		}

		return $verificado;
	}
}