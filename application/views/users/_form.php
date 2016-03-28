<?php

	$newline = '<br />';

	echo '<form method="post" onsubmit="" class="col-md-10 col-md-offset-1 col-xs-12">'."\n";

	echo '<h1>'.($page=='register'?'Registration':'Update Information').'</h1>'."\n";

	echo "<label class='form-label'> Username </label>\n";
	echo "<input class='form-control' name='username' type='text' placeholder='username' value='".(empty($_POST["username"])?"":$_POST["username"])."' ".($page=='register'?'':'disabled')." />\n";
	echo $newline;
	
	echo "<label>".($page=='register'?'':'Change')." Password </label>";
	echo "<input class='form-control' name='password' type='password' />";
	echo $newline;

	if($page == 'register'){
		echo "<label> Confirm Password </label>";
		echo "<input class='form-control' name='password_confirm' type='password' />";
		echo $newline;
	}

	echo "<label> First Name </label>";
	echo "<input class='form-control' name='firstname' type='text' placeholder='Juan' value='".(empty($_POST["firstname"])?"":$_POST["firstname"])."'/>";
	echo $newline;

	echo "<label> Middle Name </label>";
	echo "<input class='form-control' name='middlename' type='text' placeholder='Reyes' value='".(empty($_POST["middlename"])?"":$_POST["middlename"])."'/>";
	echo $newline;

	echo "<label> Last Name </label>";
	echo "<input class='form-control' name='lastname' type='text' placeholder='dela Cruz' value='".(empty($_POST["lastname"])?"":$_POST["lastname"])."'/>";
	echo $newline;

	echo "<label> Email Address </label>";
	echo "<input class='form-control' name='email' type='email' placeholder='juandelacruz@domain.com' value='".(empty($_POST["email"])?"":$_POST["email"])."'/>";
	echo $newline;


	echo "<label> Gender </label>";
	echo '<div>';
	echo '<input type="radio" name="gender" value="male" '.(empty($_POST["gender"])?"":$_POST["gender"] == "male"?"checked":"").'> Male<br>';
  	echo '<input type="radio" name="gender" value="female" '.(empty($_POST["gender"])?"":$_POST["gender"] == "female"?"checked":"").'> Female';
  	echo "</div>";
	echo $newline;

	echo '<hr class="divider">';
	echo '<h2 align=left>Additional Information</h2>';

	echo "<label> Occupation </label>";
	echo "<input class='form-control' name='occupation' type='text' placeholder='Professor' value='".(empty($_POST["occupation"])?"":$_POST["occupation"])."'/>";
	echo $newline;

	echo "<label> About </label>";
	echo '<textarea class="form-control" rows="5" id="comment" name="otherinfo" placeholder="Write something about you (e.g. degree, interests)" value="'.(empty($_POST["otherinfo"])?"":$_POST["otherinfo"]).'" ></textarea>';
	echo $newline;


	if($page == 'register'){
		echo '<button type="submit" class="btn btn-primary" name="btnRegister">Register</button> ';
	}
	else if($page == 'update')
		echo '<button type="submit" class="btn btn-primary" name="btnUpdate">Update</button> ';
	echo '<button type="submit" class="btn btn-default" formaction="index.php" name="btnCancel">Cancel</button>';
	echo $newline;

	echo "</form>";
	echo "<div class='clearfix'></div>";

?>