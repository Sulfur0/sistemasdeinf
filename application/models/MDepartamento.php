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
	//Obtención de departamentos vinculados con una facultad determinada
	public function get_departamentos($fac_id = FALSE)
	{
		if ($fac_id === FALSE)
	    {
	        $query = $this->db->get('departamento');
	        return $query->result_array();
	    }
	    $query = $this->db->get_where('departamento', array('departamento.fac_id' => $fac_id));
		return $query->result_array();
	    
	}
	//Obtencion de un departamento en particular según su dep_id
	public function get_departamento($dep_id)
	{
		$query = $this->db->get_where('departamento', array('departamento.dep_id' => $dep_id));
		return $query->row_array();	    
	}
	public function guardar($paramDeàrtamento){
		$this->db->insert("departamento",$paramDeàrtamento);
		return $this->db->insert_id();
	}
	public function update($dep_id) 
    {
    	
    	$data=array(
    		'dep_nombre' => $this->input->post('dep_nombre'),  
        );
        $this->db->where('dep_id', $dep_id);
		return $this->db->update('departamento', $data);
    }

    public function delete($dep_id)
    {
    	return $this->db->delete('departamento', array('dep_id' => $dep_id));
    }
}
?>