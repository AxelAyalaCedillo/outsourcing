<?php
    include '../../config/conexion_2.php';
        $empresa = $_SESSION["empresa"];
        $consulta = "SELECT * FROM convocatoria where empresa = $empresa";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        

        $consulta2 = "SELECT * FROM empresa WHERE id = '$empresa'";
        $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        mysqli_close( $conexion );
        ?>