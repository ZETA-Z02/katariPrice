<?php

class Cotizaciones extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function render()
	{
		$this->view->Render('cotizaciones/index');
	}
	function detalle()
	{
		$this->view->Render('cotizaciones/detalle');
	}
}