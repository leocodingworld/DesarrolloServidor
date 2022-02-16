<?php
namespace Leo\Ajax\Clases;

require "../vendor/autoload.php";

use PDO, PDOException;

class Conexion {
	private $user;
	private $passwd;
	private $host;
	private $database;
	private $data;
	private $conexion;

	private const USER = "gestor";
	private const PASSWD = "secreto";
	private const HOST = "localhost";
	private const DATABASE = "proyecto";
	private const OPTIONS = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAME utf8"];

	public function __construct($user, $passwd, $host, $database) {
		$this -> user = $user ?: self::USER;
		$this -> passwd = $passwd ?: self::PASSWD;
		$this -> host = $host ?: self::HOST;
		$this -> database = $database ?: self::DATABASE;
		$this -> data = "mysql:host={$this -> host};dbname={$this -> database}";
	}

	public function getConexion() {
		try {
			$this -> conexion = new PDO(
				$this -> data,
				$this -> user,
				$this -> passwd,
				$this::OPTIONS,
			);

			$this -> conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $pdoEx) {

		}

		return $this -> conexion ?: NULL;
	}
}
?>
