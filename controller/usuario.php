<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
$usuario = new Usuario();

switch($_GET["op"]){
    case "guardarcomentario":
        $usuario->sendComent($_POST["comentario"],$_POST["entrevistador"],$_POST["aspirante"]);
        break;
        case "agendar":
        $usuario->insertConv($_POST["fecha"],$_POST["hora"],$_POST["entrevistador"],$_POST["aspirante_cita"],$_POST["conv"]);
        break;
}


?>