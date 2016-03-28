<?php

	echo '<div class="container-fluid">';
		echo '<div class="col-xs-10 col-xs-offset-1">';
			echo '<div class="row">';
				echo '<div class="well" >';
						echo '<h1>Summary Report</h1>';

						echo "<div class='row text-center'> ";
							echo "<h4>";
							echo '<div class="label-success label" > <span class="glyphicon glyphicon-hdd"> </span>&nbsp;Number of Tools: '.$tnum.' </div>&nbsp;';
							echo '<div class="label-info label" > <span class="glyphicon glyphicon-download"> </span>&nbsp;Number of all Downloads: '.$dnum.' </div>&nbsp;';
							echo '<div class="label-warning label" > <span class="glyphicon glyphicon-user"> </span>&nbsp;Number of all Users: '.$unum.' </div>';
							echo '</h4>';
						echo '</div>';

						echo '<div class="col-md-4">';
							echo "<h2>Top 5 Weekly's Most Downloaded Tools</h2>";

							echo '<div class="list-group">';
								if ($weekly_tools->num_rows() > 0)
								{
									foreach ($weekly_tools->result() as $row)
									{
									   $tool_name = $this->Tools_Model->find($row->tool_id)['name'];
										echo '<a href="'.base_url('report/'.$row->tool_id).'" id="toollist" class="list-group-item active" data-id="'.$row->tool_id.'">';
										echo '<span class="badge">'.$row->total.'</span>';
										echo $tool_name;
								  		echo '</a>';
									}
								}
								else{
									echo '<h4>Nothing to Show</h4>';
								}

							echo '</div>';
						echo '</div>';

						echo '<div class="col-md-4">';
							echo "<h2>Top 5 Most Downloaded Tools</h2>";

							echo '<div class="list-group">';
								if ($total_tools->num_rows() > 0)
								{
									foreach ($total_tools->result() as $row)
									{
									   $tool_name = $this->Tools_Model->find($row->tool_id)['name'];
										echo '<a href="'.base_url('report/'.$row->tool_id).'" id="toollist" class="list-group-item active" data-id="'.$row->tool_id.'">';
										echo '<span class="badge">'.$row->total.'</span>';
										echo $tool_name;
								  		echo '</a>';
									}
								}
								else{
									echo '<h4>Nothing to Show</h4>';
								}

							echo '</div>';
						echo '</div>';

						echo '<div class="col-md-4">';
							echo '<h2>Tools Summary</h2>';

								if ($all_tools->num_rows() > 0)
								{
									foreach ($all_tools->result() as $row)
									{
									   $tool_name = $this->Tools_Model->find($row->id)['name'];
										echo '<a href="'.base_url('report/'.$row->id).'" id="toollist" class="list-group-item active" data-id="'.$row->id.'">';
										// echo '<span class="badge">'.$row->total.'</span>';
										echo $tool_name;
								  		echo '</a>';
									}
								}
								else{
									echo '<h4>Nothing to Show</h4>';
								}

						echo '</div>';
					
					echo '<div class="clearfix"></div>';

				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
?>
