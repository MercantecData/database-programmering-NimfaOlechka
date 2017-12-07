<?php

session_start();



// variable declaration

$username = "";

$email    = "";

$errors = array(); 

$_SESSION['success'] = "";



// connect to database

$db = mysqli_connect('localhost', 'root', '', 'mydb');



// REGISTER USER

if (isset($_POST['register'])) {

  // receive all input values from the form

  $username = mysqli_real_escape_string($db, $_POST['uname']);

  $psw_1 = mysqli_real_escape_string($db, $_POST['psw']);

  $psw_2 = mysqli_real_escape_string($db, $_POST['cpsw']);



  // form validation: ensure that the form is correctly filled

  if (empty($username)) { array_push($errors, "Username is required"); }

  if (empty($psw_1)) { array_push($errors, "Password is required"); }

  if ($psw_1 != $psw_2) {

	array_push($errors, "The two passwords do not match");

  }



  // register user if there are no errors in the form

  if (count($errors) == 0) {

  	$password = md5($psw_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO `users`(`name`, `password`) VALUES ('$username','$password')";

  	mysqli_query($db, $query);

  	$_SESSION['username'] = $username;

  	$_SESSION['success'] = "You are nat home my child";

  	header('location: index.php');

  }



}



// LOGIN USER

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($db, $_POST['uname']);

  $password = mysqli_real_escape_string($db, $_POST['psw']);



  if (empty($username)) {

    array_push($errors, "Username is required");

  }

  if (empty($password)) {

    array_push($errors, "Password is required");

  }



  if (count($errors) == 0) {

    $password = md5($password);

    
    $query = "SELECT * FROM `users`WHERE `name`= '$username' AND `password`='$password'";
    //$query2 = "SELECT test.book, test.song FROM 'test' JOIN 'users' ON 'test.nameID'='users.id' WHERE `users.name`= '$username' AND `users.password`='$password'";

    $results = mysqli_query($db, $query);
    //$info=mysqli_query($db,$query2);

    if (mysqli_num_rows($results) == 1) {

      $_SESSION['username'] = $username;

      $_SESSION['success'] = "You are at home now my child";

      header('location: index.php');

    }else {

      array_push($errors, "Wrong username/password combination");

    }

  }

}


// BackUp DATABASE


if (isset($_POST['backup']))
{
    
  $connect = mysqli_connect('localhost', 'root', '', 'mydb');

  if($connect === false){
    die ("No connection").mysqli_connect_error();
  }

// select all from my database
  $query1 = "SELECT * FROM `users`";
  $result = mysqli_query($connect,$query1);

//push it to array
  $json_array= array();
  while($row = mysqli_fetch_assoc($result))
  {
    $json_array[] = $row;
  }

//encode into json format
  $json = json_encode($json_array);

//printing result of encoded file on the screen 
echo $json;

//saving into backup file
  file_put_contents("myDBBackUp.txt", $json);
}


?>