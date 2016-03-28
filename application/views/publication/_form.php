<?php

$newline = '<br />';

echo '<form method="post" onsubmit="" class="col-md-10 col-md-offset-1 col-xs-12">'."\n";

echo '<h1> Add Publication Details </h1>';

echo "<label class='form-label'> Title </label>\n";
	echo "<input class='form-control' name='title' type='text' placeholder='Title' value='".(empty($_POST["title"])?"":$_POST["title"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> Author/s </label>\n";
	echo "<input class='form-control' name='author' type='text' value='".(empty($_POST["author"])?"":$_POST["author"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> Year of Publication </label>\n";
	echo "<input class='form-control' name='year' type='text' value='".(empty($_POST["year"])?"":$_POST["year"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> URL </label>\n";
	echo "<input class='form-control' name='url' type='text' placeholder='https://www.researchgate.net' value='".(empty($_POST["url"])?"":$_POST["url"])."'/>\n";
	echo $newline;

echo '<button type="submit" class="btn btn-primary" name="btnAdd">Add</button> ';

echo '<button type="submit" class="btn btn-default" formaction="tools.php" name="btnCancel">Cancel</button> ';



// 
?>