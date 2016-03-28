<?php
class Generator_Model extends CI_Model {
     
 	public function __construct()
    {
    	$this->load->database();
    }

	public function users_count(){
		$query = $this->db
			->where('type','member')
	        ->count_all_results('users');

        return $query;
	}

	public function download_count(){
		$query = $this->db
			->select('id')
	        ->count_all_results('downloads');

        return $query;
	}


	public function tool_count(){
		$query = $this->db
			->select('id')
	        ->count_all_results('tools');

        return $query;
	}

	public function most_downloaded(){
		$query = $this->db
			->select('tool_id, count(id) as total')
			->group_by('tool_id')
			->order_by('total', 'desc')
	        ->get('downloads', 10);

        return $query->row_array();
	}

	public function find_toolname($id){
		$query = $this->db->get_where('tools', array('id' => $id));

        return $query->row_array();
	}

	public function notif_info_dl(){
		$query = $this->db
			->select('count(id) as total')
			->where(array('accepted_by'=>0))
	        ->get('download_requests', 10);

	    return $query->row_array();
	}

	public function notif_info_uv(){
		$query = $this->db
			->select('count(id) as total')
			->where(array('validity'=>0))
	        ->get('user_validity', 10);

	    return $query->row_array();
	}

	public function weekly(){
		$day = date('w');
		$week_start = date('Y/m/d 00:00:00', strtotime('-'.$day.' days'));
		$week_end = date('Y/m/d 23:59:59', strtotime('+'.(6-$day).' days'));

		$query = $this->db
			->select('tool_id, count(id) as total')
			->where("created_at>=", $week_start)
			->where("created_at<=", $week_end)
			->group_by('tool_id')
			->having('total>',0)
			->order_by('total', 'desc')
	        ->get('downloads', 5);

       return $query;
	}

	public function top_5(){
		$query = $this->db
			->select('tool_id, count(id) as total')
			->group_by('tool_id')
			->order_by('total', 'desc')
	        ->get('downloads', 5);

       return $query;
	}

	public function all(){
		$query = $this->db
			->select('tool_id, count(id) as total')
			->group_by('tool_id')
			->order_by('total', 'desc')
	        ->get('downloads');

       return $query;
	}


	public function weekly_dl($id){
		$day = date('w');
		$week_start = date('Y/m/d 00:00:00', strtotime('-'.$day.' days'));
		$week_end = date('Y/m/d 23:59:59', strtotime('+'.(6-$day).' days'));

		

		$query = $this->db
			->select('tool_id, count(id) as total')
			->where("created_at>=", $week_start)
			->where("created_at<=", $week_end)
			->where(array('tool_id'=>$id))
	        ->get('downloads', 5);

       return $query;	
	}

	public function weekly_vw($id){
		$day = date('w');
		$week_start = date('Y/m/d 00:00:00', strtotime('-'.$day.' days'));
		$week_end = date('Y/m/d 23:59:59', strtotime('+'.(6-$day).' days'));

		$query = $this->db
			->select('tool_id, count(id) as total')
			->where("created_at>=", $week_start)
			->where("created_at<=", $week_end)
			->where(array('tool_id'=>$id))
	        ->get('tools_views', 5);

       return $query;	
	}


	public function total_dl($id){

		$query = $this->db
			->select('tool_id, count(id) as total')
			->where(array('tool_id'=>$id))
	        ->get('downloads', 5);
       return $query;	
	}


	public function total_vw($id){

		$query = $this->db
			->select('tool_id, count(id) as total')
			->where(array('tool_id'=>$id))
	        ->get('tools_views', 5);
       return $query;
	}

	public function who_downloaded($id){
		$query = $this->db
			->distinct()
			->select('downloaded_by as user_id')
			->where(array('tool_id'=>$id))
			->get('downloads');

		return $query;
	}

}
