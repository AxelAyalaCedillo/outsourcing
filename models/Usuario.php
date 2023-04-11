<?php
class Usuario extends Conectar{
    public function login(){
        $conectar=parent::conexion();
        parent::set_names();
        if(isset($_POST["enviar"])){
            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
            if(empty($usuario) and empty($pass)){
                header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
            }else{
                $sql = "SELECT * FROM entrevistador WHERE usuario=? and password=? ";
                $stmt=$conectar->prepare($sql);
                $stmt->bindValue(1, $usuario);
                $stmt->bindValue(2, $pass);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if(is_array($resultado) and count($resultado)>0){
                    $_SESSION["id"]=$resultado["id"];
                    $_SESSION["nombre"]=$resultado["nombre"];
                    $_SESSION["apellido"]=$resultado["apellido"];
                    $_SESSION["empresa"]=$resultado["empresa"];
                    $_SESSION["usuario"]=$resultado["usuario"];
                    $_SESSION["correo"]=$resultado["correo"];
                    header("Location:".Conectar::ruta()."view/HOME/");
                    exit();
                }else{
                    header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                }
            }
        }
    }
        public function sendComent(){
            $conectar=parent::conexion();
            $comentario=$_POST["coment"];
            if(isset($comentario)){
            $user=$_POST["user"];
            $ing= $_POST["ing"];
                if(empty($user) and empty($ing)){
                    header("Location:".conectar::ruta()."index.php?m=2");
                        exit();
                }else{
                    $sql= "INSERT INTO coment (coment_TXT, entrevistador, aspirante) VALUES (?, ?, ?)";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $comentario);
                    $stmt->bindValue(2, $user);
                    $stmt->bindValue(3, $ing);
                    $stmt->execute();
                    return $resultado = $stmt->fetchAll();
                }
            }
        }

        public function insertConv(){
            $conectar=parent::conexion();
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            if(isset($fecha) && isset($hora)){
                $entrevistador = $_POST["entrevistador"];
                $aspirante_cita = $_POST["aspirante_cita"];
                $conv = $_POST["conv"];
                if(empty($entrevistador) && empty($conv) && empty($aspirante_cita)){
                    echo 'alert("No estoy mandando nada")';
                }else{
                $sql= "INSERT INTO entrevista (fecha, hora, entrevistador, aspirante, convocatoria) VALUES (?, ?, ?, ?, ?)";
                $stmt=$conectar->prepare($sql);
                $stmt->bindValue(1, $fecha);
                $stmt->bindValue(2, $hora);
                $stmt->bindValue(3, $entrevistador);
                $stmt->bindValue(4, $aspirante_cita);
                $stmt->bindValue(5, $conv);
                $stmt->execute();
                return $resultado = $stmt->fetchAll();
                }
            }
        }
    
}
?>