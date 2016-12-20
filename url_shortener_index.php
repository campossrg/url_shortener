<!DOCTYPE html>

<!-- ************** BOOTSTRAP ************** -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- **************************************** -->
<html>
	<head>
		<title>URL SHORTENER</title>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="includes\style.css">
		<!-- Awesome font -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- OpenSans font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<!-- Database connection && shortURL algorithm-->
		<?php 
			include "includes\\connection.php";
			include "includes\\shortURL.php";
		?> 
	</head>
	<body>
		<div id='dv_main'>
			<div id='dv_title'>
				<h1>THE LINK KNOWS ALL. SO CAN YOU.<br>
				<small>Measure your links with url shortener, the world's leading link management platform.</small>
				</h1>
				<form action="url_shortener_proccess.php" method="POST">
					<div class="input-group" id="dv_form">
					  <input type="text" class="form-control" placeholder="Paste your URL" name="txt_url" style="background-color: #5d5f60; color: #252626">
					  <span class="input-group-btn"><button class="btn btn-secondary" type="input" name="btn_submit">Shorten!</button></span>
					</div>
				</form>
			</div>
			<div id="dv_body">
				<div id="dv_content">
					<?php
						$sql = "SELECT * FROM table_url_hash ORDER BY url_id DESC";
						foreach ($conn->query($sql) as $row) {
							echo "<span><a href='http://". $row['url_name'] ."'>". $row['url_name'] ."</a></span><br>";
							echo "<span><a href='http://". $row['url_name'] ."'>". $row['url_hash'] ."</a></span><br><br>";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>