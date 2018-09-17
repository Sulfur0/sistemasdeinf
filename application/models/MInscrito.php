<?php 
/**
 * 
 */
class MInscrito extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	
	public function guardar($paramInscrito){
		$this->db->insert("inscrito",$paramInscrito);
		return $this->db->insert_id();
	}

	//obtiene los inscritos vinculados con un llamado
	public function get_inscritos($llam_id)
	{		
		$this->db->join('estudiantes', 'inscrito.est_id = estudiantes.est_id', 'left');
		$query = $this->db->get_where('inscrito', array('inscrito.llam_id' => $llam_id));
	    return $query->result_array();
	}
	//obtiene todos los inscritos o un inscrito en especifico
	public function get_inscrito($insc_id = FALSE)
	{
		$this->db->join('estudiantes', 'inscrito.est_id = estudiantes.est_id', 'left');
		if ($insc_id === FALSE)
	    {
	        $query = $this->db->get('inscrito');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('inscrito', array('inscrito.insc_id' => $insc_id));
	    return $query->row_array();
	}
	public function contratar($insc_id)
	{
		$data=array(
        	'insc_contratado' => 1, 
        );
        $this->db->where('insc_id', $insc_id);
		return $this->db->update('inscrito', $data);
	}
    public function delete($insc_id)
    {
    	return $this->db->delete('inscrito', array('insc_id' => $insc_id));
    }
}
 ?>