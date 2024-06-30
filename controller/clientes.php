<?php

class Clientes extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function render()
	{
		$this->view->Render('clientes/index');
	}
	
	// muestra a la perosa natural
	

	public function verNatural(){
		$data = $this->model->VerNatural();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idnatural"=>$row['idnatural'],
				"nombre"=>$row['nombre'],
				"dni"=>$row['dni'],
				"ciudad"=>$row['ciudad'],
			);
		}
		$jsonstring = json_encode($json);
		echo $jsonstring;
	}
	// muestra a la perosa juridica
	public function verJuridica(){
		$data = $this->model->VerJuridica();
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
	
	// busaca a la persona juridica

	public function buscarJuridica(){
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

	public function verificarNatural(){
		$idnatural = $_POST['idnatural'];
		$data = $this->model->VerificarNatural($idnatural);
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idnatural"=>$row['idnatural'],
				"nombre"=>$row['nombre'],
				"apellidos"=> $row['apellidos'],
				"dni"=>$row['dni'],
				"sexo"=>$row['sexo'],
				"ciudad"=>$row['ciudad'],
				"telefono"=>$row['telefono'],
				"email"=>$row['email'],
				"direccion"=>$row['direccion'],
				"feCreate"=>$row['feCreate'],
				"feUpdate"=>$row['feUpdate']

			);
		}
		echo json_encode($json[0]);
	
	}
	public function actualizarNatural(){
		$idnatural = $_POST['idnatural'];
		$nombre  = $_POST['nombre'];
		$apellidos = $_POST['apellidos']; 
		$dni = $_POST['dni']; 
		$sexo = $_POST['sexo']; 
		$ciudad = $_POST['ciudad']; 
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion']; 
		$feCreate = $_POST['feCreate']; 
		$feUpdate = $_POST['feUpdate'];
		
		$result=$this->model->ActualizarNatural($idnatural, $nombre, $apellidos, $dni, $sexo, $ciudad, $telefono, $email, $direccion, $feCreate, $feUpdate);
		if ($result) {
        echo json_encode(["success" => "Datos actualizados correctamente"]);
    	} else {
        echo json_encode(["error" => "Error al actualizar los datos"]);
    	}
	}


// busca a la persona natural 
	public function buscarNatural() {
		$query = $_GET['query'];
		$data = $this->model->BuscarNatural($query);
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idnatural"=>$row['idnatural'],
				"nombre"=>$row['nombre'],
				"dni"=>$row['dni'],
				"ciudad"=>$row['ciudad'],
			);
		}
		$jsonstring = json_encode($json);
		echo $jsonstring;
	}

	//JURIDICA
	function detallesJuridica($nparam = null)
	{
		$id = $nparam[0];
		$this->view->data = $this->model->GetJuridicaId($id);
		$this->view->Render('clientes/detallesJuridica');
	}
	public function updateJuridica(){
		$id = $_POST['idjuridica'];
		$razonsocial = $_POST['razonsocial'];
		$rubro = $_POST['rubro'];
		$ruc = $_POST['ruc'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$web = $_POST['web'];
		$direccion = $_POST['direccion'];
		$feUpdate = date('Y-m-d');

		$result=$this->model->UpdateJuridica($razonsocial,$telefono,$email,$web,$ruc,$rubro,$direccion,$feUpdate,$id);
		if ($result) {
        	echo "EXITO";
    	} else {
        	echo "ERROR";
    	}
	}

}