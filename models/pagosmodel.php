<?php
class PagosModel extends Model{

    function __construct()
    {
        parent::__construct();
    }    
    public function pagos(){        
        $sql = "SELECT pa.*, pro.idnatural, pro.idjuridica, pro.nomproyecto,pro.estado,pro.feCreate,
        COALESCE(concat(n.nombre,' ',n.apellidos), j.razonsocial) AS nombres,
        COALESCE(n.telefono, j.telefono) AS telefono,
        COALESCE(n.email, j.email) AS email
        FROM pagos pa
        JOIN proyectos pro ON pro.idproyecto = pa.idproyecto
        LEFT JOIN pernatural n ON pro.idnatural = n.idnatural
        LEFT JOIN perjuridica j ON pro.idjuridica = j.idjuridica
        ORDER BY pro.feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
}



?>