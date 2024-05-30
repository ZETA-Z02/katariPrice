<?php

class Personal extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function render()
	{
		$this->view->Render('personal/index');
	}
	function detalles($nparam = null)
	{
		$id = $nparam[0];
		$this->view->data = $this->model->GetPersonalId($id);
		$this->view->Render('personal/detalles');
	}
	function login($nparam=null)
	{	$id = $nparam[0];
		$this->view->data = $this->model->GetLoginId($id);
		$this->view->Render('personal/login');
	}
	function nuevo()
	{
		$this->view->Render('personal/nuevo');
	}
	public function getPersonal(){
		$data = $this->model->GetPersonal();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idpersonal" => $row['idpersonal'],
				"foto" => $row['foto'],
				"nombres" => $row['nombre']." ".$row['apellidos'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
			);
		}
		echo json_encode($json);
	}
	public function create(){
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$dni = $_POST['dni'];
		$sexo = $_POST['sexo'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fecha = $_POST['fechaNac'];
		$foto = $_FILES['foto'];
		$res = $this->Foto($foto,$nombre,$dni);
		if($res==false){
			$foto = "sin foto";
		}
		if($this->model->Create($nombre,$apellidos,$dni,$sexo,$telefono,$fecha,$email,$res)){
			echo $this->model->conn->conn->insert_id;
		}else{
			echo "ERROR AL INSERTAR";
		}	
	}
	public function createLogin(){
		$idpersonal = $_POST['idpersonal'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$estado = "1";
		if($this->model->CreateLogin($idpersonal,$usuario,$password,$estado)){
			echo "EXITO LOGIN";
		}else{
			echo "ERROR AL INSERTAR";
		}
		
	}
	public function updateLogin(){
		$idpersonal = $_POST['idpersonal'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$estado = $_POST['estado'];
		if($this->model->UpdateLogin($idpersonal,$usuario,$password,$estado)){
			echo "EXITO LOGIN";
		}else{
			echo "ERROR AL INSERTAR";
		}
	}
	public function updatePersonal(){
		$idpersonal = $_POST['idpersonal'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$dni = $_POST['dni'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$foto = $_FILES['foto'];
		$fecha = date("Y-m-d");
		$res = $this->Foto($foto,$nombre,$dni);
		if($res==false){
			$res = $_POST['fotoActual'];
		}
		if($this->model->UpdatePersonal($idpersonal,$nombre,$apellidos,$dni,$telefono,$email,$res,$fecha)){
			echo "EXITO AL ACTUALIZAR";
		}else{
			echo "ERROR AL ACTUALIZAR";
		}
	}
	public function delete(){
		$id = $_POST['id'];
		if($this->model->Delete($id) && $this->model->DeleteLogin($id)){
			echo "EXITO AL ELIMINAR";
		}else{
			echo "ERROR AL ELIMINAR";
		}
	}
}