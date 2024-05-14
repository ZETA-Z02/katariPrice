<?php
class LoginModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function validar($usuario,$password){
        $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND password = '$password'";
        $res = $this->conn->ConsultaArray($sql);
        return $res;
    }
    
    
}



?>