<?php
class Publication extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('publication_model');
    		$this->load->helper('publication_helper');
    }


	public function index(){
		$data['publication'] = $this->publication_model->all();

		$this->load->view('templates/header');
		$this->load->view('publication/viewpubs', $data);
		$this->load->view('templates/footer');
	}

	public function getinfo($id){
		$data['info'] = $this->publication_model->findid($id);

		header('Content-Type: application/json');
		echo json_encode($data['info']);
		/*$this->load->view('templates/header');
		$this->load->view('tools/viewtools', $data);
		$this->load->view('templates/footer');*/
	}


	public function add(){
		check_if_admin();
		
		$data;

		if(isset($_POST['btnAdd']))
		{
			$input = array(
			"title" => $_POST['title'],
			"author" => $_POST['author'],
			"year" => $_POST['year'],
			"url" => $_POST['url']
			);


			$data["error"] = verify_data($input);

			if($data["error"]["count"]==0){

				$pubdetails["title"] = $input["title"];
			    $pubdetails["author"] = $input["author"];
			    $pubdetails["year"] = $input["year"];
			    $pubdetails["url"] = $input["url"];

				$pub = $this->publication_model->insert($pubdetails);
				header('Location: new');

			}

		}


		$this->load->view('templates/header');
		if(empty($data))
	        $this->load->view('publication/new');
	    else
	    	$this->load->view('publication/new', $data);
	        $this->load->view('templates/footer');
	}

	
}