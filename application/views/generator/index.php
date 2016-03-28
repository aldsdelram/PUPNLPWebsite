// <?php 
// 	include("../public/mpdf/mpdf.php");

// 	$mpdf = new mPDF();


// 	$mpdf->WriteHTML('<h1> NLP TOOLS WEBSITE </h1><hr> 
// 		<h2> Polytechnic University of the Philippines </h2>
// 		<h2> NLP Special Interest Group </h2>
// 		<h2> Report </h2><hr>


// 		<p> Most Downloaded Tools: '.$most_name['name'].' ('.$most_id['total'].') </p>
// 		<p> Number of Tools: '.$tnum.' </p>
// 		<p> Number of all Downloads: '.$dnum.' </p>
// 		<p> Number of all Users: '.$unum.' </p>');



//     $mpdf->Output();  

	

// 

$name = '[REPORT]PUP_CCIS_NLP_'.$tool_name.'_'.$tool_year.'.pdf';

?>
<title>
	<?php echo $name ?>
 </title>

<?php
	include("../public/mpdf/mpdf.php");
	 
	$mpdf=new mPDF('c','A4','','' , 5 , 5 , 5 , 5 , 0 , 0); 
	 
	$mpdf->SetDisplayMode('fullpage');
	 
	$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list

	$stylesheet = file_get_contents('../public/stylesheets/report.css');
	$stylesheet .= file_get_contents('../public/stylesheets/bootstrap.css');
	$mpdf->WriteHTML($stylesheet,1);

	$mpdf->WriteHTML(file_get_contents(base_url("rpdf/".$id)),2);
	         
	$mpdf->Output($name,'D');
?>