<?php 
session_start();
include("includes/connect.php");
if(isset($_SESSION['loggedin']))
{
	if(isset($_GET['aid']))
	{
		$id=$_GET['aid'];
		mysqli_query($con,"delete from news where id=$id");
		if(mysqli_affected_rows($con)>0)
		{
			setcookie("success","Record Deleted Successfully",time()+3);
			header("Location:view_articles.php");
		}
		
	}
	else
	{
		header("Location:view_articles.php");
	}
}
else
{
	header("Location:login.php");
}
?>