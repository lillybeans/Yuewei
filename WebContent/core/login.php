<?php 

header ('Content-Type: text/html; charset=utf-8');

include (dirname(__FILE__).'/functions/init.php'); //execute or run through init

$username=$_POST['username'];
$password=$_POST['password'];

	//Case #1: empty fields
	if (empty($username) == true || empty($password) == true)
	{
		$error = 'empty fields!';
	}
	
	//Case #2: username does not exist
	else if (user_exists($username) == false)
	{
		$error = "invalid username!";
		
	}
	
	
	//Case #2: username has not yet been activated
	else if (user_active($username) == false)
	{
		$error = 'inactive user';
	}
	
	//Case #3: process log-in
	else
	{
		$login = login($username, $password); //login returns either user_id OR false
		if ($login == false) //no user_id returned
		{
			$error = 'incorrect username/password combo';
		}
		else
		{
			//echo 'ok, it is ' .$login; //prints user id
			$_SESSION['user_id'] = $login; //start a session with the corresponding unique user_id which identifies the user when browsing the site
			header('Location: ../home.php'); //redirect to index.php
			exit();
		}
	}
	
	print_r($error); //prints any of the above errors
	
//idea for manual activation: create a function that edits the value of 'active' column, and make the administrator being able to click this

?>

