<?php
	echo $newline;
	
	echo '<div class="container-fluid">';
	echo '<div class="col-md-10 col-md-offset-1">'."\n";
	echo '<div class="table-responsive">';
		echo '<table class="table" width="100%" border="0" cellpadding="3" cellspacing="1">';
				echo "<th><strong>Username</strong></th>";
				echo "<th><strong>Gender</strong></th>";
				echo "<th><strong>Occupation</strong></th>";
				echo "<th><strong>About</strong></th>";
				echo "<th><strong>Action</strong></th>";
				
			foreach($result->result() as $row){
				echo "<tr>";

				$user = $this->db->get_where('users', array('id'=> $row->id));
				$user = $user->row_array();

				echo '<td style="vertical-align:middle">' . $user["username"] . "</td>";

					$other_info = $this->db->get_where('user_infos', array('user_id'=> $row->id));
					$other_info = $other_info->row_array();


					echo '<td style="vertical-align:middle">' . $other_info["gender"] .
					'</td><td style="vertical-align:middle">' . $other_info["occupation"] .
					'</td><td style="vertical-align:middle">' . $other_info["about"] .
					"</td>";

					echo '<td width="220" height="60" style="vertical-align:middle">
							<a href="approve/'. $row->id . '/1" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">APPROVE</a>
							<a href="approve/'. $row->id . '/0" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #800000; border: 0; text-decoration: none;">DENY</a>
						</td>';					
			}
		echo "</table>";
	echo '</div>';
	echo '</div>';
	echo '</div>';
?>