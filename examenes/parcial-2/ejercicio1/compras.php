<?php
require "./Compra.php";
session_start();

if (!isset($_SESSION["compras"])) {
	$_SESSION["compras"] = Compra::getCompras();
}

if(!isset($_SESSION["elegidos"])) {
	$_SESSION["elegidos"] = [];
}

if(isset($_POST["elegir"])) {
	$elegido = array_values(array_filter($_SESSION["compras"], function ($v) {
		return $v -> getMatricula() === $_POST["elegir"];
	}))[0];

    $index = array_search($elegido, $_SESSION["compras"]);
	$_SESSION["elegidos"][] = $_SESSION["compras"][$index];
}

if(isset($_POST["limpiar"])) {
	$_SESSION["elegidos"] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 1 - Compras</title>
	</head>

	<body>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<table>
				<tr>
					<th>Matrícula</th>
					<th>Cliente</th>
					<th>Couta</th>
					<th>Fecha Compra</th>
					<th>Pendiente</th>
				</tr>
				<?php
					foreach($_SESSION["compras"] as $compra) {
						echo "<tr>";

						echo "<td>{$compra -> getMatricula()}</td>";
						echo "<td>{$compra -> getCliente()}</td>";
						echo "<td>{$compra -> getCuota()}</td>";
						echo "<td>{$compra -> getFechaCompra()}</td>";
						echo "<td>{$compra -> getPendiente()}</td>";
						echo "<td><button value='{$compra -> getMatricula()}' name='elegir'>Elegir</button></td>";	

						echo "</tr>";
					}
				?>
			</table>
			<button name="limpiar">Limpiar</button>
			<button name="mostrar">Mostrar Clientes</button>
		</form>
		


		<?php

			if(isset($_POST["mostrar"])) {
				$mostrar = $_SESSION["elegidos"];

				foreach($mostrar as $cliente) {
					echo "<tr>";
	
					echo "<td>{$cliente -> getCliente()} <br></td>";
	
					echo "</tr>";
				}
			}
			
		?>
	</body>
</html>