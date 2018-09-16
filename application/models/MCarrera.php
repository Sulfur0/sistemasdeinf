<?php 
/**
 * 
 */
class MCarrera extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	
	public function guardar($paramCarrera){
		$this->db->insert("carrera",$paramCarrera);
		return $this->db->insert_id();
	}

	//Método para obtener una lista de carreras vinculadas a una facultad.
	public function get_carreras($fac_id = FALSE)
	{
		if ($fac_id === FALSE)
	    {
	        $query = $this->db->get('carrera');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('carrera', array('carrera.fac_id' => $fac_id));
		return $query->result_array();
	}
	//Método para obtener una carrera determinada según su carr_id
	public function get_carrera($carr_id)
	{		
		$query = $this->db->get_where('carrera', array('carrera.carr_id' => $carr_id));
		return $query->row_array();
	}

	public function update($carr_id) 
    {    	
    	$data=array(
    		'carr_nombre' => $this->input->post('carr_nombre'), 
    		'carr_unid_cred' => $this->input->post('carr_unid_cred'), 
        );
        $this->db->where('carr_id', $carr_id);
		return $this->db->update('carrera', $data);
    }

    public function delete($carr_id)
    {
    	return $this->db->delete('carrera', array('carr_id' => $carr_id));
    }
}
 ?>