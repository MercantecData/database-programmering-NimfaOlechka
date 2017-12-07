<?php


//check of button was activated
if (isset($_POST['register']))
{
		$uname = $_POST['uname'];
		$pass1 = $_POST["psw"];
		

	$conn = mysqli_connect('localhost', 'root', '', 'mydb');

	if($conn === false){
		die ("No connection").mysqli_connect_error();
	}

	$query = "INSERT INTO `users`(`name`, `password`) VALUES ('$uname','$pass1')";

	$success= mysqli_query($conn,$query);

	if ($success)
		{
			echo "Great work!";
		}else
		{
			echo"Pain on you!"; 
		}

		mysqli_close($conn);
}

if (isset($_POST['backup']))
{
		
	$connect = mysqli_connect('localhost', 'root', '', 'mydb');

	if($connect === false){
		die ("No connection").mysqli_connect_error();
	}

	$query1 = "SELECT * FROM `users`";
	$result = mysqli_query($connect,$query1);


	$json_array= array();
	while($row = mysqli_fetch_assoc($result))
	{
		$json_array[] = $row;
	}

	$json = json_encode($json_array);

echo $json;

	file_put_contents("myDBBackUp.txt", $json);
}

if (isset($_POST['login'])){
	
$connect2 = mysqli_connect('localhost', 'root', '', 'mydb');

if($connect2 === false){
		die ("No connection").mysqli_connect_error();
	}

	$query2 = "SELECT * FROM `users` LEFT JOIN 'test' ON 'users.id'='test.nameID'";
	$result2 = mysqli_query($connect2,$query2);


}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>User Register Form</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<!--img src="wallpaper.jpg"-->
		<div class="header">
			<h2>Register</h2>
		</div>
		<form class="input_form" method="post" action="">
			<div class="input">
				<label><b>Name:</b></label>
					<input type="text" name="uname">
			</div>
			<div class="input">
				<label><b>Password:</b></label>
				<input type="text" name="psw">
			</div>
			
			<div class="input">
				<input type="Submit" name="register" class='btn' value="Add it!">
			</div>
			
			<div class="input">
				<input type="Submit" name="backup" class='btn' value="Save it!">
			</div>
			<div class="input">
				<input type="Submit" name="login" class='btn' value="Log Me In!">
			</div>
		</form>

	</body>
</html>