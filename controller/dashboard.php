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
	public function graficoPastel(){
		$data = $this->model->GraficoPastel();
		echo json_encode($data);
	}
	public function graficoBarras(){
		$data = $this->model->GraficoBarras();
		echo json_encode($data);
	}
	public function graficoLineal(){
		$data = $this->model->GraficoLineal();
		$json = array();
		while($row = mysqli_fetch_assoc($data)) {
			$meses[] = $row['mes'];
			$totales[] = $row['total'];
		}
		$json = array(
			"mes"=>$meses,
			"total"=>$totales,
		);
		echo json_encode($json);
	}
	public function graficoArea(){
		$data = $this->model->GraficoArea();
		$json = array();
		while($row = mysqli_fetch_assoc($data)) {
			$nombre[] = $row['nombre'];
			$totales[] = $row['total'];
		}
		$json = array(
			"nombre"=>$nombre,
			"total"=>$totales,
		);
		echo json_encode($json);
	}
}