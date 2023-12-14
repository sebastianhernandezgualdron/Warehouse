<?php
require_once "./classes/tienda.php";
require_once "./classes/cliente.php";
require_once "./classes/producto.php";
require_once "./classes/proveedor.php";

$tiendaId = Tienda::mostrar();
$cliente = Cliente::mostrar();
$producto = Producto::mostrar();
$proveedor = Proveedor::mostrar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje</title>
</head>
<body>
    <form method="POST" action="./classes/registroCliente.php">
        <p>Cliente Id: <input type="text" name="id"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroProducto.php">
        <p>Nombre del producto: <input type="text" name="nombreP"></p>
        <p>precio del producto: <input type="text" name="precioP"></p>
        <p>cantidad del producto: <input type="text" name="cantP"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroProveedor.php">
        <p>Nombre del proveedor: <input type="text" name="nombreProv"></p>
        <p>telefono del proveedor: <input type="text" name="telefonoProv"></p>
        <p>correo del proveedor: <input type="text" name="correoProv"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroTienda.php">
        <p>Nombre de la tienda: <input type="text" name="nombreT"></p>
        <p>direccion de la tienda: <input type="text" name="direccionT"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroAdmin.php">
        <p>Documento del administrador: <input type="text" name="idA"></p>
        <p>Nombre del administrador: <input type="text" name="nomnreA"></p>
        <p>Cargo del aministrador: <input type="text" name="cargoA"></p>
        <p>Usuario del aministrador: <input type="text" name="usuarioA"></p>
        <p>Contraseña del aministrador: <input type="text" name="contraseñaA"></p>
        <p>Tienda a la que pertenece:    <select name="tiendaA">
            <?php foreach($tiendaId as $item):?>
                <option value="<?php echo $item["id_tienda"]?>"><?php echo $item["nombre"]?></option>
                <?php endforeach ?>
        </select></p>
     
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroVenta.php">
        <p>Cantidad vendida: <input type="text" name="cantV"></p>
        <p>fecha: <input type="date" name="fechaV"></p>
        <p>Cliente:    <select name="clienteV">
            <?php foreach($cliente as $item):?>
                <option value="<?php echo $item["id_cliente"]?>"><?php echo $item["id_cliente"]?></option>
                <?php endforeach ?>
        </select></p>
        <p>Producto:    <select name="productoV">
            <?php foreach($producto as $item):?>
                <option value="<?php echo $item["id_producto"]?>"><?php echo $item["nombre_producto"]?></option>
                <?php endforeach ?>
        </select></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroProductoTienda.php">
        <p>Cantidad en tienda: <input type="text" name="cantPorT"></p>
        <p>Producto:    <select name="productoT">
            <?php foreach($producto as $item):?>
                <option value="<?php echo $item["id_producto"]?>"><?php echo $item["nombre_producto"]?></option>
                <?php endforeach ?>
        </select></p>
        <p>Tienda a la que pertenece:    <select name="TiendaP">
            <?php foreach($tiendaId as $item):?>
                <option value="<?php echo $item["id_tienda"]?>"><?php echo $item["nombre"]?></option>
                <?php endforeach ?>
        </select></p>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <form method="POST" action="./classes/registroCompra.php">
        <p>Cantidad comprada: <input type="text" name="cantC"></p>
        <p>precio del proveedor: <input type="text" name="precioProvee"></p>
        <p>Producto:    <select name="productoC">
            <?php foreach($producto as $item):?>
                <option value="<?php echo $item["id_producto"]?>"><?php echo $item["nombre_producto"]?></option>
                <?php endforeach ?>
        </select></p>
        <p>Producto:    <select name="proveedorC">
            <?php foreach($proveedor as $item):?>
                <option value="<?php echo $item["id_proveedor"]?>"><?php echo $item["nombre_proveedor"]?></option>
                <?php endforeach ?>
            </select></p>
        <p><input type="submit" value="Enviar"></p>
    </form>
    
</body>
</html>
