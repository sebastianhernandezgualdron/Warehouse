<?php

require_once "conexion.php";
class Venta {

    private $id;
    private $cantVenta;
    private $fecha;
    private $idCliente;
    private $idProducto;
    const TABLA = "venta";


    public function getId(){

        return $this->id;
    }
    
    public function getCantVenta(){

        return $this->cantVenta;
    }
    
    public function getFecha(){

        return $this->fecha;
    }

    public function getIdCliente(){

        return $this->idCliente;
    }

    public function getIdProducto(){

        return $this->idProducto;
    }

    
    public function setId($id){

     $this->id = $id;
    }

    public function setCantVenta($cantVenta){

        $this->cantVenta = $cantVenta;
       }
    public function setFecha($fecha){

        $this->fecha = $fecha;
       }

    public function SetIdCliente($idCliente){

        $this->idCliente = $idCliente;
       }

    public function setIdProducto($idProducto){

        $this->idProducto = $idProducto;
       }

    public function __construct($cantVenta, $fecha, $idCliente, $idProducto, $id=null){

        $this->id = $id;
        $this->cantVenta = $cantVenta;
        $this->fecha = $fecha;
        $this->idCliente = $idCliente;
        $this->idProducto = $idProducto;
    }

    public function guardar(){
        $conexion = new Conexion();
        if($this->id){
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET cant_venta = :nombre, fecha = :apellido, id_cliente = :cant, id_producto = :producto WHERE id_venta = :id");
            $consulta->bindParam(":nombre", $this->cantVenta);
            $consulta->bindParam(":apellido", $this->fecha);
            $consulta->bindParam(":cant", $this->idCliente);
            $consulta->bindParam(":producto", $this->idProducto);
            $consulta->bindParam(":id", $this->id);
            $consulta->execute();
        }else{
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(cant_venta, fecha, id_cliente, id_producto) VALUES(:cant, :fecha, :cliente, :producto)");
            $consulta->bindParam(":cant", $this->cantVenta);
            $consulta->bindParam(":fecha", $this->fecha);
            $consulta->bindParam(":cliente", $this->idCliente);
            $consulta->bindParam(":producto", $this->idProducto);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_venta");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function ventaProductos(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare("SELECT venta.*, productos.nombre_producto AS nombre_producto, productos.precio_venta as precio_venta FROM venta 
        INNER JOIN productos ON venta.id_producto = productos.id_producto");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_venta = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }
    
        
    
}

?>