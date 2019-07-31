<?php 
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != 4)
{
	header('Location:logout.php');
	exit(0);
}
else
{
	include("includes/connect.php");
	$id = $_GET['id'];
	$sql = "DELETE FROM contact WHERE id = ".$id;
	mysqli_query($con, $sql);
	if(mysqli_affected_rows($con) > 0 )
	{
		setcookie('msg', "<div class='alert alert-success'>Data deleted successfully</div>",time()+3);
		header('Location:contact-us-list.php');
	}
	else
	{
		setcookie('msg', "<div class='alert alert-danger'>Data not deleted successfully</div>",time()+3);
		header('Location:contact-us-list.php');
	}
	mysqli_close($con);
}
?>
