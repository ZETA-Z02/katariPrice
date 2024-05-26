<?php

class Calculadora extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function render()
	{
		$this->view->Render('calculadora/index');
    }
	public function getDificultad(){
		$data = $this->model->GetDificultad();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"iddificultad"=> $row['iddificultad'],
				"factor"=> $row['factor'],
			);
		}
		echo json_encode($json);
	}
	public function getLenguaje(){
		$data = $this->model->GetLenguaje();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idlenguaje"=> $row['idlenguaje'],
				"lenguaje"=> $row['lenguaje'],
				"precio"=> $row['precio'],
			);
		}
		echo json_encode($json);
	}
	public function getAplicacion(){
		$data = $this->model->GetAplicacion();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idaplicacion"=> $row['idaplicacion'],
				"aplicacion"=> $row['aplicacion'],
				"precio"=> $row['precio'],
			);
		}
		echo json_encode($json);
	}
	public function getServicio(){
		$data = $this->model->GetServicio();
		$json = array();
		while($row = mysqli_fetch_assoc($data)){
			$json[] = array(
				"idcosto"=> $row['idcosto'],
				"idservicio"=> $row['idservicio'],
				"descripcion"=> $row['descripcion'],
				"precio"=> $row['precio'],
			);
		}
		echo json_encode($json);
	}
}