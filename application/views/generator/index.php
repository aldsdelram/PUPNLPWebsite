<?php 
	include("../public/mpdf/mpdf.php");

	$mpdf = new mPDF();


	$mpdf->WriteHTML('<h1> NLP TOOLS WEBSITE </h1><hr> 
		<h2> Polytechnic University of the Philippines </h2>
		<h2> NLP Special Interest Group </h2>
		<h2> Report </h2><hr>


		<p> Most Downloaded Tools: '.$most_name['name'].' ('.$most_id['total'].') </p>
		<p> Number of Tools: '.$tnum.' </p>
		<p> Number of all Downloads: '.$dnum.' </p>
		<p> Number of all Users: '.$unum.' </p>');



    $mpdf->Output();  

	

?>
