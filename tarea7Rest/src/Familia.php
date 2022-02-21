<?php

namespace Clases;

require "../vendor/autoload.php";

use Clases\Conexion;
use PDO;
use PDOException;

class Familia {
    private $cod;
    private $nombre;

    public function recuperarFamilias() {
        $conexionBase = new Conexion();
        $conexion = $conexionBase->getConexion();

        $consulta = "select * from familias";
        $stmt = $conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}