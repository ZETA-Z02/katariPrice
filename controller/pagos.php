<?php

class Pagos extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function render()
	{
		$this->view->Render('pagos/index');
	}
	public function pagos(){
		$data = $this->model->pagos();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idproyecto" => $row['idproyecto'],
				"proyecto" => $row['nomproyecto'],
				"cliente" => $row['nombres'],
				"estado" => $row['estado'],
				"deuda" => $row['saldo'],
				"total" => $row['total'],
				"fecha" => $row['feCreate'],
				"telefono" => $row['telefono'],
			);
		}
		echo json_encode($json);
	}
}