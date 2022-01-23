<?php
	function conexion() {
		define("HOST", "localhost"); //Aqui ira el host de nuestra aplicacion
		define("USER", "root"); // Usuario de la base de datos
		define("PASS", ""); // Contraseña del usuario
		define("DATABASE", "proyecto"); // Nombre de la base de datos
		define("DATOS", "mysql:host=" . HOST . ";dbname=" . DATABASE); //Datos de la base de datos

		try{   
			$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$conex = new PDO(DATOS, USER, PASS, $opciones);
			$conex -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch(PDOException $e){
			echo $e -> getCode();
			$mensaje = $e -> getMessage();
			echo "Error en la conexión: $mensaje"  ;
			exit();
		}

		return $conex;
	}
?>