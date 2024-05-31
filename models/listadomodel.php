<?php
class ListadoModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    // LISTAS COTIZACIONES
    public function ListarCotizacionesNatural()
    {
        $sql = "SELECT * from cotizacion_natural ORDER BY feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarCotizacionesJuridica()
    {
        $sql = "SELECT * FROM cotizacion_juridica ORDER BY feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarCotizacionesEstadoNatural($estado)
    {
        $sql = "SELECT * from cotizacion_natural WHERE estado = '$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarCotizacionesEstadoJuridica($estado)
    {
        $sql = "SELECT * FROM cotizacion_juridica where estado='$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // LISTAS COTIZACIONES END
    // LISTAS PROYECTOS 
    public function ListarProyectosNatural()
    {
        $sql = "SELECT * FROM proyectos_natural ORDER BY feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarProyectosJuridica()
    {
        $sql = "SELECT * FROM proyectos_juridica ORDER BY feCreate DESC;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarProyectosNaturalEstado($estado)
    {
        $sql = "SELECT * FROM proyectos_natural WHERE estado = '$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function ListarProyectosJuridicaEstado($estado)
    {
        $sql = "SELECT * FROM proyectos_juridica WHERE estado = '$estado';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    // LISTAS PROYECTOS END
    // LISTAR COTIZACIONES DETALLES -----
    public function CotizacionNaturalDetalle($id)
    {
        $sql = "SELECT n.*,concat(p.nombre,' ',p.apellidos) AS personal,c.precio AS costo,c.descripcion AS tipo_costo, c.idservicio
        FROM cotizacion_natural n
        JOIN personal p
        ON p.idpersonal = n.idpersonal
        JOIN costos c
        ON c.idcosto = n.idcosto
        WHERE idcotizacion='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function CotizacionJuridicaDetalle($id)
    {
        $sql = "SELECT n.*,concat(p.nombre,' ',p.apellidos) AS personal,c.precio AS costo,c.descripcion AS tipo_costo, c.idservicio
        FROM cotizacion_juridica n
        JOIN personal p
        ON p.idpersonal = n.idpersonal
        JOIN costos c
        ON c.idcosto = n.idcosto
        WHERE idcotizacion='$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function verificarCotizacion($id)
    {
        $sql = "select count(*) as total from proyectos where idcotizacion = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    // LISTAR COTIZACIONES DETALLES END
    // LISTAR PROYECTOS DETALLES -----
    public function ProyectoNaturalDetalle($id)
    {
        $sql = "SELECT n.*,concat(p.nombre,' ',p.apellidos) AS personal
        FROM proyectos_natural n
        JOIN personal p
        ON p.idpersonal=n.idpersonal
        WHERE idproyecto = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function ProyectoJuridicaDetalle($id)
    {
        $sql = "SELECT j.*,concat(p.nombre,' ',p.apellidos) AS personal
        FROM proyectos_juridica j
        JOIN personal p
        ON p.idpersonal=j.idpersonal
        WHERE idproyecto = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    // LISTAR PROYECTOS DETALLES END
    // CAMBIAR ESTADO DE COTIZACIONES -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
    public function CotizacionEstado($id, $estado)
    {
        $sql = "UPDATE `cotizaciones` SET `estado` = '$estado' WHERE `idcotizacion` = '$id';";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    // CAMBIAR ESTADO DE COTIZACIONES END-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
    // PASAR A PROYECTO UNA COTIZACION */-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
    public function PostProyectoNatural($proyecto, $id, $estado, $servicio, $actividades, $descripcion, $pendiente, $total, $feEntrega, $idpersonal, $idcotizacion, $monto, $saldo, $igv)
    {
        $this->conn->conn->begin_transaction();
        try {
            $sql = "INSERT INTO `proyectos` (`nomproyecto`, `idnatural`, `estado`, `idservicio`, `totalactividades`, `descripcion`, `pendientepago`, `total`, `feEntrega`, `idpersonal`, `idcotizacion`) VALUES ('$proyecto', '$id', '$estado', '$servicio', '$actividades', '$descripcion', '$pendiente', '$total', '$feEntrega', '$idpersonal', '$idcotizacion');";
            $res = $this->conn->ConsultaSin($sql);
            $idproyecto = $this->conn->conn->insert_id;
            $sqlPago = "INSERT INTO `katari`.`pagos` (`idproyecto`, `nomproyecto`, `idnatural`, `monto`, `saldo`, `igv`, `total`) VALUES ('$idproyecto', '$proyecto', '$id', '$monto', '$saldo', '$igv', '$total');";
            $resEstado = $this->CotizacionEstado($idcotizacion, "proyecto");
            $res1 = $this->conn->ConsultaSin($sqlPago);
            $idpago = $this->conn->conn->insert_id;
            $res2 = $this->PostPago($idpago, $monto, "Primer Pago");
            $res3 = $this->PostAvances($idproyecto, $idpersonal, 0, 0,$actividades);
            $this->conn->conn->commit();
            return $res2;
        } catch (Exception $e) {
            $this->conn->conn->rollback();
            echo "Error en model: " . $e->getMessage();
        }
        $this->conn->conn->close();
    }
    public function PostProyectoJuridica($proyecto, $id, $estado, $servicio, $actividades, $descripcion, $pendiente, $total, $feEntrega, $idpersonal, $idcotizacion, $monto, $saldo, $igv)
    {
        $this->conn->conn->begin_transaction();
        try {
            $sql = "INSERT INTO `proyectos` (`nomproyecto`, `idjuridica`, `estado`, `idservicio`, `totalactividades`, `descripcion`, `pendientepago`, `total`, `feEntrega`, `idpersonal`, `idcotizacion`) VALUES ('$proyecto', '$id', '$estado', '$servicio', '$actividades', '$descripcion', '$pendiente', '$total', '$feEntrega', '$idpersonal', '$idcotizacion');";
            $res = $this->conn->ConsultaSin($sql);
            $idproyecto = $this->conn->conn->insert_id;
            $sqlPago = "INSERT INTO `katari`.`pagos` (`idproyecto`, `nomproyecto`, `idjuridica`, `monto`, `saldo`, `igv`, `total`) VALUES ('$idproyecto', '$proyecto', '$id', '$monto', '$saldo', '$igv', '$total');";
            $resEstado = $this->CotizacionEstado($idcotizacion, "proyecto");
            $res1 = $this->conn->ConsultaSin($sqlPago);
            $idpago = $this->conn->conn->insert_id;
            $res2 = $this->PostPago($idpago, $monto, "Primer Pago");
            $res3 = $this->PostAvances($idproyecto, $idpersonal, 0, 0,$actividades);
            $this->conn->conn->commit();
            return $res2;
        } catch (Exception $e) {
            $this->conn->conn->rollback();
            echo "Error: " . $e->getMessage();
        }
        $this->conn->conn->close();
    }
    // PASAR A PROYECTO UNA COTIZACION END*/-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
    // CAMBIAR ESTADO DE PROYECTOS */-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
    public function ProyectoEstado($id, $estado)
    {
        $sql = "UPDATE `proyectos` SET `estado` = '$estado' WHERE `idproyecto` = '$id';";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function ProyectoActualizar($id, $actividades, $fecha, $descripcion)
    {
        $sql = "UPDATE `proyectos` SET `totalactividades` = '$actividades', `feEntrega` = '$fecha', `descripcion` = '$descripcion' WHERE `idproyecto` = '$id';";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    // CAMBIAR ESTADO DE PROYECTOS END*/-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
    // ****************PAGOS PROYECTO*************************
    public function ProyectoPagos($id)
    {
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
    public function PagoDetalle($id)
    {
        $sql = "SELECT * FROM pago_detalles WHERE idpago='$id';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function DeudaDetalle($id)
    {
        $sql = "SELECT * FROM pagos WHERE idproyecto = '$id';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    // ****************PAGOS PROYECTO END***************************
    // GUARDAR PAGO DETALLE
    public function PostPago($idpago, $monto, $concepto)
    {
        $sql = "INSERT INTO `pago_detalles` (`idpago`, `monto`, `concepto`) VALUES ('$idpago', '$monto', '$concepto');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function updatePago($idproyecto, $monto, $saldo)
    {
        $sql = "UPDATE `katari`.`pagos` SET `monto` = '$monto', `saldo` = '$saldo' WHERE (`idproyecto` = '$idproyecto');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function updateProyecto($idproyecto, $pendiente)
    {
        $sql = "UPDATE `katari`.`proyectos` SET `pendientepago` = '$pendiente' WHERE (`idproyecto` = '$idproyecto');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;

    }
    // esta funcion tambien se utiliza para proyectoAvances 
    public function selectProyecto($idproyecto)
    {
        $sql = "SELECT * FROM proyectos WHERE idproyecto = '$idproyecto'";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    public function selectPago($idproyecto)
    {
        $sql = "SELECT * FROM pagos WHERE idproyecto = '$idproyecto'";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    // GUARDAR PAGO DETALLE END
    //  ---**-*-*-*-*-*-*-*-*-*-AVANCES*-*--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-
    public function PostAvances($idproyecto, $idpersonal, $reportes, $porcentaje,$totalactividades)
    {
        $sql = "INSERT INTO `proyectoavances` (`idproyecto`, `idpersonal`, `reportes`, `porcentaje`, `totalactividades`) VALUES ('$idproyecto', '$idpersonal', '$reportes', '$porcentaje', '$totalactividades');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    public function selectAvances($idproyecto)
    {
        $sql = "SELECT CONCAT(p.nombre,' ',p.apellidos) AS nombres, a.* FROM proyectoavances a JOIN personal p ON p.idpersonal = a.idpersonal WHERE a.idproyecto ='$idproyecto';";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function avancesPersonal($id){
        $sql = "SELECT DISTINCT p.idpersonal, CONCAT(p.nombre, ' ', p.apellidos) AS nombres
        FROM personal p
        LEFT JOIN proyectoavances a ON p.idpersonal = a.idpersonal
        WHERE p.idpersonal NOT IN (
            SELECT idpersonal 
            FROM proyectoavances 
            WHERE idproyecto = $id);";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    public function SubirInforme($idproyecto,$idpersonal,$asunto,$descripcion,$iniciales){
        $sql = "INSERT INTO `katari`.`proyectoinformes` (`idproyecto`, `idpersonal`, `asunto`, `descripcion`, `iniciales`) VALUES ('$idproyecto', '$idpersonal', '$asunto', '$descripcion', '$iniciales');";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }

    public function updateAvances($idproyecto, $idpersonal)
    {
        $sql = "UPDATE `proyectoavances`
        SET `reportes` = `reportes` + 1,
            `porcentaje` = (`reportes` / `totalactividades`) * 100
        WHERE `idproyecto` = '$idproyecto' AND `idpersonal` = '$idpersonal';";
        $res = $this->conn->ConsultaSin($sql);
        return $res;
    }
    //  ---**-*-*-*-*-*-*-*-*-*-AVANCES END*-*--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-

}



?>