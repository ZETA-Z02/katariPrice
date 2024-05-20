<?php
class CotizacionModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    // INSERCIONES
    public function Natural($nombre,$apellidos,$dni,$sexo,$ciudad,$telefono,$email,$direccion){
        $sql = "INSERT INTO `pernatural` (`nombre`, `apellidos`, `dni`, `sexo`, `ciudad`, `telefono`, `email`, `direccion`) VALUES ('$nombre', '$apellidos', '$dni', '$sexo', '$ciudad', '$telefono', '$email', '$direccion');";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function Juridica($razonsocial,$telefono,$email,$web,$ruc,$rubro,$direccion){
        $sql = "INSERT INTO `katari`.`perjuridica` (`razonsocial`, `telefono`, `email`, `web`, `ruc`, `rubro`, `direccion`) VALUES ('$razonsocial', '$telefono', '$email', '$web', $ruc, '$rubro', '$direccion');";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // CONSULTAS-> OBTENER
    public function GetNatural(){
        $sql = "SELECT * FROM natural_tabla;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;

    }
    public function GetJuridica(){
        $sql = "SELECT * FROM perjuridica;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    // Buscador
    public function SearchNatural($nombres,$dni){
        $sql = "SELECT * FROM natural_tabla WHERE nombres LIKE '%$nombres%' AND dni LIKE '%$dni%';";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function SearchJuridica($razonsocial,$ruc){
        $sql = "SELECT * FROM perjuridica WHERE razonsocial LIKE '%$razonsocial%' AND ruc LIKE '%$ruc%';";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    
    
}



?>