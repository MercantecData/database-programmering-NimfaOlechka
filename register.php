
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<title>User Register Form</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		
		<div class="header">
			<h2> Register </h2>
		</div>
		<form class="input_form" method="post" action="register.php">

			<?php include('errors.php'); ?>

			<div class="input">
				<label><b>Name:</b></label>
					<input type="text" name="uname">
			</div>

			<div class="input">
				<label><b>Password:</b></label>
				<input type="text" name="psw">
			</div>
			
			<div class="input">
				<label><b> Confirm Password:</b></label>
				<input type="text" name="cpsw">
			</div>

			<div class="input">
				<input type="Submit" name="register" class='btn' value="Add it!">
			</div>
			
			<div class="input">
				<input type="Submit" name="backup" class='btn' value="Save it!"><a href="backup.php">
			</div>

			<div class="input"> I am already registered!
				<input type="Submit" name="login" class='btn' value="Log Me In!"> <a href="login.php">
			</div>
		</form>

	</body>
</html>