<!DOCTYPE HTML>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="NLP Group">

<link rel="stylesheet" href="/public/stylesheets/bootstrap.css">
<link rel="stylesheet" href="/public/stylesheets/report.css">

<header>

	<table style="width:100%;">
		<tr style="background: #ddd">
			<td style="border-bottom: 1mm solid #800;" width="10%">
				<img src="/public/img/pup.png" class="logo">
			</td>
			<td style="border-bottom: 1mm solid #800;">
				<h1 class="title" style="font-family: Impact"> PUP-CCIS-NLP</h1>
				<h4 class="title4" style="font-family: Impact"> Tool report</h4>
			</td>

		</tr>
	</table>

	<h1 style="margin-bottom: 0; float:left"> <?php echo $tool_name; ?></h1>
	<hr style="margin:0; margin-bottom: 5px;">
	<h5 style="margin:0; margin-bottom: 5px;"> AUTHORS: <?php echo $tool_authors ?> / YEAR: <?php echo $tool_year ?></h5>

	<div style="float:left;  width:48%; padding:5px; text-align: justify;">
		<?php echo $tool_abstract; ?>
	</div>


	<div style="float:left; width:48%; padding:5px;">
		<div style="font-size: 10px; font-style: italic; text-align: right;">DATE: <?php echo $date?></div>

					<table style="width:100%; height:100%;"class="weekly_report">
						<tr style="width:100%;" >
							<td style="width:80%; border-bottom: 2px solid #ccc;">This Week's Downloads</td>
							<td style="width:20%; border-bottom: 2px solid #ccc; text-align: right;"><?php echo $weekly_dl; ?></td>
						</tr>
						<tr>
							<td style="width:80%; border-bottom: 2px solid #ccc;">Total Downloads</td>
							<td style="width:20%; border-bottom: 2px solid #ccc; text-align: right;"><?php echo $total_dl; ?></td>
						</tr>
						<tr>
							<td style="width:80%; border-bottom: 2px solid #ccc;">This Week's Views</td>
							<td style="width:20%; border-bottom: 2px solid #ccc; text-align: right;"><?php echo $weekly_vw; ?></td>
						</tr>
						<tr>
							<td style="width:80%; border-bottom: 2px solid #ccc;">Total Views</td>
							<td style="width:20%; border-bottom: 2px solid #ccc; text-align: right;"><?php echo $total_vw; ?></td>
						</tr>
					</table>

					<h3> List of users who downloaded this tool </h3>
					<ul>
						<?php
							if ($users->num_rows() > 0)
							{
								foreach ($users->result() as $row)
								{
									$user_info = $this->Users_Model->find_info($row->user_id);

									$name = $user_info['first_name'].' '.$user_info['last_name'];
									$occupation = $user_info['occupation'];

									echo '<li>'.$name.' ('.$occupation.') </li>';
								}
							}
							else{
								echo '<h4>Nothing to Show</h4>';
							}
						?>
					</ul>
	</div>
</header>