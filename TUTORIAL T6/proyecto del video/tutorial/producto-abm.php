<?php
    include 'conexion.php';

    if($_GET['op']=='eliminar'){
        $codigo = $_GET['id'];
        $sql = "delete from productos where codigo=" . $codigo;
    }else{
        $codigo=$_GET['txtCodigo'];
        $descripcion = $_GET['txtDescripcion'];
        $stock = $_GET['txtStock'];
        if($_GET['op']=="agregar"){
            $sql="insert into productos(descripcion,stock) values('$descripcion','$stock')";
        }else if($_GET['op']=="editar"){
            $sql="update productos set descripcion = '$descripcion', stock = '$stock' where codigo='$codigo' ";
        }
    }
    $datos = mysqli_query($conexionDB, $sql);
    header('Location:producto-lista.php');

?>