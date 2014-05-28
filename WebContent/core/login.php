<?php 

header ('Content-Type: text/html; charset=utf-8');

include (dirname(__FILE__).'/functions/init.php'); //execute or run through init

$username=$_POST['username'];
$password=$_POST['password'];


//$Lilly = get_Lilly();
//echo $Lilly;
//echo ' - did you see it?';

	//Case #1: username does not exist
	if (user_exists($username) == false)
	{
		$errors[] = "invalid username";
	}
	
	
	//Case #2: username has not yet been activated
	else if (user_active($username) == false)
	{
		$errors[] = "account not yet activated";
	}
	
	//Case #3: process log-in
	else
	{
		$login = login($username, $password);
		if ($login == false) //no user_id returned
		{
			$errors[] = "invalid username/password combination";
		}
		else
		{
			echo 'ok, it is ' .$login; //prints user id
		}
	}
	
	print_r($errors); //prints any of the above errors
	
//idea for manual activation: create a function that edits the value of 'active' column, and make the administrator being able to click this

?>

