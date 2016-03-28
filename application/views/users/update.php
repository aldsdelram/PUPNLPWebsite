<?php
	echo '<div class="well">'."\n";
	$newline = "<br/>";

	if(isset($error)){
		if(empty($error["message"])){

		}
		else{
		    echo '<div id="error_explanation">';
		    	echo '<h2>'.$error["count"].($error["count"]>1?" errors":" error").' prohibited this user from being saved:</h2>';
	      		echo"<ul>";
      				echo $error["message"];
		      	echo "</ul>";
		    echo "</div>";
		}
	}

	include('_form.php');

	echo "</div>";
	
?>