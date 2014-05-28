<?php 

header ('Content-Type: text/html; charset=utf-8');

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

//returns user id given username
function get_user_id_from_username($username){
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username`='$username'"),0,'user_id'); //the 'user_id' part specifies which FIELD (i.e.column) from the entire row that satisfies the query to retrieve
}

function login($username, $password){
	$user_id=get_user_id_from_username($username);
	$username = sanitize($username);
	$password=md5($password); //since it was encrypted
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"),0) == 1)? $user_id : false; //if true, return $user_id, otherwise return false
}

?>