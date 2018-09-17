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
		//$this->db->join('llamado', 'oferta.ofer_id = llamado.ofer_id', 'left');
		if ($ofer_id === FALSE)
	    {
	        $query = $this->db->get('oferta');
	        return $query->result_array();
	        $query = $this->db->get_where('llamado', array('llamado.ofer_id' => $ofer_id));
	    }
		$query = $this->db->get_where('oferta', array('oferta.ofer_id' => $ofer_id));
		return $query->row_array();
	}

	public function get_curriculums($ofer_id)
	{
		$query = $this->db->get_where('llamado', array('llamado.ofer_id' => $ofer_id));		
		$llam_id = $query->row_array()["llam_id"];
		$this->db->join('estudiantes', 'inscrito.est_id = estudiantes.est_id', 'left');
		$query = $this->db->get_where('inscrito', array('inscrito.llam_id' => $llam_id));
		return $query->result_array();
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