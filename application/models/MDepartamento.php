<?php 
/**
 * 
 */
class MDepartamento extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	public function get_departamentos($fac_id = FALSE)
	{
		if ($fac_id === FALSE)
	    {
	        $query = $this->db->get('departamento');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('departamento', array('departamento.fac_id' => $fac_id));
		if(empty($query->row_array()))
	    	return array();
		else
			return $query->row_array();
	    
	}
	public function guardar($paramDeàrtamento){
		$this->db->insert("departamento",$paramDeàrtamento);
		return $this->db->insert_id();
	}
}
?>