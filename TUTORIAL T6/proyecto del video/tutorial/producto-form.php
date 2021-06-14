<?php
    include 'conexion.php';
    if($_GET['op']=="agregar"){
        $codigo="0";
        $descripcion ="";
        $stock="0";
        $op="agregar";
    }else{
        $sql = "select * from productos where codigo = " . $_GET['id']; 
        $resultado = mysqli_query($conexionDB,$sql);
        $fila = $resultado -> fetch_assoc();
        $codigo= $fila['codigo'];
        $descripcion =$fila['descripcion'];
        $stock=$fila['stock'];
        $op="editar";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <form action="producto-abm.php" method="get">
        <label for="">Codigo</label>
        <input type="text"  name="txtCodigo" value="<?php echo $codigo;?>" >
        <br>
        <label for="">Descripcion</label>
        <input type="text" name="txtDescripcion" value="<?php echo $descripcion;?>" >
        <br>
        <label for="">Stock</label>
        <input type="text" name="txtStock" value="<?php echo $stock;?>" >
        <br>
        <input type="hidden" name="op" value="<?php echo $op;?>">
        <input type="submit" value="Guardar"> 
        <input type="button" value="Cancelar">
    </form>
    
</body>
</html>