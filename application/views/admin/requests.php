<?php
	echo $newline;
	
	echo '<div class="container-fluid">';
	echo '<div class="col-md-10 col-md-offset-1">'."\n";
	echo '<div class="table-responsive">';
		echo '<table class="table" width="100%" border="0" cellpadding="3" cellspacing="1">';
				echo "<th><strong>User</strong></th>";
				echo "<th><strong>Tool</strong></th>";
				echo "<th><strong>Requested Date</strong></th>";
				echo "<th><strong>Action</strong></th>";
				
			foreach($result->result() as $row){
				echo "<tr>";

				$user = $this->db->get_where('users', array('id'=> $row->user_id));
				$user = $user->row_array();

				echo '<td style="vertical-align:middle">' . $user["username"] . "</td>";


				$tool = $this->db->get_where('tools', array('id'=> $row->tool_id));
				$tool = $tool->row_array();


					echo '<td style="vertical-align:middle">' . $tool["name"] .
					'</td><td style="vertical-align:middle">' . $row->created_at .
					//'</td><td style="vertical-align:middle">' . $other_info["about"] .
					"</td>";

					echo '<td width="220" height="60" style="vertical-align:middle">
							<a href="approve_request/'. $row->id . '/1" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #2780e3; border: 0; text-decoration: none;">APPROVE</a>
							<a href="approve_request/'. $row->id . '/0" style="color: #FFFFFF; padding: 12px 20px; margin: 10px 2px; background-color: #800000; border: 0; text-decoration: none;">DENY</a>
						</td>';					
			}
		echo "</table>";
	echo '</div>';
	echo '</div>';
	echo '</div>';
?>