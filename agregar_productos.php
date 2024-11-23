<?php
session_start();
include'../js/db.php';
$producto=[];

$error='';
//datos del formulario
if($_SERVER['REQUESTED_METHOD']==='POST'){
    $Id_producto = $_POST['Id_producto'];
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $categoria=$_POST['categoria'];
    $Marca=$_POST['Marca'];
    $precio=$_POST['precio'];
    $stock=$_POST['stock'];

    //busqueda del producto
    $stm= $pdo->prepare("SELECT * FROM producto WHERE Id_producto = ? ");
    $stm->execute([$Id_producto]);
    //Inserccion de datos
    $stm =$pdo ->prepare("INSERT INTO producto (Id_producto, nombre, descripcion, categoria, Marca, precio, stock) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $stm->execute([$Id_producto, $nombre, $descripcion, $categoria, $Marca, $precio, $stock]);
    $mensaje="Proveedor agregado correctamente.";





}
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="styles.css"> </head>
<body>
    <h1>Gestión de Productos</h1>

    <div id="formulario">
        
        <label>Id del producto</label><input type="number" name='Id_producto' required>    
        <label>Nombre del producto:</label><input type="text" name="nombre" required>
        <label>Descripcion:</label><input  type="text"    name="descripcion" required>
        <label>Categoria:</label><input type="number" name="categoria" required>
        <label>Marca:</label><input type="text" name="Marca" required>
        <label>Precio:</label><input type="number" name="precio" required>
        <label>Stock</label><input type="number" name="stock" required>
        
          
        </div>

    <script src="script.js"></script>
</body>
</html>