<?php 
/**
 * 
 */
class MEstudiantes extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	
	public function guardar($paramEstudiantes){
		$this->db->insert("estudiantes",$paramEstudiantes);
		return $this->db->insert_id();
	}

	
	public function get_estudiantes($id = FALSE)
	{
		$this->db->join('carrera', 'estudiantes.car_id = carrera.carr_id', 'left');
		if ($id === FALSE)
	    {
	        $query = $this->db->get('estudiantes');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('estudiantes', array('estudiantes.est_id' => $id));
	    return $query->row_array();
	}

	public function update($id) 
    {
    	
    	$data1=array(
    		'clave' => sha1($this->input->post('clave')),    		
            'usr_fec_actualizacion' => date("Y-m-d"), 
        );
        $data2=array(
        	'email' => $this->input->post('email'),            
            'nombre' => $this->input->post('nombre'),
            'appaterno' => $this->input->post('appaterno'),
            'apmaterno' => $this->input->post('apmaterno'),
            'dni' => $this->input->post('dni'),
            'direccion' => $this->input->post('direccion'),
        );
        $this->db->where('idUsuario', $id);
		$this->db->update('usuario', $data1);

		$this->db->where('idPersona', $this->input->post('idPersona'));		
       	return $this->db->update('persona', $data2);
    }

    public function delete($id)
    {
    	return $this->db->delete('usuario', array('idUsuario' => $id));
    }
}
 ?>