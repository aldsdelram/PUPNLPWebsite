<?php
class Tools_model extends CI_Model {
     public function __construct()
    {
    	$this->load->database();
    }

    public function all(){
        return $this->db->get('tools');
    }

    public function find($id)
	{
        $query = $this->db->get_where('tools', array('id' => $id));
        return $query->row_array();
	}

    public function findtitle($title)
	{
        $query = $this->db->get_where('tools', array('name' => $title));
        return $query->row_array();
	}

	public function insert($toolsdata, $otherinfo){
		$query1 = $this->db->insert('tools', $toolsdata);
		$otherinfo["tool_id"] = $this->db->insert_id();
		$query2 = $this->db->insert('tools_version', $otherinfo);

		$validity = array(
			"tool_id"=> $otherinfo["tool_id"],
		);

		return array("tools" => $query1, "tools_version"=>$query2);
	}
 
}
