<?php
class CalculadoraModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function GetDificultad(){
        $sql = "SELECT * FROM katari.dificultad;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function GetLenguaje(){
        $sql = "SELECT * FROM katari.lenguajes;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function GetAplicacion(){
        $sql = "SELECT * FROM katari.tipo_aplicacion;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function GetServicio(){
        $sql = "SELECT * FROM costos WHERE idservicio = 200;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    
}



?>