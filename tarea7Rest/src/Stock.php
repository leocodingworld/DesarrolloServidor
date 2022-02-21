<?php

namespace Clases;

require "../vendor/autoload.php";

use Clases\Conexion;
use PDO;
use PDOException;

class Stock {
    private $producto;
    private $tienda;
    private $unidades;
    
  
    public function recuperarStock() {
        $conexionBase = new Conexion();
        $conexion = $conexionBase->getConexion();

        $consulta = "select * from stock";
        $stmt = $conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function recuperarStocksProducto($idP,$idT) {
        $conexionBase = new Conexion();
        $conexion = $conexionBase->getConexion();

        $consulta = "select * from stocks where producto=:producto and tienda=:tienda";
        $stmt = $conexion->prepare($consulta);

        try {
            $stmt->execute([':producto' => $idP,
                            ':tienda' => $idT]);
        } catch (PDOException $ex) {
            die("Error al recuperar productos: " . $ex->getMessage());
        }   
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>