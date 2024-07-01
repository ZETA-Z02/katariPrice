<?php
class ConfiguracionModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function TablaCostos(){
        $sql = "SELECT costos.*,tipo_servicio.* FROM costos JOIN tipo_servicio ON costos.idservicio = tipo_servicio.idservicio;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function TablaAplicaciones(){
        $sql = "SELECT * FROM tipo_aplicacion";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function TablaServicios(){
        $sql = "SELECT * FROM tipo_servicio";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function TablaLenguajes(){
        $sql = "SELECT * FROM lenguajes";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function TablaDificultad(){
        $sql = "SELECT * FROM dificultad";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
}