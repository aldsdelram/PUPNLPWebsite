<?php
class Tools extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('Tools_model');
    		// $this->load->helper('user_helper');
    }

	public function index(){
		$data['tools'] = $this->Tools_model->all();

		$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');
	}

	public function getinfo($id){
		$data['info'] = $this->Tools_model->find($id);
		header('Content-Type: application/json');
		echo json_encode($data['info']);
		/*$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');*/
	}
}