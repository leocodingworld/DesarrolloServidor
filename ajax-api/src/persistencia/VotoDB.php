<?php
namespace Leo\Ajax\Persistencia;
require "../../vendor/autoload.php";

use Leo\Ajax\Clases\Conexion;
use PDO, PDOException;

class VotoDB {
	private const SQL_BASE = "
		SELECT 
			productos.id AS id,
			productos.nombre AS nombre,
			AVG(votos.cantidad) AS media,
			COUNT(votos.id) AS valoraciones
		FROM 
			productos LEFT JOIN votos ON
				productos.id = votos.idPr
		GROUP BY nombre
		ORDER BY id;
	";
	
	private const SQL_WHERE = "
		SELECT 
			productos.id AS id,
			productos.nombre AS nombre,
			AVG(votos.cantidad) AS media,
			COUNT(votos.id) AS valoraciones
		FROM 
			productos LEFT JOIN votos ON
				productos.id = votos.idPr
		WHERE productos.id = :producto
		GROUP BY nombre
		ORDER BY id;
	";

	private const SQL_USUARIO = "
		SELECT 
			votos.idPr as producto
		FROM votos
		WHERE 
			votos.idUs = :usuario
	";

	public function getVotosProductos($producto = null) {
		$conex = (new Conexion()) -> getConexion();

		if($producto) {
			$votosProductos = $conex -> prepare($this::SQL_WHERE);
			$votosProductos	-> bindParam(":producto", $producto);
		} else {
			$votosProductos = $conex -> prepare($this::SQL_BASE);	
		}

		try {
			$votosProductos -> execute();
		} catch (PDOException $pdoEx) {}


		$votosProductos = $votosProductos -> fetchAll(PDO::FETCH_OBJ);
		
		$conex = null;

		return $votosProductos;
	}

	public function votosUsuario($usuario) {
		$conex = (new Conexion()) -> getConexion();
		$revisar  = $conex -> prepare($this::SQL_USUARIO);

		$revisar -> bindParam(":usuario", $usuario);
		try {
			$revisar -> execute();

		} catch (PDOException $pdoEx) {}

		return $revisar -> fetchAll(PDO::FETCH_OBJ);
	}

	public function votar($valoracion, $producto, $usuario){
		$res = -1;
	
		$conex = (new Conexion()) -> getConexion();
		$votar = $conex -> prepare(
			"INSERT INTO votos VALUES " .
			"(DEFAULT, :valoracion, :producto, :usuario)"
		);

		$votar -> bindParam(":valoracion", $valoracion);
		$votar -> bindParam(":producto", $producto);
		$votar -> bindParam(":usuario", $usuario);

		try {
			$votar -> execute();
			
			$res = 0;
		} catch(PDOException $pdoEx) {}

		$conex = null;

		return $res;
	}


}
?>