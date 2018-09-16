<?php 
/**
 * 
 */
class MOferta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	
	public function guardar($paramOferta){
		$this->db->insert("oferta",$paramOferta);
		return $this->db->insert_id();
	}

	
	public function get_ofertas($ofer_id = FALSE)
	{
		if ($ofer_id === FALSE)
	    {
	        $query = $this->db->get('oferta');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('oferta', array('oferta.ofer_id' => $ofer_id));
		return $query->row_array();
	}

	public function update($ofer_id) 
    {
    	$data=array(
    		'ofer_descripcion' => $this->input->post('ofer_descripcion'),  
        );
        $this->db->where('ofer_id', $ofer_id);
		return $this->db->update('oferta', $data);
    }

    public function delete($ofer_id)
    {
    	return $this->db->delete('oferta', array('ofer_id' => $ofer_id));
    }
}
 ?>