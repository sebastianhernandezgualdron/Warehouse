<?php

require_once "conexion.php";
class Compra {

    private $id;
    private $cantCompra;
    private $precioProveedor;
    private $idProducto;
    private $idProveedor;
    const TABLA = "compras";


    public function getId(){

        return $this->id;
    }
    
    public function getCantCompra(){

        return $this->cantCompra;
    }
    
    public function getIdProveedor(){

        return $this->idProveedor;
    }

    public function getPrceioProveedor(){

        return $this->precioProveedor;
    }

    public function getIdProducto(){

        return $this->idProducto;
    }

    
    public function setId($id){

     $this->id = $id;
    }

    public function setCantCompra($cantCompra){

        $this->cantCompra = $cantCompra;
       }
    public function setPrecioProveedor($precioProveedor){

        $this->precioProveedor = $precioProveedor;
       }

    public function setIdProveedor($idProveedor){

        $this->idProveedor = $idProveedor;
       }

    public function setIdProducto($idProducto){

        $this->idProducto = $idProducto;
       }

    public function __construct($cantCompra, $precioProveedor, $idProducto, $idProveedor, $id=null){

        $this->id = $id;
        $this->cantCompra = $cantCompra;
        $this->precioProveedor = $precioProveedor;
        $this->idProveedor = $idProveedor;
        $this->idProducto = $idProducto;
    }

    public function guardar(){
        $conexion = new Conexion();
        $consulta = null;
        if($this->id)
        {
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET cant_compra = :cant, precio_proveedor = :precioP, id_producto = :producto, id_proveedor = :proveedor WHERE id_compra = :id");
            $consulta->bindParam(":id", $this->id);
            
        }else{
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA ."(cant_compra, precio_proveedor, id_producto, id_proveedor) VALUES(:cant, :precioP, :producto, :proveedor)");
        }
        

      
        $consulta->bindParam(":cant", $this->cantCompra);
        $consulta->bindParam(":precioP", $this->precioProveedor);
        $consulta->bindParam(":producto", $this->idProducto);
        $consulta->bindParam(":proveedor", $this->idProveedor);
        $consulta->execute();
        if (!$this->id) {
            $this->id = $conexion->lastInsertId();
        }
    
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_compra");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }


    public static function compraProductos(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare("SELECT compras.*, productos.nombre_producto AS nombre_producto FROM compras 
        INNER JOIN productos ON compras.id_producto = productos.id_producto");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_compra = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }
    
}



?>