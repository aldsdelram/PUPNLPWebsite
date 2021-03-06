<?php
class Admin extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->helper('url');
    }

	public function approve_users(){
		$data['page'] = "approve_users";
		$data['newline'] = "<br/>";

		check_if_admin();

		$data['result'] = $this->db->get_where('user_validity', array('validity' => 0));

        $this->load->view('templates/header');
        $this->load->view('admin/approve_users', $data);
        $this->load->view('templates/footer');
	}

	public function approve($id,$option){

		check_if_admin();

		if($option == 1)
		{
			$data = array(
               'validity' => $option,
            );

			$this->db->where('id', $id);
			$this->db->update('user_validity', $data);
		}
		else
		{
			$this->db->delete('users', array('id' => $id)); 
			$this->db->delete('user_infos', array('user_id' => $id)); 
			$this->db->delete('user_validity', array('id' => $id)); 
		}

		redirect('approve_users', 'location', 301);
		//header('Location:'.base_url('approve_users'));
	}

	public function requests(){
		$data['page'] = "requests";
		$data['newline'] = "<br/>";
		check_if_admin();
		$data['result'] = $this->db->get_where('download_requests', array('accepted_by' => 0));

        $this->load->view('templates/header');
        $this->load->view('admin/requests', $data);
        $this->load->view('templates/footer');
	}

	public function approve_request($id,$option){
		check_if_admin();

		if($option == 1)
		{
			$data = array(
               'accepted_by' => $this->session->userdata('id')
            );

			$this->db->where('id', $id);
			$this->db->update('download_requests', $data);
		}
		else
		{
			$this->db->delete('download_requests', array('id' => $id)); 
		}
		
		redirect('requests', 'location', 301);
	}

}