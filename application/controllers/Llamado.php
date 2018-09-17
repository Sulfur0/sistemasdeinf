<?php
/**
 * Controlador de Llamado.
 */
class Llamado extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MLlamado');
		$this->load->model('MOferta');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index(){
		$data['llamados'] = $this->MLlamado->get_llamados();	
		$this->load->view('layouts/top');
		$this->load->view('Llamado/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método create, para mostrar formulario de registro de Llamado
	*
	*/
	public function create($ofer_id){
		$data['oferta'] = $this->MOferta->get_ofertas($ofer_id);
		$this->load->view('layouts/top');
		$this->load->view('Llamado/create',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método store, para guardar los datos de la Llamado
	*
	*/
	public function store()
	{	
		$paramLlamado = array(
			'llam_status' => $this->input->post("llam_status"),
			'ofer_id' => $this->input->post("ofer_id"),
			'llam_fec_inic' => $this->input->post("llam_fec_inic"),
			'llam_fec_lim' => $this->input->post("llam_fec_lim")		
		);
		//valido si la Llamado ya ha sido registrado...
		$query = $this->db->get_where('Llamado', array('ofer_id' => $this->input->post("ofer_id")));
		if(empty($query->row()))
		{
			$this->MLlamado->guardar($paramLlamado);	
			$data['llamados'] = $this->MLlamado->get_llamados();	
			$data['response'] = 'El Llamado ha sido registrado satisfactoriamente';
			$this->load->view('layouts/top');
	       	$this->load->view('Llamado/index',$data);
	       	$this->load->view('layouts/bottom');	
		}
		else
		{			
			//si ya esta registrada error
			$data['response'] = 'Ya hay un llamado registrado para esta misma oferta';
			$this->load->view('layouts/top');
	       	$this->load->view('llamado/index', $data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Método edit, para mostrar formulario de edición de Llamado
	*
	*/	
	public function edit($llam_id){
		$item = $this->MLlamado->get_llamados($llam_id);
		$this->load->view('layouts/top');
		$this->load->view('Llamado/edit',array('item'=>$item));
		$this->load->view('layouts/bottom');
	}
	/*
	* Método update, para actualizar los datos generales del sistema
	*
	*/
	public function update($llam_id)
	{	
		$query = $this->db->get_where('Llamado', array('llam_id' => $llam_id));
		if($query->row_array())
		{
			$this->MLlamado->update($llam_id);
			$data['llamados'] = $this->MLlamado->get_llamados();
			$data['response'] = 'El Llamado se ha actualizado correctamente.';
			$this->load->view('layouts/top');
	       	$this->load->view('Llamado/index', $data);
	       	$this->load->view('layouts/bottom');
		}
		else
		{
			$data['item'] = $this->MLlamado->get_llamados($llam_id);
			$data['error'] = 'Error, esta Llamado no parece estar registrada.';
			$this->load->view('layouts/top');
	       	$this->load->view('Llamado/edit',$data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Metodo para mostrar confirmación de eliminación de Llamado
	*
	*/
	public function confirm_delete($llam_id)
	{		
		$data['llamado'] = $this->MLlamado->get_llamados($llam_id);	
		$this->load->view('layouts/top');
		$this->load->view('Llamado/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de Llamado
	*
	*/
	public function delete($llam_id)
	{		
		$item = $this->MLlamado->delete($llam_id);
		$data['response'] = 'Llamado eliminado correctamente.';
		$data['llamados'] = $this->MLlamado->get_llamados();
		
		$this->load->view('layouts/top');
		$this->load->view('Llamado/index', $data);
		$this->load->view('layouts/bottom');
	}
}
?>