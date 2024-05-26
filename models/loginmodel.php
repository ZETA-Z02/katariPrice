<?php
class LoginModel extends Model{

    function __construct()
    {
        parent::__construct();
    }
    public function validar($usuario,$password){
        $sql = "SELECT l.*,p.* FROM login l
        join personal p
        on l.idpersonal=p.idpersonal
        WHERE usuario = '$usuario' AND password = '$password';";
        $res = $this->conn->ConsultaArray($sql);
        return $res;
    }
    
    
}



?>