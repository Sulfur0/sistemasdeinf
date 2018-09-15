<?php
/**
 * Controlador de Departamentos
 */
class Departamento extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MFacultad');
		$this->load->model('MDepartamento');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar una pagina de inicio
	*
	*/
	public function index($fac_id){
		$data['facultad'] = $this->MFacultad->get_facultades($fac_id);	
		$data['departamentos'] = $this->MDepartamento->get_departamentos($fac_id);	

		$this->load->view('layouts/top');
		$this->load->view('departamento/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método para el mostrar el formulario de registro de departamentos
	*
	*/
	public function create(){
		$this->load->view('layouts/top');
		$this->load->view('estudiantes/create');
		$this->load->view('layouts/bottom');
	}
}
?>