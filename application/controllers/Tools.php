<?php
class Tools extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('Tools_model');
    		$this->load->helper('tool_helper');
    		$this->load->library('ftp');
    }

	public function index(){
		$data['tools'] = $this->Tools_model->all();
		$data['tools_version'] = $this->Tools_model->alltoolsver();

		session_start();
		$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');
	}


	public function edit($id){

		$data["page"] = "update";
		$data;
		
		session_start();


		$data['tools'] = $this->Tools_model->find($id);
		$data['tools_version'] = $this->Tools_model->find_version($id);


		if(isset($_POST['btnUpdate']))
		{
			$input = array(
			"title" => $_POST['title'],
			"abstract" => $_POST['abstract'],
			"author" => $_POST['author'],
			"year" => $_POST['year'],
			"file" => $_FILES['fileToUpload']['name'],
			"version" => $_POST['version']
			);	

			$data["error"] = verify_data($input);

			if($data["error"]["count"]==0){

			$updatedtool["name"] = $input["title"];
	    	$updatedtool["abstract"] = $input["abstract"];
	    	$updatedtool["authors"] = $input["author"];
	    	$updatedtool["year"] = $input["year"];

	    	$updatedtoolver["file"] = $input["file"];
	    	$updatedtoolver["version"] = $input["version"];
			

			$this->Tools_model->updatetool($updatedtool, $id);
			$this->Tools_model->updatetoolver($updatedtoolver, $id);

			$config['hostname'] = 'localhost';
			$config['username'] = 'gega_16948146';
			$config['password'] = 'NLPGroupPUP';
			$config['port']     = 21;
			$config['debug'] = TRUE;

			$this->ftp->connect($config);

			$this->ftp->upload($_FILES['fileToUpload']['tmp_name'], '/public/tools/'.$_FILES['fileToUpload']['name'], 'auto');

			$this->ftp->close();

			header('Location: edit');

			}


		}

		$_POST['title'] = $data['tools']['name'];
		$_POST['abstract'] = $data['tools']['abstract'];
		$_POST['author'] = $data['tools']['authors'];
		$_POST['year'] = $data['tools']['year'];
		$_POST['version'] = $data['tools_version']['version'];
		$_POST['file'] = $data['tools_version']['file'];


		$this->load->view('templates/header');
		$this->load->view('tools/update', $data);
		$this->load->view('templates/footer');
	
	}
	// public function editversion($id){
	// 	session_start();

	// 	$data['tools_version'] = $this->Tools_model->find_version($id);

	// 	$_POST['version'] = $data['tools_version']['version'];

	// 	$this->load->view('templates/header');
	// 	$this->load->view('tools/update', $data);
	// 	$this->load->view('templates/footer');
	// }

	public function getinfo($id){
		$data['info'] = $this->Tools_model->find($id);
		$data['version'] = $this->Tools_model->find_version($id);
		header('Content-Type: application/json');
		echo json_encode($data['info'] + $data['version']);
		/*$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');*/
	}

	public function getversion($id){
		// $data['info'] = $this->Tools_model->find_version($id);
		// header('Content-Type: application/json');
		// echo json_encode($data['version']);
		/*$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');*/
	}

	public function add(){

		$data["page"] = "upload";
		$data;

		if(isset($_POST['btnUpload']))
		{
			$input = array(
			"title" => $_POST['title'],
			"abstract" => $_POST['abstract'],
			"author" => $_POST['author'],
			"year" => $_POST['year'],
			"file" => $_FILES['fileToUpload']["name"],
			"version" => $_POST['version']
			);


			$data["error"] = verify_data($input);

			//echo $_FILES["fileToUpload"];


			if($data["error"]["count"]==0){

				$toolsdata["name"] = $input["title"];
			    $toolsdata["abstract"] = $input["abstract"];
			    $toolsdata["authors"] = $input["author"];
			    $toolsdata["year"] = $input["year"];

			    $otherinfo["version"] = $input["version"];
				$otherinfo["file"] = $input["file"];

				$user = $this->Tools_model->insert($toolsdata, $otherinfo);

				$config['hostname'] = 'localhost';
				$config['username'] = 'gega_16948146';
				$config['password'] = 'NLPGroupPUP';
				$config['port']     = 21;
				$config['debug'] = TRUE;

				$this->ftp->connect($config);

				$this->ftp->upload($_FILES['fileToUpload']['tmp_name'], '/public/tools/'.$_FILES['fileToUpload']['name'], 'auto');

				$this->ftp->close(); 

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