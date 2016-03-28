<?php
class Tools_Model extends CI_Model {
     public function __construct()
    {
    	$this->load->database();
    }

    public function all(){
        return $this->db->get('tools');
    }

    public function alltoolsver(){
        return $this->db->get('tools_version');
    }

    public function find($id)
	{
        $query = $this->db->get_where('tools', array('id' => $id));

        return $query->row_array();
	}

    public function find_version($id)
	{
        $query = $this->db->get_where('tools_version', array('tool_id' => $id));

        return $query->row_array();
	}

	public function find_request($id)
	{
        $query = $this->db->get_where('download_requests', array('tool_id' => $id));

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

	public function add_view($view){
		$query1 = $this->db->insert('tools_views', $view);

		return array("tools_views" => $query1);
	}

	public function add_request($download){
		$query1 = $this->db->insert('download_requests', $download);

		return array("download_requests" => $query1);
	}

	public function add_download($download){
		$query1 = $this->db->insert('downloads', $download);

		// return array("download" => $query1);
	}

	public function updatetool($updatedtool, $id)
	{
		 $this->db->where('id', $id);
         $query = $this->db->update('tools', $updatedtool);

         return array("tools"=>$query);
	}

 	public function updatetoolver($updatedtoolver, $id)
	{
		 
		 $this->db->where('tool_id', $id);
         $query = $this->db->update('tools_version', $updatedtoolver);

         return array("tools_version"=>$query);
	}
	
}
