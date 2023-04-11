<?php

        include '../../config/conexion_2.php';
        $id = $_POST['asp'];
        $conv = $_POST['conv'];
        $consulta = "SELECT * FROM aspirante WHERE id = '$id'";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        $consulta2 = "SELECT * FROM informacion WHERE aspirante = '$id'";
        $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        mysqli_close( $conexion );
        ?>