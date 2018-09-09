<?php
/**
 * Controlador de persona necesario para CRUD de atributos a usuarios.
 */
class Welcome extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar una pagina de bienvenida
	*
	*/
	public function index(){
		$this->load->view('layouts/top');
		$this->load->view('welcome');
		$this->load->view('layouts/bottom');
	}	
}
?>