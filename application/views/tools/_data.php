<?php
	echo '<h1>&nbsp&nbspView Tools </h1>'."\n";
	
	// echo "<table border=1> <tr><th>Name</th><th>Abstract</th><th>Author</th><th>Year</th></tr>";
	// foreach($tools->result() as $row){
	// 	echo "<tr><td>".$row->name ."</td><td>".$row->abstract."</td><td>".$row->authors."</td><td>".$row->year."</td></tr>";
	// }
	// echo "</table>";


	echo '<div class="col-xs-12 col-md-6">'."\n";
		echo '<h2> LIST </h2>';
		echo '<div class="list-group">';

			foreach($tools->result() as $row){
			  echo '<a href="#" id="toollist" class="list-group-item active" data-id="'.$row->id.'">';
				echo '<span class="badge">'.$row->year.'</span>';
			  	echo $row->name.' - '.$row->authors;
			  echo '</a>';
			}
		echo '</div>';
		echo '</ul>';

	echo '</div>'."\n";

	echo '<div class="col-xs-12 col-md-6">'."\n";
		echo '<h2>TOOL INFORMATION</h2>';
			echo"<h3>";
			echo '<span class="tool_title">TITLE:</span>&nbsp;';
			echo '<span id="tool_title"></span>';
			if(!empty($_SESSION['type']))
				if($_SESSION['type'] == "admin")
					echo '<small id="updateLink"></small>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="tool_title">AUTHOR:</span>&nbsp;';
			echo '<span id="tool_author"><span>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="tool_title">YEAR:</span>&nbsp;';
			echo '<span id="tool_year"><span>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="tool_title">ABSTRACT:</span>&nbsp;';
			echo '<span id="tool_abstract"><span>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="tool_title">VERSION:</span>&nbsp;';
			echo '<span id="tool_version"><span>';
			echo "</h3>";


	echo '</div>'."\n";

?>


<script type="text/javascript">
	$(document).ready(function(){
	    $("#toollist").click(function(){
	    	$id = $(this).attr('data-id');
	    	$theURL = 'tools/'+$id+'/info';
	        $.ajax({url: $theURL, 
	        	type: "GET",
				dataType: "json",

	        	success: function(data, textStatus, xhr){
		            $("#tool_title").text(data.name);
		            $("#tool_author").text(data.authors);
		            $("#tool_abstract").text(data.abstract);
		            $("#tool_year").text(data.year);
		            $("#tool_version").text("v1.456");		            
		            $("#updateLink").html("<a href='tools/"+$id+"/edit'>UPDATE</a>");
	        }});
	    });
	});
</script>