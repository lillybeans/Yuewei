<?php 

session_start(); //before we terminate the session, we must start the session
session_destroy(); //end session
header('Location: ../home.php'); //redirect to home page

?>