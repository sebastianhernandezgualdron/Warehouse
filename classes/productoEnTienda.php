<?php

require_once "conexion.php";
class ProductoEnTienda {

    private $id;
    private $cantPorTienda;
    private $fecha;
    private $repartidor;
    private $idProducto;
    private $idTienda;
    const TABLA = "producto_en_tienda";


    public function getId(){

        return $this->id;
    }
    
    public function getCantPorTienda(){

        return $this->cantPorTienda;
    }
    public function getFecha(){

        return $this->fecha;
    }
    public function getRepartidor(){

        return $this->repartidor;
    }
    
    public function getIdProducto(){

        return $this->idProducto;
    }

    public function getIdTienda(){

        return $this->idTienda;
    }

    
    public function setId($id){

     $this->id = $id;
    }

    public function setCantPorTienda($cantXTienda){

        $this->cantPorTienda = $cantXTienda;
       }
    public function setFecha($fecha){

        $this->fecha = $fecha;
       }
    public function setRepartidor($repartidor){

        $this->repartidor = $repartidor;
       }

    public function setIdProducto($idProducto){

        $this->idProducto = $idProducto;
       }


    public function setIdTienda($idTienda){

        $this->idTienda = $idTienda;
       }

    public function __construct($cantXTienda, $fecha, $repartidor, $idProducto, $idTienda, $id=null){

        $this->id = $id;
        $this->cantPorTienda = $cantXTienda;
        $this->fecha = $fecha;
        $this->repartidor = $repartidor;
        $this->idProducto = $idProducto;
        $this->idTienda = $idTienda;
    }

    public function guardar(){
        $conexion = new Conexion();
        if($this->id){
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET cant_por_tienda = :nombre, fecha = :apellido, repartidor = :cant, id_producto = :idProducto, id_tienda = : idTienda  WHERE id_producto_en_tienda = :id");
            $consulta->bindParam(":nombre", $this->cantPorTienda);
            $consulta->bindParam(":apellido", $this->fecha);
            $consulta->bindParam(":cant", $this->repartidor);
            $consulta->bindParam(":idProducto", $this->idProducto);
            $consulta->bindParam(":idTienda", $this->idTienda);
            $consulta->bindParam(":id", $this->id);
            $consulta->execute();
        }else{
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA . " (cant_por_tienda, fecha, repartidor, id_producto, id_tienda) VALUES (:cantxtienda, :fecha, :repar, :idproducto, :idtienda)");
            $consulta->bindParam(":cantxtienda", $this->cantPorTienda);
            $consulta->bindParam(":fecha", $this->fecha);
            $consulta->bindParam(":repar", $this->repartidor);
            $consulta->bindParam(":idproducto", $this->idProducto);
            $consulta->bindParam(":idtienda", $this->idTienda);
            $consulta->execute();
            
            $this->id = $conexion->lastInsertId();

    
        }
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_producto_en_tienda");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

  
        
    public static function mostrarPorTienda($idT){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " WHERE id_tienda = ". $idT ." ORDER BY id_producto_en_tienda");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function ProductoEnTienda(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare("SELECT producto_en_tienda.*, productos.nombre_producto AS nombre_producto FROM producto_en_tienda 
        INNER JOIN productos ON producto_en_tienda.id_producto = productos.id_producto");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }
    
    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_producto_en_tienda = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }
    
    
}

?>