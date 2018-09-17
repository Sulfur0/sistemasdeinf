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
		$this->load->model('MOferta');
		$this->load->model('MEmpresa');
		$this->load->model('MInscrito');
		$this->load->model('MLlamado');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar formulario de ajustes generales
	*
	*/
	public function index()
	{

		$data['ofertas'] = $this->MOferta->get_ofertas();
		$data['llamados'] = $this->MLlamado->get_llamados();
		$this->load->view('layouts/top');
		$this->load->view('oferta/index',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método create, para mostrar formulario de registro de oferta
	* @param destino: el id del destino en concreto, tipo: puede ser facultad o empresa
	*/
	public function create($destino,$tipo)
	{
		$this->load->view('layouts/top');
		if($tipo == "facultad")
		{
			$data['facultad'] = $this->MFacultad->get_facultades($destino);			
			$data['departamentos'] = $this->MDepartamento->get_departamentos($destino);	
			$this->load->view('oferta/create_facultad',$data);
		}							
		else
		{
			$data['empresa'] = $this->MEmpresa->get_empresas($destino);
			$this->load->view('oferta/create_empresa',$data);		
		}
		$this->load->view('layouts/bottom');
		
	}
	/*
	* Método store, para guardar los datos de la oferta
	*
	*/
	public function store()
	{	
		$paramOferta = array(
			'ofer_destino' => $this->input->post("ofer_destino"),
			'ofer_descripcion' => $this->input->post("ofer_descripcion"),
			'ofer_figurar' => $this->input->post("ofer_figurar")
		);
		if(null !== $this->input->post("ofer_destino_dep"))
			$paramOferta['ofer_destino_dep'] = $this->input->post("ofer_destino_dep");
		$this->MOferta->guardar($paramOferta);				
		$data['response'] = 'La oferta ha sido registrada satisfactoriamente';
		$data['ofertas'] = $this->MOferta->get_ofertas();
		$data['llamados'] = $this->MLlamado->get_llamados();
		$this->load->view('layouts/top');
	    $this->load->view('oferta/index', $data);
	    $this->load->view('layouts/bottom');
	}
	/*
	* Método edit, para mostrar formulario de edición de oferta
	*
	*/	
	public function edit($ofer_id)
	{
		$item = $this->MOferta->get_ofertas($ofer_id);
		$this->load->view('layouts/top');
		$this->load->view('oferta/edit',array('item'=>$item));
		$this->load->view('layouts/bottom');
	}
	/*
	* Método update, para actualizar los datos generales del sistema
	*
	*/
	public function update($ofer_id)
	{	
		$query = $this->db->get_where('oferta', array('ofer_id' => $ofer_id));
		if($query->row_array())
		{
			$this->MOferta->update($ofer_id);
			$data['response'] = 'La oferta se ha actualizado correctamente.';
			$data['ofertas'] = $this->MOferta->get_ofertas();
			$data['llamados'] = $this->MLlamado->get_llamados();
			$this->load->view('layouts/top');
			$this->load->view('oferta/index',$data);
			$this->load->view('layouts/bottom');
		}
	}
	/*
	* Método curriculum, para mostrar los curriculums de los estudiantes inscritos
	*
	*/	
	public function curriculum($ofer_id)
	{
		$data["curriculums"] = $this->MOferta->get_curriculums($ofer_id);
		$data["oferta"] = $ofer_id;
		$this->load->view('layouts/top');
		$this->load->view('oferta/curriculum',$data);
		$this->load->view('layouts/bottom');
		
	}
	/*
	* Método finalizar, para contratar a los estudiantes seleccionados y establecer si el llamado queda desierto, o finalizado
	*
	*/	
	public function finalizar()
	{
		$cont = 0;
		if($this->input->post("insc_contratado")){
			foreach ($this->input->post("insc_contratado") as $contratado) {
				$this->MInscrito->contratar($contratado);
				$cont++;
			}
		}
		$ofer_id = $this->input->post("ofer_id");
		if($cont == 0)
		{
			$this->MLlamado->finalizar($ofer_id,'desierto',$this->input->post("llam_desierto"));
		}else{
			$this->MLlamado->finalizar($ofer_id,'finalizado');
		}
		$data['ofertas'] = $this->MOferta->get_ofertas();
		$data['llamados'] = $this->MLlamado->get_llamados();
		$data['response'] = "La oferta ha finalizado.";
		$this->load->view('layouts/top');
		$this->load->view('oferta/index',$data);
		$this->load->view('layouts/bottom');
		
	}
	/*
	* Metodo para mostrar confirmación de eliminación de oferta
	*
	*/
	public function confirm_delete($ofer_id)
	{		
		$data['oferta'] = $this->MOferta->get_ofertas($ofer_id);		
		$this->load->view('layouts/top');
		$this->load->view('oferta/delete', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminación de oferta
	*
	*/
	public function delete($ofer_id)
	{		
		$item = $this->MOferta->delete($ofer_id);
		$data['response'] = 'oferta eliminada correctamente.';
		$data['ofertas'] = $this->MOferta->get_ofertas();
		$data['llamados'] = $this->MLlamado->get_llamados();
		
		$this->load->view('layouts/top');
		$this->load->view('oferta/index', $data);
		$this->load->view('layouts/bottom');
	}
}
?>