<?php

class Cotizacion extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function render()
	{
		$this->view->Render('cotizacion/index');
	}
	// INSERTAR PERSONA NATURAL
	public function natural()
	{
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$dni = $_POST['dni'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$sexo = $_POST['sexo'];
		$direccion = $_POST['direccion'];
		$ciudad = $_POST['ciudad'];

		if ($this->model->Natural($nombre, $apellidos, $dni, $telefono, $email, $sexo, $direccion, $ciudad)) {
			echo "REGISTRO EXITOSO";
		} else {
			echo "REGISTRO FALLIDO";
		}

	}
	// INSERTAR PERSONA JURIDICA
	public function juridica()
	{
		$razonsocial = $_POST['razonsocial'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$web = $_POST['web'];
		$ruc = $_POST['ruc'];
		$rubro = $_POST['rubro'];
		$direccion = $_POST['direccion'];

		if ($this->model->Juridica($razonsocial, $telefono, $email, $web, $ruc, $rubro, $direccion)) {
			echo "REGISTRO EXITOSO";
		} else {
			echo "REGISTRO FALLIDO";
		}

	}
	// OBTENER PERSONA NATURAL
	public function getNatural()
	{
		$data = $this->model->GetNatural();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idnatural" => $row['idnatural'],
				"nombres" => $row['nombres'],
				"dni" => $row['dni'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"direccion" => $row['direccion'],
				"ciudad" => $row['ciudad'],
			);
		}
		echo json_encode($json);
	}
	// OBTENER PERSONA JURIDICA
	public function getJuridica()
	{
		$data = $this->model->GetJuridica();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idjuridica" => $row['idjuridica'],
				"razonsocial" => $row['razonsocial'],
				"ruc" => $row['ruc'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"rubro" => $row['rubro'],
				"web" => $row['web'],
			);
		}
		echo json_encode($json);
	}
	// BUSCADORES
	public function searchNatural()
	{
		$nombres = $_POST['nombres'];
		$dni = $_POST['dni'];
		$data = $this->model->SearchNatural($nombres, $dni);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idnatural" => $row['idnatural'],
				"nombres" => $row['nombres'],
				"dni" => $row['dni'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"direccion" => $row['direccion'],
				"ciudad" => $row['ciudad'],
			);
		}
		echo json_encode($json);
	}
	public function searchJuridica()
	{
		$razonsocial = $_POST['razonsocial'];
		$ruc = $_POST['ruc'];
		$data = $this->model->SearchJuridica($razonsocial, $ruc);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idjuridica" => $row['idjuridica'],
				"razonsocial" => $row['razonsocial'],
				"ruc" => $row['ruc'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"rubro" => $row['rubro'],
				"web" => $row['web'],
			);
		}
		echo json_encode($json);
	}
	public function getCostosEstadistica()
	{
		$data = $this->model->GetCostosEstadistica();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcosto" => $row['idcosto'],
				"idservicio" => $row['idservicio'],
				"descripcion" => $row['descripcion'],
				"precio" => $row['precio'],
			);
		}
		echo json_encode($json);
	}
	// OBTENER REDES
	public function getRedes()
	{
		$data = $this->model->GetRedes();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcosto" => $row['idcosto'],
				"idservicio" => $row['idservicio'],
				"descripcion" => $row['descripcion'],
				"precio" => $row['precio'],
			);
		}
		echo json_encode($json);
	}
	// POST ESTADISTICA
	public function postEstadistica()
	{
		$id = $_POST['id'];
		$tipoCliente = $_POST['tipoCliente'];
		$idservicio = $_POST['servicio'];
		$idcosto = $_POST['costo'];
		$idpersonal = $_POST['idpersonal'];
		$dias = $_POST['dias'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$fecha = $_POST['fecha'];
		$descripcion = $_POST['descripcion'];
		$estado = "espera";

		if ($tipoCliente == 'natural') {
			if ($this->model->PostEstadisticaNatural($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha)) {
				echo "insercion natural con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostEstadisticaJuridica($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha)) {
				echo "insercion juridica con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		}

	}
	// INSERTAR CALCULADOR DE SOFTWARE 
	public function calcSoftware()
	{
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$iddificultad = $_POST['iddificultad'];
		$idlenguaje = $_POST['idlenguaje'];
		$idaplicacion = $_POST['idaplicacion'];
		$costoservicio = $_POST['costoservicio'];
		$duracion = $_POST['duracionsemanas'];
		$costomantenimiento = $_POST['costomantenimiento'];
		$tiempomantenimiento = $_POST['tiempomantenimiento'];
		$opciones = $_POST['opciones'];
		$subtotal = $_POST['subtotal'];
		$igv = $_POST['igv'];
		$total = $_POST['total'];
		$idpersonal = $_POST['idpersonal'];
		if ($this->model->CalcSoftware($nombre, $descripcion, $iddificultad, $idlenguaje, $idaplicacion, $costoservicio, $duracion, $costomantenimiento, $tiempomantenimiento, $opciones, $subtotal, $igv, $total, $idpersonal)) {
			//echo var_dump($this->model->conn);
			echo $this->model->conn->conn->insert_id;
		} else {
			echo "ERROR CTM!!!!";
		}
	}
	// POST SOFTWARE 
	public function postSoftware()
	{
		$id = $_POST['id'];
      	$servicio = $_POST['servicio'];
      	$idcosto = $_POST['idcosto'];
      	$idpersonal = $_POST['idpersonal'];
      	$dias = $_POST['dias'];
      	$precio = $_POST['precio'];
      	$cantidad = $_POST['cantidad'];
      	$fecha = $_POST['fecha'];
      	$descripcion = $_POST['descripcion'];
      	$idcalcSoftware = $_POST['idcalcSoftware'];
		$tipoCliente = $_POST['tipoCliente'];
		$estado = "espera";
		if ($tipoCliente == 'natural') {
			if ($this->model->PostSoftwareNatural($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$idcalcSoftware)) {
				echo "insercion natural con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostSoftwareJuridica($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$idcalcSoftware)) {
				echo "insercion juridica con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		}
	}
	// POST REDES
	public function postRedes()
	{
		$nombre = $_POST['nombre'];
		$id = $_POST['id'];
		$servicio = $_POST['servicio'];
		$idcosto = $_POST['costo'];
		$idpersonal = $_POST['idpersonal'];
		$dias = $_POST['dias'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$fecha = $_POST['fecha'];
		$descripcion = $_POST['descripcion'];
		$estado = "espera";
		$tipoCliente = $_POST['tipoCliente'];
		$res = $this->File($_FILES['excel'], $nombre, $id);
		if($res==false) {
			$res = "Sin Archivo(Excel) Disponible";
		}
		if ($tipoCliente == 'natural') {
			if ($this->model->PostRedesNatural($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$res)) {
				echo "insercion redes natural con exito->modal de exito";
			} else {
				echo "ERROR EN LA INSERCION REDES";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostRedesJuridica($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$res)) {
				echo "insercion redes juridica con exito->modal de exito";
			} else {
				echo "ERROR EN LA INSERCION REDES";
			}
		}
	}
		
}