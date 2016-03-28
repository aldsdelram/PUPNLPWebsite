<?php
class publication_model extends CI_Model {
     public function __construct()
    {
    	$this->load->database();
    }

    public function all(){
        return $this->db->get('publication');
    }


    public function findid($id)
	{
        $query = $this->db->get_where('publication', array('id' => $id));

        return $query->row_array();
	}

 //    public function find_version($id)
	// {
 //        $query = $this->db->get_where('tools_version', array('tool_id' => $id));

 //        return $query->row_array();
	// }

    public function find($title)
	{
        $query = $this->db->get_where('publication', array('title' => $title));
        return $query->row_array();
	}

	public function insert($pubdetails){
		$query1 = $this->db->insert('publication', $pubdetails);

		return array("publication" => $query1);
	}

	
}
