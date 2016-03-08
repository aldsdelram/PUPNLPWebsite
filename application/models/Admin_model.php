<?php
class Admin_model extends CI_Model {
    public function __construct()
    {
    	$this->load->database();
    }

    public function find($username)
	{
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
	}

    public function find_email($email)
	{
        $query = $this->db->get_where('user_infos', array('email' => $email));
        return $query->row_array();
	}

    public function find_info($user_id)
	{
        $query = $this->db->get_where('user_infos', array('user_id' => $user_id));
        return $query->row_array();
	}

	public function insert($data, $other_info){
		$query1 = $this->db->insert('users', $data);
		$other_info["user_id"] = $this->db->insert_id();
		$query2 = $this->db->insert('user_infos', $other_info);

		$validity = array(
			"user_id"=> $other_info["user_id"],
			"validity"=> 0
		);

		$query3 = $this->db->insert('user_validity', $validity);

		return array("user" => $query1, "user_info"=>$query2, "validity" => $query3);
	}

	public function update($updated_data, $user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('user_infos', $updated_data);
	}
}
