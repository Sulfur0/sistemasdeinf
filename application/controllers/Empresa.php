<?php
/**
 * Controlador de Empresa.
 */
class Empresa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MEmpresa');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index(){
		$data['empresas'] = $this->MEmpresa->get_empresas();	
		$this->load->view('layouts/top');
		$this->load->view('empresa/index',$data);
		$this->load->view('layouts/bottom');

	}
	/*
	* Método create, para mostrar formulario de registro de Empresa
	*
	*/
	public function create(){
		$this->load->view('layouts/top');
		$this->load->view('empresa/create');
		$this->load->view('layouts/bottom');
	}
	/*
	* Método store, para guardar los datos de la Empresa
	*
	*/
	public function store()
	{	
		$paramEmpresa = array(
			'emp_rif' => $this->input->post("emp_rif"),
			'emp_nombre' => $this->input->post("emp_nombre")			
		);
		//valido si la Empresa ya ha sido registrada...
		$query = $this->db->get_where('Empresa', array('emp_rif' => $this->input->post("emp_rif")));
		if(empty($query->row()))
		{
			$this->MEmpresa->guardar($paramEmpresa);	
			$data['empresas'] = $this->MEmpresa->get_empresas();	
			$data['response'] = 'La Empresa ha sido registrada satisfactoriamente';
			$this->load->view('layouts/top');
	       	$this->load->view('empresa/index',$data);
	       	$this->load->view('layouts/bottom');	
		}
		else
		{
			$data['errors'] = 'Una Empresa bajo este mismo rif ya ha sido registrada';
			$this->load->view('layouts/top');
			$this->load->view('empresa/create',$data);
			$this->load->view('layouts/bottom');
		}
	}
	/*
	* Método edit, para mostrar formulario de edición de Empresa
	*
	*/	
	public function edit($emp_id){
		$item = $this->MEmpresa->get_empresas($emp_id);
		$this->load->view('layouts/top');
		$this->load->view('empresa/edit',array('item'=>$item));
		$this->load->view('layouts/bottom');
	}
	/*
	* Método update, para actualizar los datos generales del sistema
	*
	*/
	public function update($emp_id)
	{	
		$query = $this->db->get_where('Empresa', array('emp_id' => $emp_id));
		if($query->row_array())
		{
			$this->MEmpresa->update($emp_id);
			$data['empresas'] = $this->MEmpresa->get_empresas();
			$data['response'] = 'La Empresa se ha actualizado correctamente.';
			$this->load->view('layouts/top');
	       	$this->load->view('empresa/index', $data);
	       	$this->load->view('layouts/bottom');
		}
		else
		{
			$data['item'] = $this->MEmpresa->get_empresas($emp_id);
			$data['error'] = 'Error, esta Empresa no parece estar registrada.';
			$this->load->view('layouts/top');
	       	$this->load->view('empresa/edit',$data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Metodo para mostrar confirmación de eliminación de Empresa
	*
	*/
	public function confirm_delete($emp_id)
	{		
		$data['empresa'] = $this->MEmpresa->get_empresas($emp_id);		
		$this->load->view('layouts/top');
		$this->load->view('empresa/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de Empresa
	*
	*/
	public function delete($emp_id)
	{		
		$this->MEmpresa->delete($emp_id);
		$data['response'] = 'Empresa eliminada correctamente.';
		$data['empresas'] = $this->MEmpresa->get_empresas();
		
		$this->load->view('layouts/top');
		$this->load->view('empresa/index', $data);
		$this->load->view('layouts/bottom');
	}
}
?>