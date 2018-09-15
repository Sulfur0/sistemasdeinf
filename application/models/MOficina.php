<?php 
/**
 * 
 */
class MOficina extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}	
	
	public function store($paramOficina){
		$this->db->insert("oficina",$paramOficina);
	}

	public function update($id,$paramOficina) 
    {    	
    	
        $this->db->where('ofi_id', $id);
		return $this->db->update('oficina', $paramOficina);
    }

}
 ?>