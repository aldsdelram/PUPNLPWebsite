<?php
	function verify_data($data){
		$message = "";

		$error["count"] = 0;

		$pub = get_instance();

		if(empty($data["title"])){
			$message.="<li>Title is a must</li>";
			$error["count"]++;
		}

		if($pub->publication_model->find($data["title"])) {
			$error["count"]++;
			$message.="<li>Title has been already taken</li>";
		}

		if(empty($data["author"])){
			$error["count"]++;
			$message.="<li>Author/s is a must</li>";
		}

		if(empty($data["year"])){
			$error["count"]++;
			$message.="<li>Year of Publication is a must</li>";
		}

		if(empty($data["url"])){
			$error["count"]++;
			$message.="<li>URL is a must</li>";
		}

		$error["message"] = $message;

		return $error;
	}

?>