<?php 
include("includes/header.php");

if(isset($_SESSION['loggedin']))
{
	include("includes/connect.php");
	$lid=$_SESSION['loggedin'];
	$res=mysqli_query($con,"select username,mobile,
	city,state,address 
	from register where id=$lid");
	$row=mysqli_fetch_assoc($res);
	
	?>
		<div class="container">
			<h1>Edit Profile</h1>
			
			<?php 
			if(isset($_GET['status']))
			{
				echo "<p class='alert alert-success'>
				Profile Updated Successfully</p>";
			}
			
			
			if(isset($_POST['submit']))
			{
				$name=$_POST['uname'];
				$mobile=$_POST['mobile'];
				$city=$_POST['city'];
				$state=$_POST['state'];
				$address=$_POST['address'];
				mysqli_query($con,"update register set 
				username='$name',
				mobile='$mobile',
				city='$city',
				state='$state',
				address='$address' where id=$lid");
				if(mysqli_affected_rows($con)>0)
				{
					header("location:edit.php?status=1");
				}
				else
				{
					echo mysqli_error($con);
					echo "<p class='alert alert-danger'>
					Sorry! Unable to Update or 
					Nothing Modified</p>";
				}
			}
			?>
			
			<form method="POST" action="" 
				onsubmit="return validate()">
				<table class="table">
					<tr>
						<td><label>Username</label></td>
						<td><input type="text" name="uname" 
						id="uname" class="form-control" 
						value="<?php echo $row['username']?>"></td>
					</tr>
					
					<tr>
						<td><label>Mobile</label></td>
						<td><input type="text" name="mobile" 
						id="mobile" class="form-control"
						value="<?php echo $row['mobile']?>"></td>
					</tr>
					
					<tr>
						<td><label>City</label></td>
						<td><input class="form-control" type="text" 
						name="city" 
						value="<?php echo $row['city']?>"></td>
					</tr>
					<tr>
						<td><label>State</label></td>
						<td><select name="state" class="form-control">
							<option value="">--Select State--</option>
							<option value="Andhrapradesh" 
							<?php if($row['state']=="Andhrapradesh")
								echo "selected"?>>Andhrapradesh</option>
							<option value="Telangana" <?php if($row['state']=="Telangana") echo "selected"?>>Telangana</option>
							<option value="Maharastra" <?php if($row['state']=="Maharastra") echo "selected"?>>Maharastra</option>
							<option value="Tamilnadu" <?php if($row['state']=="Tamilnadu") echo "selected"?>>Tamilnadu</option>
						</select></td>
					</tr>
					<tr>
						<td><label>Address</label></td>
						<td>
						<textarea class="form-control" 
						name="address"><?php echo $row['address'] ?></textarea></td>
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
include("includes/footer.php");
?>