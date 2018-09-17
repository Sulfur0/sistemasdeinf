<?php 
/**
 * 
 */
class MTelefonos extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
		
	public function guardar($paramTelefonos){
		if($this->db->insert("telefonos",$paramTelefonos))
			return true;
		else
			return false;
	}

	
	public function get_telefonos($est_id)
	{
		$query = $this->db->get_where('telefonos', array('telefonos.est_id' => $est_id));
	    return $query->result_array();
	}
	
}
 ?>