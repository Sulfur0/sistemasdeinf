<?php 
/**
 * 
 */
class MLlamado extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	
	public function guardar($paramLlamado){
		$this->db->insert("llamado",$paramLlamado);
		return $this->db->insert_id();
	}

	
	public function get_llamados($llam_id = FALSE)
	{
		$this->db->join('oferta', 'llamado.ofer_id = oferta.ofer_id', 'left');
		if ($llam_id === FALSE)
	    {
	        $query = $this->db->get('llamado');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('llamado', array('llamado.llam_id' => $llam_id));
	    return $query->row_array();
	}

	public function update($llam_id) 
    {    	
    	$data=array(
    		'llam_fec_inic' => $this->input->post('llam_fec_inic'),    		
            'llam_fec_lim' => $this->input->post('llam_fec_lim')
        );
        $this->db->where('llam_id', $llam_id);
		return $this->db->update('llamado', $data);
    }

    public function finalizar($ofer_id, $arg, $desierto = FALSE) 
    {   	
    	$data=array('llam_status' => $arg);
    	if($desierto !== FALSE)
    		$data["llam_desierto"] = $desierto;
        $this->db->where('ofer_id', $ofer_id);
		return $this->db->update('llamado', $data);
    }

    public function delete($llam_id)
    {
    	return $this->db->delete('llamado', array('llam_id' => $llam_id));
    }
}
 ?>