<?php

$newline = '<br />';

echo '<form method="post" onsubmit="" class="col-md-10 col-md-offset-1 col-xs-12" enctype="multipart/form-data">'."\n";

if($page == 'upload')
	echo '<h1> Add Tool </h1>';
else if($page == 'update'){
	echo '<h1> Update Tool </h1>';
}


echo "<label class='form-label'> Title </label>\n";
	echo "<input class='form-control' name='title' type='text' placeholder='Title' value='".(empty($_POST["title"])?"":$_POST["title"])."'/>\n";
	echo $newline;

echo "<label> Abstract </label>";
	echo "<input class='form-control' name='abstract' type='text' value='".(empty($_POST["abstract"])?"":$_POST["abstract"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> Author/s </label>\n";
	echo "<input class='form-control' name='author' type='text' value='".(empty($_POST["author"])?"":$_POST["author"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> Year </label>\n";
	echo "<input class='form-control' name='year' type='text' value='".(empty($_POST["year"])?"":$_POST["year"])."'/>\n";
	echo $newline;

echo "<label class='form-label'> Version </label>\n";
	echo "<input class='form-control' name='version' type='text' placeholder='v1.0' value='".(empty($_POST["version"])?"":$_POST["version"])."'/>\n";
	echo $newline;

echo '<p align=left> <input type="file" name="fileToUpload" id="fileToUpload"></php>';
echo $newline;

if($page == 'upload'){
		echo '<button type="submit" class="btn btn-primary" name="btnUpload">Upload</button> ';
	}
else if($page == 'update'){
	echo '<button type="submit" class="btn btn-primary" name="btnUpdate">Update</button> ';
	
}

echo '<button type="submit" class="btn btn-default" formaction="'.base_url('tools').'" name="btnCancel">Cancel</button> ';





// 
?>