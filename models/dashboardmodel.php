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
    public function Proyectos($id){
        $sql = "SELECT * FROM proyectos where idpersonal = '$id';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GraficoPastel(){
        $sql = "SELECT(SELECT count(*) FROM cotizaciones where idservicio = 100) AS estadistica,(SELECT count(*) FROM cotizaciones where idservicio = 200) AS software,(SELECT count(*) FROM cotizaciones where idservicio = 300) AS redes;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GraficoBarras(){
        $sql = "SELECT(SELECT count(*) FROM cotizaciones where estado = 'espera') AS espera,(SELECT count(*) FROM cotizaciones where estado = 'aceptado') AS aceptado,(SELECT count(*) FROM cotizaciones where estado = 'proyecto') AS proyecto,(SELECT count(*) FROM cotizaciones where estado = 'cancelado') AS rechazado;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GraficoLineal(){
        $sql = "SELECT DATE_FORMAT(feCreate, '%Y-%m') AS mes,COUNT(*) AS total FROM cotizaciones GROUP BY mes ORDER BY mes;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GraficoArea(){
        $sql = "SELECT p.nombre, p.apellidos, COUNT(*) AS total FROM personal p JOIN cotizaciones c ON p.idpersonal = c.idpersonal GROUP BY p.idpersonal, p.nombre, p.apellidos;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    
    
}



?>