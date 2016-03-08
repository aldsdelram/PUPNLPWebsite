<?php
	function verify_data($data){
		$message = "";

		$error["count"] = 0;

		$users = get_instance();

		if(empty($data["username"])){
			$message.="<li>Username is a must</li>";
			$error["count"]++;
		}

		if(strlen($data["username"])> 30){
			$error["count"]++;
			$message.="<li>Username must not exceed in 30 charactes</li>";
		}

		if($users->Users_model->find($data["username"])) {
			$error["count"]++;
			$message.="<li>username has been already taken</li>";
		}

		if(strlen($data["password"]) < 8){
			$error["count"]++;
			$message.="<li>Password must atleast 8 characters</li>";
		}
		else if($data["password"] != $data["confirmpass"]){
			$error["count"]++;
			$message.="<li>Password did not match</li>";
		}

		if(empty($data["firstname"])){
			$error["count"]++;
			$message.="<li>First name is a must</li>";
		}
		if(empty($data["lastname"])){
			$error["count"]++;
			$message.="<li>Last name is a must</li>";
		}
		
		if(empty($data["email"])){
			$error["count"]++;
			$message.="<li>Email Address is a must</li>";
		}

		if($users->Users_model->find_email($data["email"])){
			$error["count"]++;
			$message.="<li>Email Address is a must</li>";	
		}

		if(empty($data["gender"])){
			$message.="<li>Gender is a must</li>";
			$error["count"]++;
		}
		
		if(empty($data["occupation"])){
			$error["count"]++;
			$message.="<li>Occupation is a must</li>";
		}

		if(empty($data["otherinfo"])){
			$error["count"]++;
			$message.="<li>Other Information is a must</li>";
		}

		$error["message"] = $message;

		return $error;
	}

	require("security.php");	
?>