<?php
class Users extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->model('Users_model');
    		$this->load->helper('user_helper');
    }

	public function register()
	{
		$data["page"] = "register";

		if(isset($_POST['btnRegister']))
		{
			$input = array(
			"username" => $_POST['username'],
			"password" => $_POST['password'],
		    "confirmpass" => $_POST['password_confirm'],
		    "firstname" => $_POST['firstname'],
		    "middlename" => $_POST['middlename'],
		    "lastname" => $_POST['lastname'],
		    "email" => $_POST['email'],
		    "gender" => isset($_POST['gender'])?$_POST['gender']:"",
		    "occupation" => $_POST['occupation'],
		    "otherinfo" => $_POST['otherinfo']
			);
			
			$data["error"] = verify_data($input);

			if($data["error"]["count"]==0){
				$salt = generate_salt();

				$userdata["username"] = $input["username"];
			    $userdata["salt"] = encrypt_salt($salt, 'enElpiPUP1516');
	    		$userdata["password"] = hash_password($input["password"], $salt);
	    		$userdata["type"] = "member";

				$other["first_name"] = $input["firstname"];
				$other["middle_name"] = $input["middlename"];
				$other["last_name"] = $input["lastname"];
				$other["email"] = $input["email"];
				$other["gender"] = $input["gender"];
				$other["occupation"] = $input["occupation"];
				$other["about"] = $input["otherinfo"];

				$user = $this->Users_model->insert($userdata, $other);
				header('Location: register');
	    		
			}
		}		

        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');
	}

	public function login(){
		$data['page'] = "login";
		$data['newline'] = "<br/>";


		if(isset($_POST['btnLogin'])){
			$username = $_POST["username"];
			$password = $_POST["password"];

			if($user_info = $this->Users_model->find($username)) {

				if(verify($password, $user_info["password"], $user_info["salt"])){
					session_start();
					$_SESSION['username'] = $username;
					header('Location: home');
				}
				else echo "false";
			}
			else
				echo "Check your password or username";
		}

		$this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');
	}

	public function update($id){
		$data['page'] = "update";
		$data['newline'] = "<br/>";

		$data['id'] = $id;

        $this->load->view('templates/header');
        $this->load->view('users/update', $data);
        $this->load->view('templates/footer');
		
	}
}