<?php
class ReportGenerator extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model('Generator_Model');
           $this->load->model('Tools_Model');
           $this->load->model('Users_Model');

    }

	public function index($id){


		$data['id'] = $id;

		$tool = $this->Tools_Model->find($id);

		$data['tool_name'] = $tool['name'];
		$data['tool_year'] = $tool['year'];

        $this->load->view('templates/header');
        $this->load->view('generator/index', $data);
        $this->load->view('templates/footer');
	}

	public function notif(){
		echo "download:".$this->Generator_Model->notif_info_dl()['total'].'<br/>';
		echo "signup:".$this->Generator_Model->notif_info_uv()['total'].'<br/>'; 
	}

	public function summary(){
		$data['newline'] = '<br />';

		$data["unum"] = $this->Generator_Model->users_count();
		$data["dnum"] = $this->Generator_Model->download_count();
		$data["tnum"] = $this->Generator_Model->tool_count();
		$data['most_id'] = $this->Generator_Model->most_downloaded();
		$data['most_name'] = $this->Generator_Model->find_toolname($data['most_id']['tool_id']);


		$data['weekly_tools'] = $this->Generator_Model->weekly();
		$data['total_tools'] = $this->Generator_Model->top_5();
		$data['all_tools'] = $this->Tools_Model->all();


		$this->load->view('templates/header');
        $this->load->view('generator/summary', $data);
        $this->load->view('templates/footer');
	}

	public function report($id){

		$tool = $this->Tools_Model->find($id);


		$data['tool_name'] = $tool['name'];
		$data['tool_authors'] = $tool['authors'];
		$data['tool_abstract'] = $tool['abstract'];
		$data['tool_year'] = $tool['year'];


		$data['weekly_dl'] = $this->Generator_Model->weekly_dl($id)->row_array()['total'] ;
		$data['total_dl'] = $this->Generator_Model->total_dl($id)->row_array()['total'] ;
		$data['weekly_vw'] = $this->Generator_Model->weekly_vw($id)->row_array()['total'] ;
		$data['total_vw'] = $this->Generator_Model->total_vw($id)->row_array()['total'] ;

		$data['users'] = $this->Generator_Model->who_downloaded($id);

		$date = getdate();
		$data['date'] = $date['month'].' '.$date['mday'].', '.$date['year'];


		$this->load->view('generator/report', $data);
	}

}