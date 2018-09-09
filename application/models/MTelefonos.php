<?php 
/**
 * 
 */
class MTelefonos extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
		
	public function guardar($paramTelefonos){
		if($this->db->insert("telefonos",$paramTelefonos))
			return true;
		else
			return false;
	}

	
	public function get_telefonos($tel_id)
	{
		$query = $this->db->get_where('telefonos', array('telefonos.tel_id' => $tel_id));
	    return $query->row_array();
	}
	/*
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
    */
}
 ?>