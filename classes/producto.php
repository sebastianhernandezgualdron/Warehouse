<?php

require_once "conexion.php";
class Producto {

    private $id;
    private $nombre_producto;
    private $precio_venta;
    private $cant_existente;
    const TABLA = "productos";


    public function getId(){

        return $this->id;
    }
    
    public function getNombre(){

        return $this->nombre_producto;
    }
    
    public function getPrecioVenta(){

        return $this->precio_venta;
    }

    public function getCantExistente(){

        return $this->cant_existente;
    }

    
    public function setId($id){

     $this->id = $id;
    }

    public function setNombre($nombre){

        $this->nombre_producto = $nombre;
       }
    public function setPrecioventa($precioVenta){

        $this->precio_venta = $precioVenta;
       }

    public function setCantExistente($CantExistente){

        $this->cant_existente = $CantExistente;
       }
    

    public function __construct($nombreProducto=null, $precioVenta=null, $CantExistente=null, $id=null){

        $this->id = $id;
        $this->nombre_producto = $nombreProducto;
        $this->precio_venta = $precioVenta;
        $this->cant_existente = $CantExistente;
    }

    public function guardar(){
        $conexion = new Conexion();
        if($this->id){
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET nombre_producto = :nombre, precio_venta = :apellido, cant_existente = :cant WHERE id_producto = :id");
            $consulta->bindParam(":nombre", $this->nombre_producto);
            $consulta->bindParam(":apellido", $this->precio_venta);
            $consulta->bindParam(":cant", $this->cant_existente);
            $consulta->bindParam(":id", $this->id);
            $consulta->execute();
        }else{
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(nombre_producto, precio_venta, cant_existente) VALUES(:nombre, :apellido, :cant)");
            $consulta->bindParam(":nombre", $this->nombre_producto);
            $consulta->bindParam(":apellido", $this->precio_venta);
            $consulta->bindParam(":cant", $this->cant_existente);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_producto");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }


    public function actualizarExist($actualizar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET cant_existente = :cant WHERE id_producto = :id");
        $consulta->bindParam(":cant", $actualizar);
        $consulta->bindParam(":id", $this->id);
        $consulta->execute();

        $conexion = null;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_producto = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }
    
}

?>