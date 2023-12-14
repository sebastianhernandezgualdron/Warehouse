<?php

require_once "conexion.php";
class Proveedor {

    private $id;
    private $nombre;
    private $tel;
    private $correo;
    const TABLA = "proveedor";


    public function getId(){

        return $this->id;
    }
    
    public function getNombre(){

        return $this->nombre;
    }
    
    public function getTelefono(){

        return $this->tel;
    }

    public function getCorreo(){

        return $this->correo;
    }

    
    public function setId($id){

     $this->id = $id;
    }

    public function setNombre($nombre){

        $this->nombre = $nombre;
       }
    public function setTelefono($telefono){

        $this->tel = $telefono;
       }

    public function setCorreo($correo){

        $this->correo = $correo;
       }

    public function __construct($nombre, $tel, $correo, $id=null){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->tel = $tel;
        $this->correo = $correo;
    }

    public function guardar(){
        $conexion = new Conexion();
        if($this->id){
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET nombre_proveedor = :nombre, telefono = :apellido, correo = :cant WHERE id_proveedor = :id");
            $consulta->bindParam(":nombre", $this->nombre);
            $consulta->bindParam(":apellido", $this->tel);
            $consulta->bindParam(":cant", $this->correo);
            $consulta->bindParam(":id", $this->id);
            $consulta->execute();
        }else{
            
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(nombre_proveedor, telefono, correo) VALUES(:nombre, :telefono, :correo)");
            $consulta->bindParam(":nombre", $this->nombre);
            $consulta->bindParam(":telefono", $this->tel);
            $consulta->bindParam(":correo", $this->correo);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_proveedor");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_proveedor = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }
        
    
}

?>