<?php
namespace Clases;
require "../vendor/autoload.php";

use Clases\Conexion;
use PDO;
use PDOException;

class Vehiculo {
    private $matricula;
	private $marca;
	private $descripcion;
	private $PVP;
	private $tipo;
	private $vendido;

    public function getMatricula() {
        return $this -> matricula;
    }

    public function getMarca() {
        return $this -> marca;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getPvp() {
        return $this -> PVP;
    }

    public function getTipo() {
        return $this -> tipo;
    }

    public function getVendido() {
        return $this -> vendido;
    }

    public function setMatricula($matricula) {
        $this -> matricula = $matricula;
    }

    public function setMarca($marca) {
        $this -> marca = $marca;
    }

    public function setDescripcion($descripcion) {
        $this -> descripcion = $descripcion;
    }

    public function setPvp($pvp) {
        $this -> PVP = $pvp;
    }

    public function setTipo($tipo) {
        $this -> tipo = $tipo;
    }

    public function setVendido($vendido) {
        $this -> vendido = $vendido;
    }

    public static function getVehiculos() {
        $conex = Conexion::conectar();

        $vehiculos = $conex -> query("SELECT * FROM vehiculos");
        $vehiculos = $vehiculos -> fetchAll(PDO::FETCH_CLASS, "Clases\Vehiculo");

        $conex = null;

        return $vehiculos;
    }

    public function rebajar() {
        if($this -> PVP >= 200) {
            $this -> PVP -= 200;

            $conex = Conexion::conectar();

            $modificar = $conex -> prepare(
                "UPDATE vehiculos SET " .
                "PVP = :pvp " .
                "WHERE matricula = :matricula"
            );

            $modificar -> bindParam(":pvp", $this -> PVP);
            $modificar -> bindParam(":matricula", $this -> matricula);
            
            $modificar -> execute();
            try {
                
            } catch(PDOException $e) {

            }

            $conex = null;
        }
    }
}
