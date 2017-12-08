
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Back Up</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		
		<div class="header">
			<h2> Register </h2>
		</div>
		<form class="input_form" method="post" action="backup.php">

			<?php include('errors.php'); ?>
			<div class="input">
				<input type="Submit" name="backup" class='btn' value="Save it!">
			</div>
		</form>
		<form class="input_form" method="post" action="restore.php">
			<div class="input">
				<input type="Submit" name="restore" class='btn' value="Back to roots!">
			</div>
		</form>
	</body>
</html>