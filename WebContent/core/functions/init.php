<?php 
session_start();

require (dirname(__FILE__).'/../database/connect.php'); //what require does: similar to include but stops executing if error occurs, essentially inserts content from the specified file to shorten code.
require (dirname(__FILE__).'/general.php');
require (dirname(__FILE__).'/users.php');

?>