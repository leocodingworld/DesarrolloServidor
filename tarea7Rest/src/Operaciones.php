<?php
namespace Clases;

require "../vendor/autoload.php";

use Clases\{
	Producto,
	Familia,
	Stock
};
use Clases\Rest\SimpleRest;


require_once("SimpleRest.php");
require_once("Producto.php");

class Operaciones extends SimpleRest  {
    
    public function getPvp($codP){
        $producto = new Producto();
        $producto->objetoProducto($codP);
        $precio = $producto->getPvp();
        $producto = null;
       
		return $precio;
    }

    public function getFamilias(){
        $familia = new familia(); 
        $familias = $familia->recuperarFamilias();
        $familia = null;
        return $familias;
	}
    

    public function getProductosFamilia($codF){
        $producto = new Producto();
        $productos = $producto->recuperarProductosFamilia($codF);
        $producto = null;
        return $productos;
    }

    public function getStock($codP,$codT){
        $stock = new Stock();
        $stocks = $stock->recuperarStocksProducto($codP,$codT);
        $stock = null;
        return $stocks; 
    }
}