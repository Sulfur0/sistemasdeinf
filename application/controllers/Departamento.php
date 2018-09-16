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
	* Método para el mostrar el formulario de registro de departamentos según la facultad.
	*
	*/
	public function create($fac_id){
		$data['facultad'] = $this->MFacultad->get_facultades($fac_id);
		$this->load->view('layouts/top');
		$this->load->view('departamento/create',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método store, para guardar los datos del departamento
	*
	*/
	public function store()
	{	
		$paramDepartamento = array(
			'dep_nombre' => $this->input->post("dep_nombre"),
			'fac_id' => $this->input->post("fac_id")
		);
		//valido si el departamento ya ha sido registrado...
		$query = $this->db->get_where('departamento', array('dep_nombre' => $this->input->post("dep_nombre")));
		if(empty($query->row()))
		{
			$this->MDepartamento->guardar($paramDepartamento);	
			$data['response'] = 'El departamento ha sido registrado satisfactoriamente';
			$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));
			$this->load->view('layouts/top');
			$this->load->view('departamento/create',$data);
			$this->load->view('layouts/bottom');	
		}
		else
		{			
			//si existe departamento error
			$data['response'] = 'Ya existe un departamento con este nombre registrado.';
			$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));
			$this->load->view('layouts/top');
			$this->load->view('departamento/create',$data);
			$this->load->view('layouts/bottom');
		}
	}
	/*
	* Método edit, para mostrar formulario de edición de departamento
	*
	*/	
	public function edit($dep_id){
		$item = $this->MDepartamento->get_departamento($dep_id);
		$this->load->view('layouts/top');
		$this->load->view('departamento/edit',array('item'=>$item));
		$this->load->view('layouts/bottom');		
	}
	/*
	* Método update, para actualizar los datos generales del departamento
	*
	*/
	public function update($dep_id)
	{	
		$query = $this->db->get_where('departamento', array('dep_id' => $dep_id));
		if($query->row_array())
		{
			$this->MDepartamento->update($dep_id);
			$data['response'] = 'El departamento se ha actualizado correctamente.';		
		}	
		else
		{
			$data['response'] = 'Error. El departamento no existe.';	
		}
		$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));
		$data['departamentos'] = $this->MDepartamento->get_departamentos($this->input->post("fac_id"));	
		$this->load->view('layouts/top');
		$this->load->view('departamento/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para mostrar confirmación de eliminación de departamento
	*
	*/
	public function confirm_delete($dep_id)
	{		
		$data['departamento'] = $this->MDepartamento->get_departamento($dep_id);		
		$this->load->view('layouts/top');
		$this->load->view('departamento/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de departamento
	*
	*/
	public function delete($dep_id)
	{		
		$this->MDepartamento->delete($dep_id);
		$data['response'] = 'Departamento eliminado correctamente.';
		$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));
		$data['departamentos'] = $this->MDepartamento->get_departamentos($this->input->post("fac_id"));	
		$this->load->view('layouts/top');
		$this->load->view('departamento/index',$data);
		$this->load->view('layouts/bottom');
	}
}
?>