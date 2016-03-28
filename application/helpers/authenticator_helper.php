<?php
	function check_if_admin(){
		$CI = get_instance();
		if(!$CI->session->userdata('id')){
			redirect(base_url('login'), 'location', 301);
	    }
	    else{
	    	if($CI->session->userdata('type') != 'admin'){
	    		redirect(base_url('home'), 'location, 301');
	    	}
		}
	}

	function check_if_logged_in(){
		$CI = get_instance();
		if(!$CI->session->userdata('id')){
			redirect(base_url('login'), 'location', 301);
	    }
	    else{
	    	$users = get_instance();
	    	if($CI->session->userdata('validity') == 0){
	    		redirect(base_url(), 'location', 301);
	    	}
	    }
	}

	function check_if_both(){
		$CI = get_instance();
		if(!$CI->session->userdata('id')){
			redirect(base_url('login'), 'location', 301);
	    }
	    else if($CI->session->validity == 0){
		    redirect(base_url(), 'location', 301);	
	    }
	}

	

	function check_if_already_logged_in(){
		$CI = get_instance();
		if($CI->session->userdata('id')){
			redirect(base_url('home'), 'location', 301);
	    }	
	}
?>