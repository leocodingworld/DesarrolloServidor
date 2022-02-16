<?php
namespace CarlosPaez\Clases;
require "../vendor/autoload.php";

use PDO, PDOException;

class Conexion {
	private $user;
	private $passwd;
	private $host;
	private $database;
	private $datos;
	private $conexion;

	private const OPCIONES = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
	private const USER = "gestor";
	private const PASSWD = "secreto";
	private const HOST = "localhost";
	private const DATABASE = "proyecto";

	public function __constructor($user, $passwd, $host, $database) {
		$this -> user = $user ?: $this::USER;
		$this -> passwd = $passwd ?: $this::PASSWD;
		$this -> host = $host ?: $this::HOST;
		$this -> database = $database ?: $this::DATABASE;
		$this -> datos = "mysql:host={$this -> host};dbname={$this -> database}";
		$this -> conectar();
	}

	public function conectar() {
		try {
			$this -> conexion = new PDO($this -> datos,	$this -> user, $this -> passwd,	$this::OPCIONES);
			$this -> conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch(PDOException $pdoEx) {

		}

		return $this -> conexion ?: null ;
	}
}

?>