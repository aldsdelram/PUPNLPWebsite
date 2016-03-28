<?php
	echo '<h1>&nbsp&nbsp Publications </h1>'."\n";
	
	// echo "<table border=1> <tr><th>Name</th><th>Abstract</th><th>Author</th><th>Year</th></tr>";
	// foreach($tools->result() as $row){
	// 	echo "<tr><td>".$row->name ."</td><td>".$row->abstract."</td><td>".$row->authors."</td><td>".$row->year."</td></tr>";
	// }
	// echo "</table>";


	echo '<div class="col-xs-12 col-md-6">'."\n";
		echo '<h2> LIST </h2>';
		echo '<div class="list-group">';

			foreach($publication->result() as $row){
			  echo '<a href="#" id="publist" class="list-group-item active" data-id="'.$row->id.'">';
				echo '<span class="badge">'.$row->year.'</span>';
			  	echo $row->title.' - '.$row->author;
			  echo '</a>';
			}
		echo '</div>';
		echo '</ul>';

	echo '</div>'."\n";

	echo '<div class="col-xs-12 col-md-6">'."\n";
		echo '<h2>PUBLICATION DETAILS</h2>';
			echo"<h3>";
			echo '<span class="pub_title">TITLE:</span>&nbsp;';
			echo '<span id="pub_title"></span>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="pub_title">AUTHOR:</span>&nbsp;';
			echo '<span id="pub_author"><span>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="pub_title">YEAR OF PUBLICATION:</span>&nbsp;';
			echo '<span id="pub_year"><span>';
			echo "</h3>";

			echo"<h3>";
			echo '<span class="pub_title">URL:</span>&nbsp;';
			//echo '<a href = "'.$row->url.'" target=_blank><span id="pub_url"><span></a>';
			echo '<span id="pub_url"><span>';
			echo "</h3>";


	echo '</div>'."\n";

?>


<script type="text/javascript">
	$(document).ready(function(){
	    $("a#publist").click(function(){
	    	$id = $(this).attr('data-id');
	    	$theURL = '<?php echo base_url() ?>publication/'+$id+'/info';
	        $.ajax({url: $theURL, 
	        	type: "GET",
				dataType: "json",

	        	success: function(data, textStatus, xhr){
		            $("#pub_title").text(data.title);
		            $("#pub_author").text(data.author);
		            $("#pub_year").text(data.year);
		            $("#pub_url").html("<a href='"+data.url+"' target='_blank'>"+data.url+"</a>")

		            // $("#tool_version").text(data.version);		            
		            //$("#updateLink").href($("#pub_url").text(data.url));
	        }});
	    });
	});
</script>