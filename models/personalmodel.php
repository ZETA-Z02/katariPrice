<?php
class PersonalModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function GetPersonal()
    {
        $sql = "SELECT * FROM personal";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GetPersonalId($id)
    {
        $sql = "SELECT * FROM personal WHERE idpersonal = '$id'";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function GetLoginId($id)
    {
        $sql = "SELECT * FROM login WHERE idpersonal = '$id'";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function Create($nombre, $apellidos, $dni, $sexo, $telefono, $fechaNac, $email, $foto)
    {
        $sql = "INSERT INTO `katari`.`personal` (`nombre`, `apellidos`, `dni`, `sexo`, `telefono`, `fechaNac`, `email`, `foto`) VALUES ('$nombre', '$apellidos', '$dni', '$sexo', '$telefono', '$fechaNac', '$email', '$foto');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function CreateLogin($idpersonal, $usuario, $password, $estado)
    {
        $sql = "INSERT INTO `katari`.`login` (`idpersonal`, `usuario`, `password`, `estado`) VALUES ('$idpersonal', '$usuario', '$password', '$estado');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function UpdatePersonal($idpersonal, $nombre, $apellidos, $dni, $telefono, $email, $foto, $fecha)
    {
        $sql = "UPDATE `katari`.`personal` SET `nombre` = '$nombre', `apellidos` = '$apellidos', `dni` = '$dni', `telefono` = '$telefono', `email` = '$email', `foto` = '$foto', `feUpdate` = '$fecha' WHERE (`idpersonal` = '$idpersonal');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function UpdateLogin($idpersonal, $usuario, $password, $estado)
    {
        $sql = "UPDATE `katari`.`login` SET `usuario` = '$usuario', `password` = '$password', `estado` = '$estado' WHERE `idpersonal` = '$idpersonal';";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function Delete($id)
    {
        $sql = "DELETE FROM `katari`.`personal` WHERE (`idpersonal` = '$id');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function DeleteLogin($id){    
        $sql = "DELETE FROM `katari`.`login` WHERE (`idpersonal` = '$id');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }

}



?>