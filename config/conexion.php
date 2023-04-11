<?php

session_start();

class Conectar{
    protected $dbh;

    protected function Conexion(){
        try{
$conectar = $this->dbh = new PDO("mysql:local=http://192.9.155.64/;dbname=outsourcing","root","rootroot");
            return $conectar;
        } catch (Exception $e){
            print "Error DB!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function ruta(){
        return "http://192.9.155.64//outsourcing/";
    }
}


?>
