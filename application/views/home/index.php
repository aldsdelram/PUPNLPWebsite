<?php
	
	$_POST["username"] = $this->session->userdata('username');
 
 
	echo '<div class="container-fluid">';
	
	echo '<div class="well col-xs-12">'."\n";
		echo '<h1>Links</h1>'."\n";

		$user = $this->db->get_where('users', array('username'=> $this->session->userdata('username')));
		$user = $user->row_array();

		if($user["type"]  == "member") 
		echo '<a href="tools" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">TOOLS</a>';
		else 
		{
			echo '<a href="tools" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">TOOLS</a>
				  <a href="requests" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">DOWNLOAD APPROVAL</a>
				  <a href="approve_users" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">MEMBER APPROVAL</a>
				  <a href="summary" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">VIEW REPORT</a>
				  <a href="publication/add" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">ADD PUBLICATION</a>
				  ';	
		}
		
	echo '</div>';

	echo '</div>';
?>