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
}