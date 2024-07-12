<?php
class ActionsModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function Caducidad(){
        $sql = "SELECT idcotizacion,feLimite,estado FROM cotizaciones WHERE feLimite < NOW() AND estado = 'espera';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function UpdateCotizacion($id){
        $sql = "UPDATE cotizaciones SET estado = 'cancelado' WHERE idcotizacion = $id;";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
}