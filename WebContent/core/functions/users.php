<?php 

function user_exists($username){
	$query = mysql_query("SELECT COUNT('user_id') FROM 'users' WHERE 'username' = '$username'"); //sql translation: return the id of the user with that username, from the table 'users', looking through column 'user_id'
}

?>