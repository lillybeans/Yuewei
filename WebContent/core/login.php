<?php 

header ('Content-Type: text/html; charset=utf-8');

include (dirname(__FILE__).'/functions/init.php'); //execute or run through init

$username=$_POST['username'];
$password=$_POST['password'];

	//Case #1: empty fields
	if (empty($username) == true || empty($password) == true)
	{
		$error = '登录失败：有未填信息！<br>Error: Contains empty fields!';
	}
	
	//Case #2: username does not exist
	else if (user_exists($username) == false)
	{
		$error = "登录失败：用户无效！<br>Error: Invalid username!";
	}
	
	
	//Case #2: username has not yet been activated
	else if (user_active($username) == false)
	{
		$error = '登录失败：用户尚未激活！<br>Error: Inactive user!';
	}
	
	//Case #3: process log-in
	else
	{
		$login = login($username, $password); //login returns either user_id OR false
		if ($login == false) //no user_id returned
		{
			$error = '登录失败：错误用户或密码! <br>Error: Incorrect password!';
		}
		else
		{
			//echo 'ok, it is ' .$login; //prints user id
			//echo "success";
			$_SESSION['user_id'] = $login; //start a session with the corresponding unique user_id which identifies the user when browsing the site
			header('Location: ../home.php'); //redirect to index.php
			exit();
		}
	}
	
	print_r($error); //prints any of the above errors
	
//idea for manual activation: create a function that edits the value of 'active' column, and make the administrator being able to click this

?>

