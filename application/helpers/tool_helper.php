<?php
	function verify_data($data){
		$message = "";

		$error["count"] = 0;

		$tools = get_instance();

		if(empty($data["title"])){
			$message.="<li>Title is a must</li>";
			$error["count"]++;
		}

		if(empty($data["abstract"])){
			$message.="<li>Abstract is a must</li>";
			$error["count"]++;
		}

		if($tools->Tools_model->find($data["title"])) {
			$error["count"]++;
			$message.="<li>Title has been already taken</li>";
		}

		if(empty($data["year"])){
			$error["count"]++;
			$message.="<li>Year is a must</li>";
		}

		if(empty($data["year"])){
			$error["count"]++;
			$message.="<li>Version is a must</li>";
		}

		if(empty($data["file"])){
			$error["count"]++;
			$message.="<li>File to upload is a must</li>";
		}
	

		$error["message"] = $message;

		return $error;
	}

?>