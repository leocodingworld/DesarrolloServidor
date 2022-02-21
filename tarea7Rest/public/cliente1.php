<?php
$url = "http://localhost/servicios/tarea7rest/rest/restcontroller.php?";


$dataPrecioProducto = json_decode(file_get_contents("{$url}view=precioproducto&id=6"));

if ($dataPrecioProducto == null){
    echo "No existe ningun producto con ese codigo";
} else {
    echo "PRECIO DEL PRODUCTO: ";
    echo $dataPrecioProducto;
}
echo "<br><br>";

$dataFamilias = json_decode(file_get_contents("{$url}view=familias"));
//echo "<pre>";
//print_r($dataFamilias);
//echo "</pre>";

if ($dataFamilias == null){
    echo "No existe la tabla que buscas";
} else {
    echo "LISTADO DE FAMILIAS:  <br>";
    foreach ($dataFamilias as $producto) {
        echo "Codigo: ".$producto->cod." : "." Nombre: ".$producto->nombre."<br>";
    }
}
echo "<br><br>";

$dataProductosFamilia = json_decode(file_get_contents("{$url}view=productosfamilia&familia=consol"));
//echo "<pre>";
//print_r($dataProductosFamilia);
//echo "</pre>";
if (count($dataProductosFamilia) == 0) {
    echo "No existe ningun producto con esa familia";
} else {
    echo "LISTADO DE PRODUCTOS DE UNA FAMILIA:<br> ";
    foreach ($dataProductosFamilia as $producto) {
        echo "ID: ".$producto->id." : "." Nombre: ".$producto->nombre." Nombre Corto: ".$producto->nombre_corto." Descripcion: ".$producto->descripcion." PVP: "." Familia: ".$producto->familia."<br>";
    }
}
echo "<br><br>";

$dataStocks = json_decode(file_get_contents("{$url}view=stock&producto=1&tienda=1"));
if (count($dataStocks) == 0) {
    echo "No existe ningun producto/tienda asociados a esos codigos";
} else {
    echo "STOCK DE UN PRODUCTO EN UNA TIENDA: ";
    for ($i=0; $i < count($dataStocks); $i++) { 
        echo $dataStocks[$i]->unidades;
    }
}
?>