<?php
/**
 * Controlador de Oferta.
 */
class Oferta extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//$this->load->model('MOferta');
		$this->load->model('MFacultad');
		$this->load->model('MDepartamento');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index(){
		$data['facultades'] = $this->MFacultad->get_facultades();	
		$this->load->view('layouts/top');
		$this->load->view('facultad/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método create, para mostrar formulario de registro de oferta
	* @param destino: el id del destino en concreto, tipo: puede ser facultad o empresa
	*/
	public function create($destino,$tipo){
		$this->load->view('layouts/top');
		if($tipo == "facultad")
		{
			$data['facultad'] = $this->MFacultad->get_facultades($destino);			
			$data['departamentos'] = $this->MDepartamento->get_departamentos($destino);	
			$this->load->view('oferta/create_facultad',$data);
		}							
		else	
			$this->load->view('oferta/create_empresa');		
		$this->load->view('layouts/bottom');
		
	}
	/*
	* Método store, para guardar los datos de la facultad
	*
	*/
	public function store()
	{	
		$paramFacultad = array(
			'fac_nombre' => $this->input->post("fac_nombre")			
		);
		//valido si la facultad ya ha sido registrada...
		$query = $this->db->get_where('facultad', array('fac_nombre' => $this->input->post("fac_nombre")));
		if(empty($query->row()))
		{
			$this->MFacultad->guardar($paramFacultad);		
			$data['response'] = 'La facultad ha sido registrada satisfactoriamente';
			$this->load->view('layouts/top');
	       	$this->load->view('facultad/create', $data);
	       	$this->load->view('layouts/bottom');	
		}
		else
		{			
			//si no existe facultad error
			$data['response'] = 'La facultad no está registrada, ingrese de nuevo el nombre de la facultad o cree una facultad nueva <a href="'.base_url().'index.php/Facultad/create">aquí</a>';
			$this->load->view('layouts/top');
	       	$this->load->view('ajustes/index', $data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Método edit, para mostrar formulario de edición de facultad
	*
	*/	
	public function edit($fac_id){
		$item = $this->MFacultad->get_facultades($fac_id);
		$this->load->view('layouts/top');
		$this->load->view('facultad/edit',array('item'=>$item));
		$this->load->view('layouts/bottom');
	}
	/*
	* Método update, para actualizar los datos generales del sistema
	*
	*/
	public function update($fac_id)
	{	
		$query = $this->db->get_where('facultad', array('fac_id' => $fac_id));
		if($query->row_array())
		{
			$this->MFacultad->update($fac_id);
			$data['facultades'] = $this->MFacultad->get_facultades();
			$data['response'] = 'La facultad se ha actualizado correctamente.';
			$this->load->view('layouts/top');
	       	$this->load->view('facultad/index', $data);
	       	$this->load->view('layouts/bottom');
		}
		else
		{
			$data['item'] = $this->MFacultad->get_facultades($fac_id);
			$data['error'] = 'Error, esta facultad no parece estar registrada.';
			$this->load->view('layouts/top');
	       	$this->load->view('facultad/edit',$data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Metodo para mostrar confirmación de eliminación de facultad
	*
	*/
	public function confirm_delete($fac_id)
	{		
		$data['facultad'] = $this->MFacultad->get_facultades($fac_id);		
		$this->load->view('layouts/top');
		$this->load->view('facultad/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de facultad
	*
	*/
	public function delete($fac_id)
	{		
		$item = $this->MFacultad->delete($fac_id);
		$data['response'] = 'Facultad eliminada correctamente.';
		$data['facultades'] = $this->MFacultad->get_facultades();
		
		$this->load->view('layouts/top');
		$this->load->view('facultad/index', $data);
		$this->load->view('layouts/bottom');
	}
}
?>