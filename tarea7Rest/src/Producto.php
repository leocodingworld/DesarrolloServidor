<?php
namespace Clases;
require "../vendor/autoload.php";

use Clases\Conexion;
use PDO, PDOException;

class Producto{
    private $id;
    private $nombre;
    private $nombre_corto;
    private $pvp;
    private $familia;
    private $descripcion;

    // setters
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre_corto($nombre_corto) {
        $this->nombre_corto = $nombre_corto;
    }

    public function getNombre_corto() {
        return $this->nombre_corto;
    }

    public function setPvp($pvp) {
        $this->pvp = $pvp;
    }

    public function getPvp() {
        return $this->pvp;
    }

    public function setFamilia($familia){
        $this->familia = $familia;
    }

    public function getFamilia() {
        return $this->familia;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    function recuperarProductos() {
        $conexionBase = new Conexion();
        $conexion = $conexionBase->getConexion();

        $consulta = "select * from productos";
        $stmt = $conexion->prepare($consulta);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar productos: " . $ex->getMessage());
        }
        return $stmt;
    }

    function objetoProducto($id) {
        $conexionBase = new Conexion();
        $conexion = $conexionBase->getConexion();
        $consulta = "select * from productos where id=:id";

        $stmt = $conexion->prepare($consulta);

        try {
            $stmt->execute([':id' => $id]);
        } catch (PDOException $ex) {
            die("Error al recuperar el producto: " . $ex->getMessage());
        }
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->setId($filas->id);
            $this->setNombre($filas->nombre);
            $this->setNombre_corto($filas->nombre_corto);
            $this->setPvp($filas->pvp);
            $this->setFamilia($filas->familia);
            $this->setDescripcion($filas->descripcion);       
        }
    }

    function recuperarProductosFamilia($codFamilia) {
        $conexionBase = new Conexion();
        $conexion = $conexionBase->getConexion();

        $consulta = "select * from productos where familia=:familia";
        $stmt = $conexion->prepare($consulta);

        try {
            $stmt->execute([':familia' => $codFamilia]);
        } catch (PDOException $ex) {
            die("Error al recuperar productos: " . $ex->getMessage());
        }   
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}


?>


