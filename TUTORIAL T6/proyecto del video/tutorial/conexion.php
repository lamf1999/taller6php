<?php
    $user="root";
    $password="";
    $servidor="localhost";
    $baseDatos="tutorial";

    $conexionDB = mysqli_connect($servidor,$user,$password,$baseDatos);

    if($conexionDB==false){
        echo "No se pudo conectar la base de datos";
    }

?>