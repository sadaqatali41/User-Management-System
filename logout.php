<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	session_destroy();
	header("Location:login.php");
}
else
{
	header("Location:login.php");
}

?>