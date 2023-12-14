<?php

require_once "conexion.php";
class Admin {

    private $id;
    private $nombre;
    private $cargo;
    private $usuario;
    private $contraseña;
    private $idTienda;
    const TABLA = "administrador";


    public function getId(){

        return $this->id;
    }
    
    public function getNombre(){

        return $this->nombre;
    }
    
    public function getCargo(){

        return $this->cargo;
    }

    public function getUsuario(){

        return $this->usuario;
    }

    public function getContraseña(){

        return $this->contraseña;
    }
    public function getIdTienda(){

        return $this->idTienda;
    }

    
    public function setId($id){

     $this->id = $id;
    }

    public function setNombre($nombre){

        $this->nombre = $nombre;
       }
    public function setCargo($cargo){

        $this->cargo = $cargo;
       }

    public function setUsuario($usuario){

        $this->usuario = $usuario;
       }

    public function setContraseña($contraseña){

        $this->contraseña = $contraseña;
       }

    public function setIdTienda($idTienda){

        $this->idTienda = $idTienda;
       }

    public function __construct($id=null, $nombre=null, $cargo=null, $usuario=null, $contraseña=null, $idTienda=null){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->cargo = $cargo;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->idTienda = $idTienda;
    }

    public function guardar(){
        $conexion = new Conexion();
        $consulta = null;
        $crear = false;

        $ids = Admin::mostrar();
        foreach($ids as $item):
            if ($item["id_admin"] == $this->id) {

                $crear = true;
                
            }
        endforeach;
        if ($crear) {
           
            $consulta = $conexion->prepare("UPDATE " . self::TABLA . " SET nombre_admin = :nombre, cargo = :cargo, usuario = :usuario, contraseña = :contrasena, id_tienda = :id_tienda WHERE id_admin = :id");
            $consulta->bindParam(":nombre", $this->nombre);
            $consulta->bindParam(":cargo", $this->cargo);
            $consulta->bindParam(":usuario", $this->usuario);
            $consulta->bindParam(":contrasena", $this->contraseña);
            $consulta->bindParam(":id_tienda", $this->idTienda);
            $consulta->bindParam(":id", $this->id);
            $consulta->execute();
        } else {
         
            $consulta = $conexion->prepare("INSERT INTO " . self::TABLA . " (id_admin, nombre_admin, cargo, usuario, contraseña, id_tienda) VALUES (:id, :nombre, :cargo, :usuario, :contrasena, :id_tienda)");
            $consulta->bindParam(":id", $this->id);
            $consulta->bindParam(":nombre", $this->nombre);
            $consulta->bindParam(":cargo", $this->cargo);
            $consulta->bindParam(":usuario", $this->usuario);
            $consulta->bindParam(":contrasena", $this->contraseña);
            $consulta->bindParam(":id_tienda", $this->idTienda);
            $consulta->execute();
        
        }
    
       
    
    
        $conexion = null;
    }

    public static function eliminar($aEliminar){
        $conexion = new Conexion();
        $consulta = $conexion->prepare("DELETE FROM " . self::TABLA . " WHERE id_admin = :id");
        $consulta->bindParam(":id", $aEliminar);
        $consulta->execute();
        
        $conexion = null;
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT * FROM ' . self::TABLA . " ORDER BY id_admin");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function traerIds(){
        $conexion = new Conexion();
        $consultas = $conexion->prepare('SELECT id_admin  FROM ' . self::TABLA . " ORDER BY id_admin");
        $consultas->execute();
        $registros = $consultas->fetchAll();
        return $registros;
    }

    public static function ValidarUsuario($usuarioA){
        $conexion = new Conexion();
        $consultaUsuario = $conexion->prepare("SELECT * FROM ". self::TABLA . " WHERE usuario = :usuario");
        $consultaUsuario->bindParam(":usuario", $usuarioA);
        $consultaUsuario->execute();
        $existeUsuario = $consultaUsuario->fetch();
        return $existeUsuario;
    }

    
        
    
}

?>