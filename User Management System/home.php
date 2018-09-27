<?php 
include("includes/header.php");

if(isset($_SESSION['loggedin']))
{
	include("includes/connect.php");
	$lid=$_SESSION['loggedin'];
	$res=mysqli_query($con,"select *from register 
	where id=$lid");
	$row=mysqli_fetch_assoc($res);
	//print_r($row);
	?>
		<div class="container">
			<h1>Welcome to 
			<?php echo ucwords($row['username']);?></h1>
			<?php 
			if($row['profile_pic']!="")
			{
			?>
				<img src="avatars/
				<?php echo $row['profile_pic']?>" 
				height="100" width="100"><br><br>
			<?php 
			}
			?>
			<table class="table">
				<tr>
					<td>Username</td>
					<td><?php echo $row['username']?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $row['email']?></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><?php echo $row['mobile']?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $row['address']?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo $row['city']?></td>
				</tr>
				<tr>
					<td>Satae</td>
					<td><?php echo $row['state']?></td>
				</tr>
			</table>
		</div>
	<?php
}
else
{
	header("location:login.php");
}


?>


<?php 
include("includes/footer.php");
?>