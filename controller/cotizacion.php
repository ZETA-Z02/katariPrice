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

		if($this->model->Natural($nombre,$apellidos,$dni,$telefono,$email,$sexo,$direccion,$ciudad)){
			echo "REGISTRO EXITOSO";
		}else{
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

		if($this->model->Juridica($razonsocial,$telefono,$email,$web,$ruc,$rubro,$direccion)){
			echo "REGISTRO EXITOSO";
		}else{
			echo "REGISTRO FALLIDO";
		}
		
	}
	// OBTENER PERSONA NATURAL
	public function getNatural(){
		$data = $this->model->GetNatural();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idnatural"=>$row['idnatural'],
				"nombres"=>$row['nombres'],
				"dni"=> $row['dni'],
				"telefono"=>$row['telefono'],
				"email"=>$row['email'],
				"direccion"=>$row['direccion'],
				"ciudad"=>$row['ciudad'],
			);
		}
		echo json_encode($json);
	}
	// OBTENER PERSONA JURIDICA
	public function getJuridica(){
		$data = $this->model->GetJuridica();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idjuridica"=>$row['idjuridica'],
				"razonsocial"=>$row['razonsocial'],
				"ruc"=> $row['ruc'],
				"telefono"=>$row['telefono'],
				"email"=>$row['email'],
				"rubro"=>$row['rubro'],
				"web"=>$row['web'],
			);
		}
		echo json_encode($json);

	}
	// BUSCADORES
	public function searchNatural(){
		$nombres = $_POST['nombres'];
		$dni = $_POST['dni'];
		$data = $this->model->SearchNatural($nombres,$dni);
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idnatural"=>$row['idnatural'],
				"nombres"=>$row['nombres'],
				"dni"=> $row['dni'],
				"telefono"=>$row['telefono'],
				"email"=>$row['email'],
				"direccion"=>$row['direccion'],
				"ciudad"=>$row['ciudad'],
			);
		}
		echo json_encode($json);
	}
	public function searchJuridica(){
		$razonsocial = $_POST['razonsocial'];
		$ruc = $_POST['ruc'];
		$data = $this->model->SearchJuridica($razonsocial,$ruc);
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idjuridica"=>$row['idjuridica'],
				"razonsocial"=>$row['razonsocial'],
				"ruc"=> $row['ruc'],
				"telefono"=>$row['telefono'],
				"email"=>$row['email'],
				"rubro"=>$row['rubro'],
				"web"=>$row['web'],
			);
		}
		echo json_encode($json);
	}
}