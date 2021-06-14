<?php 
    include 'conexion.php';

    if(isset($_GET['txtBuscar'])){
        $condicion= " where descripcion like '%" . $_GET['txtBuscar']. "%'";
    }else{
        $condicion="";
    }

    $sql = "select * from productos" .  $condicion;
    $resultado = mysqli_query($conexionDB, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Registros</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div class="contenedor">
        <section class="titulo">
            <h1>Registro de Productos</h1>
            <form action="producto-lista.php" method="get">
                <input type="text" name="txtBuscar" value="">
                <input type="submit" value="Buscar">
                <a href="producto-form.php?op=agregar&id=0"> Agregar Nuevo</a>
            </form>
        </section>

        <section class="lista">
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th width="150">Descripcion</th>
                        <th>Stock</th>
                        <th>Operaciones</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php
                        while($fila= $resultado->fetch_assoc()){ 
                    ?>
                        <tr>
                            <td><?php echo $fila['codigo']; ?></td>
                            <td><?php echo $fila['descripcion']; ?></td>
                            <td><?php echo $fila['stock']; ?></td>
                            <td>
                            <a href="producto-form.php?op=editar&id=<?php echo $fila['codigo']; ?>">Editar</a>
                            <a href="producto-abm.php?op=eliminar&id=<?php echo $fila['codigo']; ?>">Eliminar</a>  
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>            
            </table>

        </section>

    
    </div>

    
</body>
</html>