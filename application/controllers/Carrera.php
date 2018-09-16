<?php
/**
 * Controlador de Carrera.
 */
class Carrera extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MCarrera');
		$this->load->model('MFacultad');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index($fac_id){
		$data['carreras'] = $this->MCarrera->get_carreras($fac_id);
		$data['facultad'] = $this->MFacultad->get_facultades($fac_id);	
		$this->load->view('layouts/top');
		$this->load->view('carrera/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método create, para mostrar formulario de registro de Carrera
	*
	*/
	public function create($fac_id){
		$data['facultad'] = $this->MFacultad->get_facultades($fac_id);
		$this->load->view('layouts/top');
		$this->load->view('carrera/create',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método store, para guardar los datos de la Carrera
	*
	*/
	public function store()
	{	
		$paramCarrera = array(
			'carr_nombre' => $this->input->post("carr_nombre"),
			'carr_unid_cred' => $this->input->post("carr_unid_cred"),
			'fac_id' => $this->input->post("fac_id")			
		);
		//valido si la Carrera ya ha sido registrada para esta facultad
		$query = $this->db->get_where('carrera', array(
				'carr_nombre' => $this->input->post("carr_nombre"),
				'fac_id' => $this->input->post("fac_id")
			));
		$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));
		if(empty($query->row()))
		{
			$this->MCarrera->guardar($paramCarrera);	
			$data['carreras'] = $this->MCarrera->get_carreras($this->input->post("fac_id"));	
			$data['response'] = 'La Carrera ha sido registrada satisfactoriamente';
			$this->load->view('layouts/top');
	       	$this->load->view('carrera/index',$data);
	       	$this->load->view('layouts/bottom');	
		}
		else
		{
			$data['errors'] = 'Una Carrera bajo este mismo nombre ya ha sido registrada para esta facultad';
			$this->load->view('layouts/top');
			$this->load->view('carrera/create',$data);
			$this->load->view('layouts/bottom');
		}
	}
	/*
	* Método edit, para mostrar formulario de edición de Carrera
	*
	*/	
	public function edit($carr_id){
		$item = $this->MCarrera->get_carrera($carr_id);
		$this->load->view('layouts/top');
		$this->load->view('carrera/edit',array('item'=>$item));
		$this->load->view('layouts/bottom');
	}
	/*
	* Método update, para actualizar los datos generales del sistema
	*
	*/
	public function update($carr_id)
	{	
		$query = $this->db->get_where('Carrera', array('carr_id' => $carr_id));
		$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));
		if($query->row_array())
		{
			$this->MCarrera->update($carr_id);
			$data['carreras'] = $this->MCarrera->get_carreras($this->input->post("fac_id"));
			$data['response'] = 'La Carrera se ha actualizado correctamente.';
			$this->load->view('layouts/top');
	       	$this->load->view('carrera/index', $data);
	       	$this->load->view('layouts/bottom');
		}
		else
		{
			$data['item'] = $this->MCarrera->get_carreras($carr_id);
			$data['error'] = 'Error, esta Carrera no parece estar registrada.';
			$this->load->view('layouts/top');
	       	$this->load->view('carrera/edit',$data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Metodo para mostrar confirmación de eliminación de Carrera
	*
	*/
	public function confirm_delete($carr_id)
	{		
		$data['carrera'] = $this->MCarrera->get_carrera($carr_id);		
		$this->load->view('layouts/top');
		$this->load->view('carrera/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de Carrera
	*
	*/
	public function delete($carr_id)
	{		
		$this->MCarrera->delete($carr_id);
		$data['response'] = 'Carrera eliminada correctamente.';
		$data['carreras'] = $this->MCarrera->get_carreras($this->input->post("fac_id"));	
		$data['facultad'] = $this->MFacultad->get_facultades($this->input->post("fac_id"));	
		$this->load->view('layouts/top');
		$this->load->view('carrera/index',$data);
		$this->load->view('layouts/bottom');
	}
}
?>