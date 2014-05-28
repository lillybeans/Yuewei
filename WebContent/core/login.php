<?php 

include (dirname(__FILE__).'/functions/init.php');

$username=$_POST['username'];
$password=$_POST['password'];

echo "$username \n $password";

if (user_exists($username) == false)
{
	$error[] = "invalid username";
}
?>