<?php
class ClientesModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function verNatural(){
        $sql = "SELECT * FROM pernatural;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function verJuridica(){
        $sql = "SELECT * FROM perjuridica;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function BuscarJuridica($nombres,$dni){
        $sql = "SELECT * FROM natural_tabla WHERE nombres LIKE '%$nombres%' AND dni LIKE '%$dni%';";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function BuscarNatural($query){
        $sql = "SELECT * FROM pernatural WHERE nombre LIKE '%$query%' OR dni LIKE '%$query%' OR ciudad LIKE '%$query%'";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }

    public function verificarNatural($idnatural){
        $sql = "SELECT * FROM pernatural WHERE idnatural = '$idnatural';";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    
    public function actualizarNatural($idnatural, $nombre, $apellidos, $dni, $sexo, $ciudad, $telefono, $email, $direccion, $feCreate, $feUpdate){
        $sql = "UPDATE pernatural SET nombre = '$nombre', apellidos = '$apellidos', dni = '$dni', sexo = '$sexo', ciudad = '$ciudad', `telefono` = '$telefono', `email` = '$email', `direccion` = '$direccion', `feCreate` = '$feCreate', `feUpdate` = '$feUpdate' WHERE (idnatural = '$idnatural');";
        $data = $this->conn->ConsultaSin($sql);
        return $data;
    }
    public function GetJuridicaId($id){
        $sql = "SELECT * FROM perjuridica WHERE idjuridica = '$id';";
        $res = $this->conn->ConsultaArray($sql);
        return $res;
    }
    public function UpdateJuridica($razonsocial,$telefono,$email,$web,$ruc,$rubro,$direccion,$feUpdate,$idjuridica){
        $sql = "UPDATE perjuridica SET `razonsocial` = '$razonsocial', `telefono` = '$telefono', `email` = '$email', `web` = '$web', `ruc` = '$ruc', `rubro` = '$rubro', `direccion` = '$direccion', `feUpdate` = '$feUpdate' WHERE (`idjuridica` = '$idjuridica');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
}



?>