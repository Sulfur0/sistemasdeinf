<?php 
/**
 * 
 */
class MEmpresa extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}	
	
	public function guardar($paramFacultad){
		$this->db->insert("empresa",$paramFacultad);
		return $this->db->insert_id();
	}

	
	public function get_empresas($emp_id = FALSE)
	{
		if ($emp_id === FALSE)
	    {
	        $query = $this->db->get('empresa');
	        return $query->result_array();
	    }
		$query = $this->db->get_where('empresa', array('empresa.emp_id' => $emp_id));
		return $query->row_array();
	}

	public function update($emp_id) 
    {    	
    	$data=array(
    		'emp_rif' => $this->input->post('emp_rif'), 
    		'emp_nombre' => $this->input->post('emp_nombre'),  
        );
        $this->db->where('emp_id', $emp_id);
		return $this->db->update('empresa', $data);
    }

    public function delete($emp_id)
    {
    	return $this->db->delete('empresa', array('emp_id' => $emp_id));
    }
}
 ?>