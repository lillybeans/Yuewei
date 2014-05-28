<?php 

$connect_error = 'Sorry, we are experiencing downtime.'; //custom error message
error_reporting(0); //turns off default error reporting, but your custum error in "die" still works

mysql_connect('localhost', 'root', '930723lt') or die ($connect_error); //connect to server: server name, user, password
mysql_select_db('Database'); //'Database' is the name of the database I am selecting from

?>