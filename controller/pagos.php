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
}