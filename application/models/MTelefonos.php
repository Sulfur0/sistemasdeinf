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
	
}
 ?>