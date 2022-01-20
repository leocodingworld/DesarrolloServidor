<?php
require "../class/Cesta.php";

session_start();

if(!isset($_SESSION["cesta"])) {
	$_SESSION["cesta"] = new Cesta();
}

if(!isset($_SESSION["productos"])) {
	$_SESSION["productos"]	= (new Producto()) -> getProductos();
}

if(isset($_POST["add"])) {
	$producto = array_values(array_filter($_SESSION["productos"], function ($p) {
		return $p -> getId() === $_POST["add"];
	}))[0];

	$_SESSION["cesta"] -> addProducto($producto);

	echo "<h2>Añadido a la cesta</h2>";
}
?>

<button><a href="./listado.php">Mostrar Productos</a></button>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

<?php

echo "<table>";

foreach($_SESSION["productos"] as $producto) {
	echo "<tr>";

	echo "<td>{$producto -> getNombre()}</td>";
	echo "<td>{$producto -> getPvp()}€</td>";
	echo "<td><button name='add' value='{$producto -> getId()}'>Añadir a la Cesta</button></td>";

	echo "</tr>";
}

echo "</table>";


?>
</form>
