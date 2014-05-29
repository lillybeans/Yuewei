<?php 

header ('Content-Type: text/html; charset=UTF-8');

function user_exists($username){
	//$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'") or die (MySQL_error()); //sql translation: return the number of rows satisfying the condition/query, from the table 'users', looking through column 'user_id'. If returns 0, no matching user
	return (mysql_result($query,0) == 1) ? true : false; //return (expression), if expression is true, return true, otherwise return false
}

function user_active($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1") or die (MySQL_error());
	return (mysql_result($query,0) == 1) ? true: false;
}

//returns user id given username, user id essentially functions like the index of an array and NOT the content
function get_user_id_from_username($username){
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username`='$username'"),0); //this will return the corresponding user_id of the user found
}


function login($username, $password){
	$user_id=get_user_id_from_username($username);
	$username = sanitize($username);
	$password=md5($password); //since it was encrypted
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"),0) == 1)? $user_id : false; //if true, return $user_id, otherwise return false
}

//returns whether or not user is logged in
function logged_in() 
{
	return (isset($_SESSION['user_id'])) ? true: false;
}


?>