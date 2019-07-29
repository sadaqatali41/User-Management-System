<?php 
require("includes/header.php");

if(isset($_SESSION['loggedin']))
{
	require("includes/connect.php");//$con
	$lid=$_SESSION['loggedin'];
	$res=mysqli_query($con,"SELECT password FROM 
	register WHERE id=$lid");
	$row=mysqli_fetch_assoc($res);
	
	?>
		<div class="container">
			<h1>Change Password</h1>
			<?php if(isset($_COOKIE['msg']))
				echo $_COOKIE['msg']; ?>
				
			<?php 
			if(isset($_POST['submit']))
			{
				$opwd=md5($_POST['opwd']);
				$pwd=md5($_POST['pwd']);
				$cpwd=md5($_POST['cpwd']);
				if($opwd==$row['password'])
				{
					if($pwd==$cpwd)
					{
						mysqli_query($con,"UPDATE register SET 
						password='$pwd' WHERE id=$lid");
						if(mysqli_affected_rows($con)>0)
						{
							setcookie('msg',"<p class='alert alert-success'>
							Passwords Changed Successfully</p>",time()+4);
							header('Location:change_pwd.php');
						}
					}
					else
					{
						setcookie('msg',"<p class='alert alert-danger'>
						New Password and Confirm New 
						Password Does not match</p>",time()+4);
						header('Location:change_pwd.php');
					}
				}
				else
				{
					setcookie('msg',"<p class='alert alert-danger'>
					Old Password Does not match with DB </p>",time()+4);
					header('Location:change_pwd.php');
				}
				
			}
			?>
			
			<form method="POST" action="" 
				onsubmit="return validate()">
				<table class="table">
					
					<tr>
						<td><label>Old Password</label></td>
						<td><input type="password" name="opwd" 
						id="opwd" class="form-control" placeholder="Enter Old Password"></td>
					</tr>
					<tr>
						<td><label>New Password</label></td>
						<td><input type="password" name="pwd" 
						id="pwd" class="form-control" placeholder="Enter New Password"></td>
					</tr>
					<tr>
						<td><label>Confirm New Password</label></td>
						<td><input type="password" name="cpwd" 
						id="cpwd" class="form-control" placeholder="Enter Confirm Password"></td>
					</tr>
			
					<tr>
						<td></td>
						<td><input type="submit" name="submit" 
						value="Update" class="btn btn-primary"></td>
					</tr>
				</table>
			</form>
		</div>
	<?php
}
else
{
	header("Location:login.php");
}

?>

<?php 
require("includes/footer.php");
?>