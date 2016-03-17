<?php
class Tools extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('Tools_model');
    		$this->load->helper('tool_helper');
    }

	public function index(){
		$data['tools'] = $this->Tools_model->all();

		session_start();
		$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');
	}


	public function edit($id){
		session_start();

		$data['tools'] = $this->Tools_model->find($id);

		$_POST['title'] = $data['tools']['name'];
		$_POST['abstract'] = $data['tools']['abstract'];

		$this->load->view('templates/header');
		$this->load->view('tools/update', $data);
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

	public function add(){

		$data;

		if(isset($_POST['btnUpload']))
		{
			$input = array(
			"title" => $_POST['title'],
			"abstract" => $_POST['abstract'],
			"author" => $_POST['author'],
			"year" => $_POST['year'],
			"file" => $_POST['fileToUpload'],
			"version" => $_POST['version']
			);


			$data["error"] = verify_data($input);

			if($data["error"]["count"]==0){

				$toolsdata["name"] = $input["title"];
			    $toolsdata["abstract"] = $input["abstract"];
			    $toolsdata["authors"] = $input["author"];
			    $toolsdata["year"] = $input["year"];

			    $otherinfo["version"] = $input["version"];
				$otherinfo["file"] = $input["file"];

				$user = $this->Tools_model->insert($toolsdata, $otherinfo);
				header('Location: new');

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