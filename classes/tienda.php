<?php

require_once "conexion.php";
class Tienda {

    private $id;
    private $nombreTienda;
    private $direccion;

    const TABLA = "tienda";


    public function getId(){

        return $this->id;
    }

    public function getNombreTienda(){

        return $this->nombreTienda;
    }

    public function getDireccionTienda(){

        return $this->direccion;
    }
    

    public function setId($id){

     $this->id = $id;
    }

    public function setNombreTienda($nombreT){

     $this->nombreTienda = $nombreT;
    }

    public function setDireccionTienda($direccion){

     $this->direccion = $direccion;
    }

   

    public function __construct($nombreT, $direccionT, $id=null){

        $this->id = $id;
        $this->nombreTienda = $nombreT;
        $this->direccion = $direccionT;

    }

    public function guardar(){
        $conexion = new Conexion();
        if($this->id){
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET nombre = :nombre, direccion = :apellido WHERE id_tienda = :id");
            $consulta->bindParam(":nombre", $this->nombreTienda);
            $consulta->bindParam(":apellido", $this->direccion);
            $consulta->bindParam(":id", $this->id);
            $consulta->execute();
        }else{
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(nombre, direccion) VALUES(:nombreT, :direccionT)");
            $consulta->bindParam(":nombreT", $this->nombreTienda);
            $consulta->bindParam(":direccionT", $this->direccion);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_tienda");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_tienda = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }
        
    
}

?>