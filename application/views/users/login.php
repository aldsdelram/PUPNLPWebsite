<?php

	
	echo '<div class="container-fluid">';


	echo '<div class="well col-xs-12">'."\n";
	echo '<form method="post" onsubmit="" class="container">'."\n";
		echo '<h1>Login</h1>'."\n";

		echo "<label> Username </label>\n";
		echo "<input class='form-control' name='username' type='text' placeholder='username' value='".(empty($_POST["username"])?"":$_POST["username"])."'/>\n";
		echo $newline;

		echo "<label> Password </label>";
		echo "<input class='form-control' name='password' type='password' />";
		echo $newline;

		echo '<button type="submit" class="btn btn-primary" name="btnLogin">Login</button> ';
		echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'" name="btnCancel">Cancel</button>';


	echo '</form>';
	echo '</div>';

	echo '</div>';
?>