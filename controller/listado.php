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
		$this->view->data = $data;
		$this->cotizacion();
	}
	public function cotizacionJuridicaDetalle($nparam = null)
	{
		$id = $nparam[0];
		$data = $this->model->CotizacionJuridicaDetalle($id);
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
	public function proyectoPagos($nparam=null){
		$id = $nparam[0];
		$data = $this->model->ProyectoPagos($id);
		$this->view->data = $data;
		$this->pagos();
	}
	public function pagoDetalle(){
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
	// ***************************PAGOS PROYECTO*END*******************
}