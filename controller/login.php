<?php

class Login extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function render()
	{
		$this->view->Render('login/index');
	}
	public function logIn()
	{
		$user = trim(strtolower($_POST['usuario']));
		$pass = trim(strtolower($_POST['password']));
		
		$validar = $this->model->Validar($user,$pass);

		if($validar['usuario'] == $user && $validar['password'] == $pass){
			if($validar['estado'] == 0){
				$this->view->mensaje = 'Este usuario no se encuentra activo';
				header('location:'.constant('URL'));
				return;
			}
			$_SESSION['katari'] = 'katariSoftware';
			$_SESSION['username'] = $validar['nombre'];
			$_SESSION['nivel'] = $validar['nivel'];
			$_SESSION['idpersonal'] = $validar['idpersonal'];
			$this->view->mensaje = 'Credenciales correctas';
			header('location:'.constant('URL').'dashboard');
		}else {
			$this->view->mensaje = 'Credenciales incorrectas';
			header('location:'.constant('URL'));
		}
	}
	public function logout()
	{
		session_destroy();
		$_SESSION['katari'] = '';
		$_SESSION['username'] = '';
		$_SESSION['nivel'] = '';
		$_SESSION['idpersonal'] = '';
		// $this->model->alterTable();
		$this->view->Render('login/index');
	}
}