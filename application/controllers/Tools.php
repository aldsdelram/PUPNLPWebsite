<?php
class Tools extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model('Tools_model');
    		$this->load->helper('tool_helper');
    }
	public function index(){


	}

	public function add(){

		$data;

		if(isset($_POST['btnUpload']))
		{
			$input = array(
			"title" => $_POST['title'],
			"abstract" => $_POST['abstract'],
			"author" => $_POST['author'],
			"year" => $_POST['year'],
			"file" => $_POST['fileToUpload']
			);


			$data["error"] = verify_data($input);

			if($data["error"]["count"]==0){

			}
			else{
				echo "ERRORRRRRRRR!!!!!";
			}

		}


		$this->load->view('templates/header');
		if(empty($data))
	        $this->load->view('tools/new');
	    else
	    	$this->load->view('tools/new', $data);
        $this->load->view('templates/footer');
	}
}