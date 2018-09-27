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
								$_SESSION['loggedin']=$row['id'];
								header("Location:home.php");
							}
							else
							{
								echo "<p class='alert alert-warning'>Please Acivate Your Account</p>";
							}
						}
						else
						{
							echo "<p class='alert alert-danger'>Password Does not Match</p>";
						}
					}
					else
					{
						echo "<p class='alert alert-danger'>Sorry! Email Does not Exists</p>";
					}
					
				}
			?>
	
		<h1>Login Here</h1>
		<form action="" method="POST" 
			onsubmit="return loginValidate()">
				<table class="table">
					<tr>
						<td><label>Email</label></td>
						<td><input type="text" name="email" 
						id="email" class="form-control"></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="pwd" 
						id="pwd" class="form-control"></td>
					</tr>
					<tr>
						<td></td>
						<td><input class="btn btn-primary" type="submit" name="submit" 
						value="Login">
							<a href=''>Forgot Password?</a>
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