<?php

        include '../../config/conexion_2.php';
        $convocatoria = $_POST['convocatoria'];
        $tam = $_SESSION['tam'];

        if($tam == 1){
                $consulta = "SELECT aspirante.id, aspirante.nombre, 
                aspirante.apellido, aspirante.foto, examen_aspirante.resultado
                FROM aspirante, convocatoria_aspirante,examen_aspirante 
                where convocatoria_aspirante.convocatoria = '$convocatoria' AND
                aspirante.id = convocatoria_aspirante.aspirante AND
                aspirante.id = examen_aspirante.aspirante
                order by examen_aspirante.resultado desc limit 5";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
        }else if($tam == 0){
                $consulta = "SELECT aspirante.id, aspirante.nombre, 
                aspirante.apellido, aspirante.foto, examen_aspirante.resultado
                FROM aspirante, convocatoria_aspirante,examen_aspirante 
                where convocatoria_aspirante.convocatoria = '$convocatoria' AND
                aspirante.id = convocatoria_aspirante.aspirante AND
                aspirante.id = examen_aspirante.aspirante
                order by examen_aspirante.resultado desc limit 2";
                $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        }
        mysqli_close( $conexion );
        
        ?>