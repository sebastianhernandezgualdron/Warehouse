<?php

require_once "conexion.php";
class Cliente {

    private $id;

    const TABLA = "cliente";
    

    public function getId(){

        return $this->id;
    }
    

    public function setId($id){

     $this->id = $id;
    }

   

    public function __construct($id){

        $this->id = $id;

    }

    public function guardar(){
        $conexion = new Conexion();
        {
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(id_cliente) VALUES(:id_cliente)");
            $consulta->bindParam(":id_cliente", $this->id);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        
        $conexion = null;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_cliente = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_cliente");
        $consultas->execute();
        $registros = $consultas->fetchAll();

        return $registros;
        
    }  
}

?>