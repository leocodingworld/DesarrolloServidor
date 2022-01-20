<?php
require "../class/Cesta.php";
session_start();

if(isset($_POST["vaciar"])) {
	$_SESSION["cesta"] -> vaciarCesta();
}

if(isset($_POST["borrar"])) {	
	$producto = array_values(array_filter($_SESSION["productos"], function ($p) {
		return $p -> getId() === $_POST["borrar"];
	}))[0];

	$_SESSION["cesta"] -> deleteProducto($producto);
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
	<button name="vaciar">Vaciar cesta</button>
	<button><a href="./index.php">Volver a la tienda</a></button>
	<?php

	if(!isset($_SESSION["cesta"])) {
		echo "<h1>No hay productos en la cesta</h1>";
	} else {
		echo "<h1>En la cesta hay {$_SESSION["cesta"] -> contarProductos()} producto(s)</h1>";
		echo "<h2>Total: {$_SESSION["cesta"] -> getTotal()}€</h2>";

		echo "<table>";

		echo "<tr></tr>";

		$_SESSION["cesta"] -> listarProductos();
	
		echo "</table>";
	}
	?>
</form>