<?php
class ListadoModel extends Model{
    function __construct()
    {
        parent::__construct();
    }
    // LISTAS COTIZACIONES
    public function ListarCotizacionesNatural(){
        $sql = "SELECT * from cotizacion_natural;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarCotizacionesJuridica(){
        $sql = "SELECT * FROM cotizacion_juridica;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarCotizacionesEstadoNatural($estado){
        $sql = "SELECT * from cotizacion_natural WHERE estado = '$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarCotizacionesEstadoJuridica($estado){
        $sql = "SELECT * FROM cotizacion_juridica where estado='$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // LISTAS COTIZACIONES END
    // LISTAS PROYECTOS 
    public function ListarProyectosNatural(){
        $sql = "SELECT * FROM proyectos_natural;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarProyectosJuridica(){
        $sql = "SELECT * FROM proyectos_juridica;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarProyectosNaturalEstado($estado){
        $sql = "SELECT * FROM proyectos_natural WHERE estado = '$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarProyectosJuridicaEstado($estado){
        $sql = "SELECT * FROM proyectos_juridica WHERE estado = '$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // LISTAS PROYECTOS END
    // LISTAR COTIZACIONES DETALLES -----
    public function CotizacionNaturalDetalle($id){
        $sql = "SELECT n.*,concat(p.nombre,' ',p.apellidos) AS personal,c.precio AS costo,c.descripcion AS tipo_costo 
        FROM cotizacion_natural n
        JOIN personal p
        ON p.idpersonal = n.idpersonal
        JOIN costos c
        ON c.idcosto = n.idcosto
        WHERE idcotizacion='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function CotizacionJuridicaDetalle($id){
        $sql = "SELECT n.*,concat(p.nombre,' ',p.apellidos) AS personal,c.precio AS costo,c.descripcion AS tipo_costo 
        FROM cotizacion_juridica n
        JOIN personal p
        ON p.idpersonal = n.idpersonal
        JOIN costos c
        ON c.idcosto = n.idcosto
        WHERE idcotizacion='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    // LISTAR COTIZACIONES DETALLES END
    // LISTAR PROYECTOS DETALLES -----
    public function ProyectoNaturalDetalle($id){
        $sql = "SELECT n.*,concat(p.nombre,' ',p.apellidos) AS personal
        FROM proyectos_natural n
        JOIN personal p
        ON p.idpersonal=n.idpersonal
        WHERE idproyecto = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function ProyectoJuridicaDetalle($id){
        $sql = "SELECT j.*,concat(p.nombre,' ',p.apellidos) AS personal
        FROM proyectos_juridica j
        JOIN personal p
        ON p.idpersonal=j.idpersonal
        WHERE idproyecto = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    // LISTAR PROYECTOS DETALLES END
    // ****************PAGOS PROYECTO*************************
    public function ProyectoPagos($id){
        $sql = "SELECT pa.*, pro.idnatural, pro.idjuridica, pro.nomproyecto,pro.estado,
        COALESCE(concat(n.nombre,' ',n.apellidos), j.razonsocial) AS nombres,
        COALESCE(n.telefono, j.telefono) AS telefono,
        COALESCE(n.email, j.email) AS email
        FROM pagos pa
        JOIN proyectos pro ON pro.idproyecto = pa.idproyecto
        LEFT JOIN pernatural n ON pro.idnatural = n.idnatural
        LEFT JOIN perjuridica j ON pro.idjuridica = j.idjuridica
        WHERE pro.idproyecto = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function PagoDetalle($id){
        $sql = "SELECT * FROM pago_detalles WHERE idpago='$id';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }

    // ****************PAGOS PROYECTO END**************************************

}



?>