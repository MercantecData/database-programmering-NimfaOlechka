
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
				<input type="password" name="psw">
			</div>
			
			<div class="input">
				<label><b> Confirm Password:</b></label>
				<input type="password" name="cpsw">
			</div>

			<div class="input">
				<input type="Submit" name="register" class='btn' value="Add it!">
			</div>
			
			<p>

  				<a href="backup.php">I want save the World!</a>

  			</p>

			<div class="input">I am yours lost child!
				<input type="Submit" name="login" class='btn' value="Let Me In!"><a href="login.php"></a> 
			</div>
		</form>

	</body>
</html>