<?php
class  empresa{
    
    public function conectarBD(){
        $con=mysqli_connect("localhost","root","rootroot","outsourcing") or die ("Problemas con la conexion de la base de datos");
		return $con;
    }
      public function lista(){  
        $empresa_id = $_SESSION["empresa"];
              $registros=mysqli_query($this->conectarBD(),"SELECT  * from empresa WHERE id = '$empresa_id' limit 1") or die(mysqli_error($this->conectarBD()));   
              
              
		      while ($reg=mysqli_fetch_array($registros))
		             {
            echo '<div class="col-sm-6">';
            echo '<center>';
            echo '<img class="img fotito" src="'.$reg['foto'].'">';     
            echo '</center>';
            echo '<table class="table responsive-table table-striped">';
            echo '<tr><h1>Empresa</h1></tr>';
            echo '<td>'.$reg['razon_social'].'</td></tr>';
            echo '<td>'.$reg['siglas'].'</td></tr>';
            echo '<td>'.$reg['giro'].'</td></tr>';
            echo '</table>';
            echo '</div>';
            echo '<div class="col-md-6">';
            echo '<center>';
            echo '<img class="img fotos" src="'.$reg['ceo_foto'].'">';
            echo '</center>';
            echo '<table class="table responsive-table table-striped">';
            echo '<tr><h1>CEO</h1></tr>';
            echo '<td>'.$reg['ceo'].'</td></tr>';
            echo '<td>'.$reg['celular'].'</td></tr>';
            echo '<td>'.$reg['direccion'].'</td></tr>';
            echo '</table>';
            echo '</div>';
                     }
                     
                        }
 public function cerrarBD(){  
                            mysqli_close($this->conectarBD());
                        }												 
                    }
?>