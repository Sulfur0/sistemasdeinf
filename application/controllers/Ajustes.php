<?php
/**
 * Controlador de Ajustes necesario para inicialización del sistema.
 */
class Ajustes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MFacultad');
		$this->load->model('MOficina');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index(){
		$data['facultades'] = $this->MFacultad->get_facultades();
		$this->load->view('layouts/top');
		$this->load->view('ajustes/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método update, para actualizar los datos generales del sistema
	*
	*/
	public function update()
	{	
		//revisar si existe facultad con ese nombre
		$query = $this->db->get_where('facultad', array('fac_nombre' => $this->input->post("fac_nombre")));
		if($query->row_array())
		{			
			$query2 = $this->db->get('oficina', 1);
			$paramOficina = array(
				'fac_id' => $query->row_array()['fac_id']			
			);			
			//ver si existe una oficina
			if($query2->row_array())
			{
				//si existen vincular la oficina con el nombre de la facultad				
				$this->MOficina->update(
					$query2->row_array()['ofi_id'],
					$paramOficina
				);
				$data['response'] = 'La oficina ha sido actualizada y ahora pertenece a '.$this->input->post("fac_nombre");
			}
			else
			{
				//si no existe oficina crearla y vincular la oficina con el nombre de la facultad				
				$this->MOficina->store($paramOficina);	
				$data['response'] = 'La oficina ha sido creada y pertenece a '.$this->input->post("fac_nombre");
			}
			$this->load->view('layouts/top');
	       	$this->load->view('ajustes/index', $data);
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
}
?>