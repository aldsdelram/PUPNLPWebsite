<?php

$newline = '<br />';

echo '<form method="post" onsubmit="" class="col-md-10 col-md-offset-1 col-xs-12">'."\n";

echo '<h1> Add Tools </h1>';

echo "<label class='form-label'> Title </label>\n";
	echo "<input class='form-control' name='title' type='text' placeholder='Title' value='".(empty($_POST["title"])?"":$_POST["title"])."'/>\n";
	echo $newline;

echo "<label> Abstract </label>";
	echo '<textarea class="form-control" rows="5" name="abstract" placeholder="Place Abstract here..." value="'.(empty($_POST["abstract"])?"":$_POST["abstract"]).'" ></textarea>';
	echo $newline;

echo "<label class='form-label'> Author/s </label>\n";
	echo "<input class='form-control' name='author' type='text' value='".(empty($_POST["author"])?"":$_POST["author"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> Year </label>\n";
	echo "<input class='form-control' name='year' type='text' value='".(empty($_POST["year"])?"":$_POST["year"])."'/>\n";
	echo $newline;

echo '<p align=left> <input type="file" name="fileToUpload" id="fileToUpload"></php>';
echo $newline;

echo "<button type='submit' class='btn btn-primary' name='btnUpload'>UPLOAD</button>";
echo '&nbsp &nbsp<button type="submit" class="btn btn-default" formaction="welcome" name="btnCancel">Cancel</button>';
echo $newline; echo $newline;


?>
