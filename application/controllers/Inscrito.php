<?php
/**
 * Controlador de Inscrito.
 */
class Inscrito extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MInscrito');
		$this->load->model('MLlamado');
		$this->load->model('MEstudiantes');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index($llam_id){
		$data['llamado'] = $llam_id;
		$data['inscritos'] = $this->MInscrito->get_inscritos($llam_id);	
		$this->load->view('layouts/top');
		$this->load->view('Inscrito/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método create, para mostrar formulario de registro de Inscrito
	*
	*/
	public function create($llam_id){
		$data['estudiantes'] = $this->MEstudiantes->get_estudiantes();
		$data['llamado'] = $this->MLlamado->get_llamados($llam_id);
		$this->load->view('layouts/top');
		$this->load->view('Inscrito/create',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método store, para guardar los datos de la Inscrito
	*
	*/
	public function store()
	{	
		$paramInscrito = array(
			'est_id' => $this->input->post("est_id"),
			'insc_fecha' => $this->input->post("insc_fecha"),
			'llam_id' => $this->input->post("llam_id")		
		);
		//valido si el Inscrito ya ha sido registrado...
		$query = $this->db->get_where('inscrito', array(
			'est_id' => $this->input->post("est_id"), 
			'llam_id' => $this->input->post("llam_id")
		));				
		if(empty($query->row()))
		{
			$this->MInscrito->guardar($paramInscrito);
			$data['llamado'] = $this->input->post("llam_id");
			$data['inscritos'] = $this->MInscrito->get_inscritos($data['llamado']);
			$data['response'] = 'Se ha registrado la inscripción satisfactoriamente';
			$this->load->view('layouts/top');			
	       	$this->load->view('Inscrito/index',$data);
	       	$this->load->view('layouts/bottom');	
		}
		else
		{			
			//si ya esta registrada error
			$data['llamado'] = $this->input->post("llam_id");
			$data['inscritos'] = $this->MInscrito->get_inscritos($data['llamado']);
			$data['response'] = 'Ya hay un estudiante inscrito para este mismo llamado';
			$this->load->view('layouts/top');
	       	$this->load->view('Inscrito/index', $data);
	       	$this->load->view('layouts/bottom');
		}
	}	
	/*
	* Metodo para mostrar confirmación de eliminación de Inscrito
	*
	*/
	public function confirm_delete($insc_id)
	{
		$data['inscrito'] = $this->MInscrito->get_inscrito($insc_id);
		$this->load->view('layouts/top');
		$this->load->view('Inscrito/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de Inscrito
	*
	*/
	public function delete($insc_id)
	{		
		$item = $this->MInscrito->delete($insc_id);
		
		$data['response'] = 'Inscrito eliminado correctamente.';
		$data['llamado'] = $this->input->post("llam_id");
		$data['inscritos'] = $this->MInscrito->get_inscritos($data['llamado']);		
		$this->load->view('layouts/top');
		$this->load->view('Inscrito/index', $data);
		$this->load->view('layouts/bottom');
	}
}
?>