<?php
class Listado extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function render()
	{
		$this->view->Render('listado/index');
	}
	function cotizacion()
	{
		$this->view->Render('listado/cotizacionDetalle');
	}
	function proyecto()
	{
		$this->view->Render('listado/proyectoDetalle');
	}
	function pagos()
	{
		$this->view->Render('listado/proyectoPago');
	}
	function avances()
	{
		$this->view->Render('listado/proyectoAvances');
	}
	// LISTAR COTIZACIONES ***************************************
	public function listarCotizacionesNatural()
	{
		$data = $this->model->ListarCotizacionesNatural();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcotizacion" => $row['idcotizacion'],
				"nombres" => $row['nombres'],
				"telefono" => $row['telefono'],
				"servicio" => $row['tiposervicio'],
				"precio" => $row['precio'],
				"estado" => $row['estado'],
				"fechaLimite" => $row['feLimite'],
			);
		}
		echo json_encode($json);
	}
	public function listarCotizacionesJuridica()
	{
		$data = $this->model->ListarCotizacionesJuridica();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcotizacion" => $row['idcotizacion'],
				"razonsocial" => $row['razonsocial'],
				"telefono" => $row['telefono'],
				"servicio" => $row['tiposervicio'],
				"precio" => $row['precio'],
				"estado" => $row['estado'],
				"fechaLimite" => $row['feLimite'],
			);
		}
		echo json_encode($json);

	}
	public function listarCotizacionesEstadoNatural()
	{
		$estado = $_POST['estado'];
		$data = $this->model->ListarCotizacionesEstadoNatural($estado);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcotizacion" => $row['idcotizacion'],
				"nombres" => $row['nombres'],
				"telefono" => $row['telefono'],
				"servicio" => $row['tiposervicio'],
				"precio" => $row['precio'],
				"estado" => $row['estado'],
				"fechaLimite" => $row['feLimite'],
			);
		}
		echo json_encode($json);
	}
	public function listarCotizacionesEstadoJuridica()
	{
		$estado = $_POST['estado'];
		$data = $this->model->ListarCotizacionesEstadoJuridica($estado);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcotizacion" => $row['idcotizacion'],
				"razonsocial" => $row['razonsocial'],
				"telefono" => $row['telefono'],
				"servicio" => $row['tiposervicio'],
				"precio" => $row['precio'],
				"estado" => $row['estado'],
				"fechaLimite" => $row['feLimite'],
			);
		}
		echo json_encode($json);
	}
	// LISTAR COTIZACIONES *END**************************************
	// LISTAR PROYECTOS ***************************************
	public function listarProyectosNatural()
	{
		$data = $this->model->ListarProyectosNatural();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idproyecto" => $row['idproyecto'],
				"proyecto" => $row['nomproyecto'],
				"usuario" => $row['nombres'],
				"estado" => $row['estado'],
				"servicio" => $row['tiposervicio'],
				"pendiente" => $row['pendientepago'],
				"total" => $row['total'],
				"entrega" => $row['feEntrega'],
			);
		}
		echo json_encode($json);
	}
	public function listarProyectosJuridica()
	{
		$data = $this->model->ListarProyectosJuridica();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idproyecto" => $row['idproyecto'],
				"proyecto" => $row['nomproyecto'],
				"empresa" => $row['razonsocial'],
				"estado" => $row['estado'],
				"servicio" => $row['tiposervicio'],
				"pendiente" => $row['pendientepago'],
				"total" => $row['total'],
				"entrega" => $row['feEntrega'],
			);
		}
		echo json_encode($json);
	}
	public function listarProyectosNaturalEstado()
	{
		$estado = $_POST['estado'];
		$data = $this->model->ListarProyectosNaturalEstado($estado);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idproyecto" => $row['idproyecto'],
				"proyecto" => $row['nomproyecto'],
				"usuario" => $row['nombres'],
				"estado" => $row['estado'],
				"servicio" => $row['tiposervicio'],
				"pendiente" => $row['pendientepago'],
				"total" => $row['total'],
				"entrega" => $row['feEntrega'],
			);
		}
		echo json_encode($json);
	}
	public function listarProyectosJuridicaEstado()
	{
		$estado = $_POST['estado'];
		$data = $this->model->ListarProyectosJuridicaEstado($estado);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idproyecto" => $row['idproyecto'],
				"proyecto" => $row['nomproyecto'],
				"empresa" => $row['razonsocial'],
				"estado" => $row['estado'],
				"servicio" => $row['tiposervicio'],
				"pendiente" => $row['pendientepago'],
				"total" => $row['total'],
				"entrega" => $row['feEntrega'],
			);
		}
		echo json_encode($json);
	}
	// LISTAR PROYECTOS END **************************************
	// DETALLES COTIZACIONES ------------------------------------
	public function cotizacionNaturalDetalle($nparam = null)
	{
		$id = $nparam[0];
		$data = $this->model->CotizacionNaturalDetalle($id);
		$data2 = $this->model->verificarCotizacion($data['idcotizacion']);
		$this->view->data2 = $data2;
		$this->view->data = $data;
		$this->cotizacion();
	}
	public function cotizacionJuridicaDetalle($nparam = null)
	{
		$id = $nparam[0];
		$data = $this->model->CotizacionJuridicaDetalle($id);
		$data2 = $this->model->verificarCotizacion($data['idcotizacion']);
		$this->view->data2 = $data2;
		$this->view->data = $data;
		$this->cotizacion();
	}
	// DETALLES COTIZACIONES END------------------------------------
	// DETALLES COTIZACIONES ------------------------------------
	public function proyectoNaturalDetalle($nparam = null)
	{
		$id = $nparam[0];
		$data = $this->model->ProyectoNaturalDetalle($id);
		$this->view->data = $data;
		$this->proyecto();
	}
	public function proyectoJuridicaDetalle($nparam = null)
	{
		$id = $nparam[0];
		$data = $this->model->ProyectoJuridicaDetalle($id);
		$this->view->data = $data;
		$this->proyecto();
	}
	// DETALLES COTIZACIONES END------------------------------------
	// ***************************PAGOS PROYECTO********************
	public function proyectoPagos($nparam = null)
	{
		$id = $nparam[0];
		$data = $this->model->ProyectoPagos($id);
		$this->view->data = $data;
		$this->pagos();
	}
	public function pagoDetalle()
	{
		$id = $_POST['idpago'];
		$data = $this->model->PagoDetalle($id);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idpagodetalle" => $row['idpagodetalle'],
				"monto" => $row['monto'],
				"concepto" => $row['concepto'],
				"fecha" => $row['fecha'],
			);
		}
		echo json_encode($json);
	}
	public function deudaDetalle(){
		$id = $_POST['idproyecto'];
		$data = $this->model->DeudaDetalle($id);
		echo json_encode($data);
	}
	public function postPago(){
		$idproyecto = $_POST['idproyecto'];
		$idpago = $_POST['idpago'];
		$monto = $_POST['monto'];
		$concepto = $_POST['concepto'];
		$proyecto = $this->model->selectProyecto($idproyecto);
		$pago = $this->model->selectPago($idproyecto);
		$montoPago = $pago['monto'] + $monto;
		$saldoPago = $pago['total'] - $montoPago;
		$pendienteProyecto = $proyecto['total'] - $montoPago;
		// echo "monto nuevo pago: $monto--> monto nuevo que pago: $montoPago --> pendiente nuevo proyecto: $pendienteProyecto --> saldo nuevo proyecto: $saldoPago";
		$this->model->conn->conn->begin_transaction();
        try {
			$res = $this->model->PostPago($idpago, $monto, $concepto);
			$res1 = $this->model->updatePago($idproyecto,$montoPago,$saldoPago);
			$res2 = $this->model->updateProyecto($idproyecto,$pendienteProyecto);
            $this->model->conn->conn->commit();
			if($res && $res1 && $res2){
				echo "EXITO EN LA INSERCION DE PAGO";
			}else{
				echo "ERROR EN LA INSERCION DE PAGO";
			}
        } catch (Exception $e) {
            $this->model->conn->conn->rollback();
            echo "Error en model: " . $e->getMessage();
        }
        $this->model->conn->conn->close();
	}
	// ***************************PAGOS PROYECTO*END*******************

	// -*-*-*-*-*-*-*-*-*PROYECTO AVANCES-*-*-*-*-*-*
	public function proyectoAvances($nparam = null)
	{
		$id = $nparam[0];
		//$data = $this->model->ProyectoPagos($id);
		//$this->view->data = $data;
		$this->avances();
	}
	// -*-*-*-*-*-*-*-*-*PROYECTO AVANCES-END*-*-*-*-*-*
	// CAMBIAR ESTADO DE COTIZACIONES */-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
	public function cotizacionEstado()
	{
		$id = $_POST['id'];
		$estado = $_POST['estado'];
		if ($this->model->CotizacionEstado($id, $estado)) {
			echo "cambio exitoso";
		} else {
			echo "ERROR EN LA ACTUALIZACION";
		}
	}
	// CAMBIAR ESTADO DE COTIZACIONES END*/-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
	// PASAR A PROYECTO UNA COTIZACION */-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
	public function postProyecto()
	{
		$nomProyecto = $_POST['nomProyecto'];
		$idCliente = $_POST['id'];
		$estado = "proceso";
		$idservicio = $_POST['idservicio'];
		$actividades = $_POST['totalActividades'];
		$descripcion = $_POST['descripcion'];
		$entrega = $_POST['fechaEntrega'];
		$total = $_POST['total'];
		$tipoCliente = $_POST['tipoCliente'];
		$idpersonal = $_POST['idpersonal'];
		$idcotizacion = $_POST['idcotizacion'];
		// para la tabla pagos
		$monto = $_POST['monto'];
		$saldo = floatval($total) - floatval($monto);
		$igv = floatval($total) * 0.18;
		$pendiente = floatval($total) - floatval($monto);
		if ($tipoCliente == 'natural') {
			if ($this->model->PostProyectoNatural($nomProyecto, $idCliente, $estado, $idservicio, $actividades, $descripcion, $pendiente, $total, $entrega, $idpersonal, $idcotizacion, $monto, $saldo, $igv)) {
				echo "insercion natural con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostProyectoJuridica($nomProyecto, $idCliente, $estado, $idservicio, $actividades, $descripcion, $pendiente, $total, $entrega, $idpersonal, $idcotizacion, $monto, $saldo, $igv)) {
				echo "insercion juridica con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		}
	}
	// PASAR A PROYECTO UNA COTIZACION END*/-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
	// CAMBIAR ESTADO DE PROYECTOS */-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
	public function proyectoEstado()
	{
		$id = $_POST['id'];
		$estado = $_POST['estado'];
		if ($this->model->ProyectoEstado($id, $estado)) {
			echo "cambio exitoso";
		} else {
			echo "ERROR EN LA ACTUALIZACION";
		}
	}
	public function proyectoActualizar(){
		$id = $_POST['id'];
		$actividades = $_POST['totalactividades'];
		$fecha = $_POST['feEntrega'];
		$descripcion = $_POST['descripcion'];
		if ($this->model->ProyectoActualizar($id, $actividades, $fecha, $descripcion)) {
			echo "cambio exitoso";
		} else {
			echo "ERROR EN LA ACTUALIZACION";
		}
	}
	// CAMBIAR ESTADO DE PROYECTOS END*/-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-
}