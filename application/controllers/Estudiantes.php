<?php
/**
 * Controlador de persona necesario para CRUD de atributos a usuarios.
 */
class Estudiantes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MEstudiantes');
		$this->load->model('MTelefonos');
		$this->load->model('MFacultad');
		$this->load->model('MCarrera');
		$this->load->helper('url');
	}
	/*
	* Método index, para mostrar una pagina de inicio
	*
	*/
	public function index(){
		return "index errado.";
	}
	/*
	* Método para el mostrar el formulario de registro de estudiantes
	*
	*/
	public function create(){
		$data['facultades'] = $this->MFacultad->get_facultades();	
		$this->load->view('layouts/top');
		$this->load->view('estudiantes/create',$data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Método para devolver las carreras mediante AJAX
	*
	*/
	public function find_carreras(){
		$entrada = $this->input->post("facultad");
		$query = $this->db->get_where('carrera', array('carrera.fac_id' => $entrada));		
		// hago texto compatible con IE7, IE8
  		header('Content-type: text/plain'); 
  		// hago el json no IE
  		header('Content-type: application/json');
		echo json_encode($query->result_array());
	}
	/*
	* Método para el registro de estudiantes
	*
	*/
	public function store(){		

		$est_fec_nam = $this->input->post("est_fec_nam");
		$new_est_fec_nam = date("Y/m/d", strtotime($est_fec_nam));
		$paramEstudiante = array(
			'est_cedula' => $this->input->post("est_cedula"), 
			'est_nombre' => $this->input->post("est_nombre"), 
			'est_fec_nam' => $new_est_fec_nam,
			'est_direccion' => $this->input->post("est_direccion"),
			'est_email' => $this->input->post("est_email"),
			'est_curriculum' => $this->input->post("est_curriculum"),
			'car_id' => $this->input->post("car_id"),
			'est_semestre' => $this->input->post("est_semestre")			
		);
		

		//valido si el estudiante ya ha sido registrado...
		$query = $this->db->get_where('estudiantes', array('est_cedula' => $this->input->post("est_cedula")));
		if(empty($query->row()))
		{
			$idEstudiante = $this->MEstudiantes->guardar($paramEstudiante);
			
			foreach ($this->input->post("tel_numero") as $key => $numero) {
				$paramTelefono = array(
					'tel_numero' => $numero,
					'tel_descripcion' => $this->input->post("tel_descripcion")[$key],
					'est_id' => $idEstudiante
				);
				if(!$this->MTelefonos->guardar($paramTelefono))				
				{
					echo "Ha ocurrido un error al guardar el telefono.";
					print_r($paramTelefono);	
				}
			}	
			$data['estudiantes'] = $this->MEstudiantes->get_estudiantes();
			$data['response'] = 'Se ha registrado el estudiante correctamente.';
					
			$this->load->view('layouts/top');
			$this->load->view('estudiantes/list', $data);
			$this->load->view('layouts/bottom');	
						
		}
		else
		{
			$datos = array('errors' => 'El estudiante de cédula '.$this->input->post("est_cedula").' ya está registrado.');
			$this->load->view('layouts/top');
			$this->load->view('estudiantes/create', $datos);
			$this->load->view('layouts/bottom');
		}	
	}	
	/*
	* Método para mostrar una lista con todos los usuarios
	*
	*/
	public function view()
	{		
		$data['estudiantes'] = $this->MEstudiantes->get_estudiantes();
		$this->load->view('layouts/top');
		$this->load->view('estudiantes/list', $data);
		$this->load->view('layouts/bottom');

	}
	/*
	* @Description: Método para mostrar el formulario de edición de usuarios
	* @Params $id -> id del usuario a modificar
	* @return Response
	*/
	public function edit($id)
	{
		$data['facultades'] = $this->MFacultad->get_facultades();
		$data['estudiante'] = $this->MEstudiantes->get_estudiantes($id);

       	$this->load->view('layouts/top');
       	$this->load->view('estudiantes/edit',$data);
       	$this->load->view('layouts/bottom');
	}
	/*
	* Método para guardar la edición de los usuarios
	*
	*/
	public function update($id)
	{
		if(!$this->session->userdata('user')) header('location: '.base_url());

		$query = $this->db->get_where(
			'usuario', array(
				'nomUsuario' => $this->input->post('nomUsuario'), 
				'clave' => sha1($this->input->post('viejaclave'))
			)
		);
		if($query->row_array())
		{
			$this->MUsuario->update($id);
			$data['usuarios'] = $this->MUsuario->get_users();
			$data['response'] = 'El usuario se ha actualizado correctamente.';
			$this->load->view('layouts/top');
	       	$this->load->view('persona/list', $data);
	       	$this->load->view('layouts/bottom');
		}
		else
		{
			$data['item'] = $this->MUsuario->get_users($id);
			$data['error'] = 'La contraseña anterior no coincide.';
			$this->load->view('layouts/top');
	       	$this->load->view('persona/edit',$data);
	       	$this->load->view('layouts/bottom');
		}
	}
	/*
	* Metodo ver el curriculum de un estudiante
	*
	*/
	public function curriculum($id)
	{
		$data['estudiante'] = $this->MEstudiantes->get_estudiantes($id);
		$this->load->view('layouts/top');
		$this->load->view('estudiantes/curriculum', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo ver los teléfonos de un estudiante
	*
	*/
	public function telefonos($id)
	{
		$data['estudiante'] = $this->MEstudiantes->get_estudiantes($id);
		$data['telefonos'] = $this->MTelefonos->get_telefonos($id);		
		$this->load->view('layouts/top');
		$this->load->view('estudiantes/telefono', $data);
		$this->load->view('layouts/bottom');
	}
	/*
	* Metodo para eliminar un usuario
	*
	*/
	public function delete($id)
	{
		if(!$this->session->userdata('user')) header('location: '.base_url());
		$item = $this->MUsuario->delete($id);
		$data['response'] = 'Usuario eliminado correctamente.';
		$data['usuarios'] = $this->MUsuario->get_users();
		
		$this->load->view('layouts/top');
		$this->load->view('persona/list', $data);
		$this->load->view('layouts/bottom');
	}
}
?>