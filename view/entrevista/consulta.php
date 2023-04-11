<?php

        include '../../config/conexion_2.php';
        $aspirante = $_POST["aspirante"];    
        $entrevistador = $_POST["entrevistador"];
        $conv = $_POST['conv'];
        $consulta = "SELECT * FROM aspirante WHERE id = '$aspirante'";
	    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

        $consulta2 = "SELECT empresa.razon_social, convocatoria.nombre 
        FROM empresa, convocatoria
        WHERE empresa.id = convocatoria.empresa  AND
        convocatoria.id = '$conv'";
        $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        mysqli_close( $conexion );
        ?>