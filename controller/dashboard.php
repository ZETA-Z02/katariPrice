<?php

class Dashboard extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function render()
	{
		$this->view->Render('dashboard/index');
	}
	function datos(){
		$cotizaciones = $this->model->TotalCotizaciones();
		$proyectos = $this->model->TotalProyectos();
		$recaudado = $this->model->TotalRecaudado();
		$json = array();
		$json = array(
			"cotizaciones" => $cotizaciones['total'],
			"proyectos" => $proyectos['total'],
			"recaudado" => $recaudado['total'],
		);
		echo json_encode($json);
	}
	public function proyectos(){
		$id = $_POST['id'];
		$proyectos = $this->model->Proyectos($id);
		$json = array();
		while($row = mysqli_fetch_assoc($proyectos)) {
			$json[] = array(
				"idproyecto"=>$row['idproyecto'],
				"proyecto"=>$row['nomproyecto'],
			);
		}
		echo json_encode($json);
	}
}