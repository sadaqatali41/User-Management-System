<?php 
session_start();
include("includes/connect.php");
if(isset($_SESSION['loggedin']))
{
	if(isset($_GET['aid']))
	{
		$id=$_GET['aid'];
		$res=mysqli_query($con,"select status from news where id=$id");
		if(mysqli_num_rows($res)>0)
		{
			$row=mysqli_fetch_assoc($res);
			if($row['status']==1)
			{
				$s=0;
			}
			else
			{
				$s=1;
			}
			mysqli_query($con,"update news set
			status=$s where id=$id");
			if(mysqli_affected_rows($con)>0)
			{
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
		header("Location:view_articles.php");
	}
}
else
{
	header("Location:login.php");
}
?>