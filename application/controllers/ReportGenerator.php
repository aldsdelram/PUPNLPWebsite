<?php
class ReportGenerator extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model('Generator_Model');
    }

	public function index(){

		$data["unum"] = $this->Generator_Model->users_count();
		$data["dnum"] = $this->Generator_Model->download_count();
		$data["tnum"] = $this->Generator_Model->tool_count();
		$data['most_id'] = $this->Generator_Model->most_downloaded();
		$data['most_name'] = $this->Generator_Model->find_toolname($data['most_id']['tool_id']);


        $this->load->view('templates/header');
        $this->load->view('generator/index', $data);
        $this->load->view('templates/footer');
	}

	public function notif(){
		echo "download:".$this->Generator_Model->notif_info_dl()['total'].'<br/>';
		echo "signup:".$this->Generator_Model->notif_info_uv()['total'].'<br/>'; 
	}
}