<?php 
/**
 * 
 */
class MFacultad extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}	
	
	public function guardar($paramFacultad){
		$this->db->insert("facultad",$paramFacultad);
		return $this->db->insert_id();
	}

	
	public function get_facultades($fac_id = FALSE)
	{
		if ($fac_id === FALSE)
	    {
	        $query = $this->db->get('facultad');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('facultad', array('facultad.fac_id' => $fac_id));
	    return $query->row_array();
	}

	public function update($fac_id) 
    {
    	
    	$data1=array(
    		'fac_nombre' => $this->input->post('fac_nombre'),  
        );
        $this->db->where('fac_id', $fac_id);
		return $this->db->update('facultad', $data1);
    }

    public function delete($fac_id)
    {
    	return $this->db->delete('facultad', array('fac_id' => $fac_id));
    }
}
 ?>