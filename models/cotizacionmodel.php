<?php
class CotizacionModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    // INSERCIONES CLIENTES NATURAL Y JURIDICO
    public function Natural($nombre, $apellidos, $dni, $sexo, $ciudad, $telefono, $email, $direccion)
    {
        $sql = "INSERT INTO `pernatural` (`nombre`, `apellidos`, `dni`, `sexo`, `ciudad`, `telefono`, `email`, `direccion`) VALUES ('$nombre', '$apellidos', '$dni', '$sexo', '$ciudad', '$telefono', '$email', '$direccion');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function Juridica($razonsocial, $telefono, $email, $web, $ruc, $rubro, $direccion)
    {
        $sql = "INSERT INTO `katari`.`perjuridica` (`razonsocial`, `telefono`, `email`, `web`, `ruc`, `rubro`, `direccion`) VALUES ('$razonsocial', '$telefono', '$email', '$web', '$ruc', '$rubro', '$direccion');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    // INSERCIONES CLIENTES NATURAL Y JURIDICO END
    // CONSULTAS-> OBTENER
    public function GetNatural()
    {
        $sql = "SELECT *, CONCAT(nombre, ' ', apellidos) AS nombres FROM pernatural ORDER BY feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GetJuridica()
    {
        $sql = "SELECT * FROM perjuridica ORDER BY feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // Buscador
    public function SearchNatural($nombres, $dni)
    {
        $sql = "SELECT * FROM natural_tabla WHERE nombres LIKE '%$nombres%' AND dni LIKE '%$dni%';";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    public function SearchJuridica($razonsocial, $ruc)
    {
        $sql = "SELECT * FROM perjuridica WHERE razonsocial LIKE '%$razonsocial%' AND ruc LIKE '%$ruc%';";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    // CONSULTAS-> OBTENER END
    public function GetCostosEstadistica()
    {
        $sql = "SELECT * FROM costos WHERE idservicio = 100;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function GetRedes()
    {
        $sql = "SELECT * FROM costos WHERE idservicio = 300;";
        $res = $this->conn->ConsultaCon($sql);
        return $res;
    }
    // INSERCION CALCULADORA SOFTWARE
    public function CalcSoftware($nombre, $descripcion, $iddificultad, $idlenguaje, $idaplicacion, $costoservicio, $duracion, $costomantenimiento, $tiempomantenimiento, $opciones, $subtotal, $igv, $total, $idpersonal)
    {
        $sql = "INSERT INTO `katari`.`calc_software` (`nomproyecto`, `descripcion`, `iddificultad`, `idlenguaje`, `idaplicacion`, `costoservicio`, `duracionsemanas`, `costomantenimiento`, `tiempomantenimiento`, `opciones`, `subtotal`, `igv`, `total`, `idpersonal`) VALUES ('$nombre', '$descripcion', '$iddificultad', '$idlenguaje', '$idaplicacion', '$costoservicio', '$duracion', '$costomantenimiento', '$tiempomantenimiento', '$opciones', '$subtotal', '$igv', '$total', '$idpersonal');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    // INSERCION CALCULADORA SOFTWARE END
    // POST ESTADISTICA
    public function PostEstadisticaNatural($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha)
    {
        $sql = "INSERT INTO `katari`.`cotizaciones` (`idnatural`, `idservicio`, `idcosto`, `idpersonal`, `dias`, `precio`, `cantidad`, `descripcion`, `estado`, `feLimite`) VALUES ('$id', '$idservicio', '$idcosto', '$idpersonal', '$dias', '$precio', '$cantidad', '$descripcion', '$estado', '$fecha');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function PostEstadisticaJuridica($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha)
    {
        $sql = "INSERT INTO `katari`.`cotizaciones` (`idjuridica`, `idservicio`, `idcosto`, `idpersonal`, `dias`, `precio`, `cantidad`, `descripcion`, `estado`, `feLimite`) VALUES ('$id', '$idservicio', '$idcosto', '$idpersonal', '$dias', '$precio', '$cantidad', '$descripcion', '$estado', '$fecha');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function PostSoftwareNatural($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $feLimite, $idcalcsoftware)
    {
        $sql = "INSERT INTO `katari`.`cotizaciones` (`idnatural`, `idservicio`, `idcosto`, `idpersonal`, `dias`, `precio`, `cantidad`, `descripcion`, `estado`, `feLimite`, `idcalcsoftware`) VALUES ('$id', '$idservicio', '$idcosto', '$idpersonal', '$dias', '$precio', '$cantidad', '$descripcion', '$estado', '$feLimite', '$idcalcsoftware');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function PostSoftwareJuridica($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $feLimite, $idcalcsoftware)
    {
        $sql = "INSERT INTO `katari`.`cotizaciones` (`idjuridica`, `idservicio`, `idcosto`, `idpersonal`, `dias`, `precio`, `cantidad`, `descripcion`, `estado`, `feLimite`, `idcalcsoftware`) VALUES ('$id', '$idservicio', '$idcosto', '$idpersonal', '$dias', '$precio', '$cantidad', '$descripcion', '$estado', '$feLimite', '$idcalcsoftware');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function PostRedesNatural($id, $servicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha, $rutaExcel)
    {
        $sql = "INSERT INTO `katari`.`cotizaciones` (`idnatural`, `idservicio`, `idcosto`, `idpersonal`, `dias`, `precio`, `cantidad`, `descripcion`, `estado`, `feLimite`, `redesDetalles`) VALUES ('$id', '$servicio', '$idcosto', '$idpersonal', '$dias', '$precio', '$cantidad', '$descripcion', '$estado', '$fecha', '$rutaExcel');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function PostRedesJuridica($id, $servicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha, $rutaExcel)
    {
        $sql = "INSERT INTO `katari`.`cotizaciones` (`idjuridica`, `idservicio`, `idcosto`, `idpersonal`, `dias`, `precio`, `cantidad`, `descripcion`, `estado`, `feLimite`, `redesDetalles`) VALUES ('$id', '$servicio', '$idcosto', '$idpersonal', '$dias', '$precio', '$cantidad', '$descripcion', '$estado', '$fecha', '$rutaExcel');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function Proforma($id)
    {
        $sql = "SELECT co.idcotizacion,co.idnatural, co.idjuridica, co.descripcion,co.cantidad,co.precio,ser.tiposervicio,co.idcalcsoftware,
            COALESCE(concat(n.nombre,' ',n.apellidos), j.razonsocial) AS nombres,
            COALESCE(n.telefono, j.telefono) AS telefono,
            COALESCE(n.dni, j.ruc) AS identificador,
            COALESCE(n.email, j.email) AS email
            FROM cotizaciones co
			JOIN tipo_servicio ser ON ser.idservicio = co.idservicio
            LEFT JOIN pernatural n ON co.idnatural = n.idnatural
            LEFT JOIN perjuridica j ON co.idjuridica = j.idjuridica
            WHERE co.idcotizacion = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function CalculadoraSoftware($id)
    {
        $sql = "SELECT so.costomantenimiento,len.lenguaje,len.precio AS p_lenguaje,ap.aplicacion,ap.precio AS p_aplicacion FROM calc_software so JOIN lenguajes len ON so.idlenguaje=len.idlenguaje JOIN tipo_aplicacion ap ON so.idaplicacion=ap.idaplicacion WHERE idcalcsoftware = $id;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}



?>