<?php 
include("includes/header.php");
?>

	<div class="container">
	
	<?php 
				if(isset($_POST['submit']))
				{
					include("includes/connect.php");//$con
					$email=$_POST['email'];
					$pwd=md5($_POST['pwd']);
					//check email in DB
					$res=mysqli_query($con,"select *from
					register where email='$email'");
					if(mysqli_num_rows($res)==1)
					{
						$row=mysqli_fetch_assoc($res);
						
						if($row['password']==$pwd)
						{
							if($row['status']==1)
							{
								$_SESSION['loggedin']		= $row['id'];
								$_SESSION['profile_pic']	= $row['profile_pic'];
								header("Location:home.php");
							}
							else
							{
								setcookie('smg',"<p class='alert alert-warning'>Please Acivate Your Account</p>",time()+3);
								header('Location:login.php');
							}
						}
						else
						{
							setcookie('smg',"<p class='alert alert-danger'>Password Does not Match</p>",time()+3);
							header('Location:login.php');
						}
					}
					else
					{
						setcookie('smg',"<p class='alert alert-danger'>Sorry! Email Does not Exists</p>",time()+3);
						header('Location:login.php');
					}
					
				}
			?>
	
		<h1 class="text-center"><i>Login Form</i></h1>
		<?php if(isset($_COOKIE['smg']))
				echo $_COOKIE['smg']; ?>

		<form action="" method="POST" 
			onsubmit="return loginValidate()">
				<table class="table">
					<tr>
						<td><label>Email</label></td>
						<td><input type="text" name="email" 
						id="email" class="form-control" placeholder="Enter Email Address"></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="pwd" 
						id="pwd" class="form-control" placeholder="Enter Password"></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="btn btn-primary" type="submit" name="submit" 
						value="Login">
							<a href='javascript:void(0)'>Forgot Password?</a>
						</td>
					</tr>
				</table>
			</form>
	</div>
<script>
		//Stpe3
			function loginValidate()
			{
				if(document.getElementById("email").value=="")
				{
					alert("Enter Email");
					return false;
				}
				if(document.getElementById("pwd").value=="")
				{
					alert("Enter Password");
					return false;
				}
			}
		</script>
<?php 
include("includes/footer.php");
?>