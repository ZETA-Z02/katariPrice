<?php

class Proyectos extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function render()
	{
		$this->view->Render('proyectos/index');
	}
	function detalle()
	{
		$this->view->Render('proyectos/detalle');
	}
}