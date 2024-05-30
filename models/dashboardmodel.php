<?php
class DashboardModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    function TotalCotizaciones(){
        $sql = "SELECT count(*) AS total FROM cotizaciones;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    function TotalProyectos(){
        $sql = "SELECT count(*) AS total FROM proyectos;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    function TotalRecaudado(){
        $sql = "SELECT SUM(monto) AS total FROM pago_detalles;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    
    
}



?>