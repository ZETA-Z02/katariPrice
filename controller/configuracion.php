<?php

class Configuracion extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
    function render()
    {
        $this->view->Render('configuracion/index');
    }
    public function tablaCostos(){
        $data = $this->model->TablaCostos();
        $json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcostos" => $row['idcostos'],
				"servicio" => $row['tiposervicio'],
				"descripcion" => $row['descripcion'],
				"precio" => $row['precio']
			);
		}
		echo json_encode($json);
    }
    public function tablaAplicaciones(){
        $data = $this->model->TablaAplicaciones();
        $json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idaplicacion" => $row['idaplicacion'],
                "aplicacion" => $row['aplicacion'],
				"descripcion" => $row['descripcion'],
				"precio" => $row['precio'],
			);
		}
		echo json_encode($json);
    }
    public function tablaServicios(){
        $data = $this->model->TablaServicios();
        $json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idservicio" => $row['idservicio'],
                "servicio" => $row['tiposervicio'],
			);
		}
		echo json_encode($json);
    }
    public function tablaLenguajes(){
        $data = $this->model->TablaLenguajes();
        $json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idlenguaje" => $row['idlenguaje'],
                "lenguaje" => $row['lenguaje'],
				"precio" => $row['precio'],
			);
		}
		echo json_encode($json);
    }
    public function tablaDificultad(){
        $data = $this->model->TablaDificultad();
        $json = array();
		while ($row = mysqli_fetch_assoc($data)) {
            $porcentaje = (floatval($row['factor'])*100) . ' %';
			$json[] = array(
				"iddificultad" => $row['iddificultad'],
                "factor" => $row['factor'],
				"porcentaje" => $porcentaje,
			);
		}
		echo json_encode($json);
    }
}
?>