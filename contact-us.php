<?php 
include("includes/header.php");
?>
<?php 
	if(isset($_POST['submit']))
	{
		include("includes/connect.php");
		$username 	= strip_tags(addslashes(trim($_POST['username'])));
		$email 		= strip_tags(addslashes(trim($_POST['email'])));
		$mobile 	= strip_tags(addslashes(trim($_POST['mobile'])));
		$message 	= strip_tags(addslashes(trim($_POST['message'])));

		$sql = "INSERT INTO contact(username, email, mobile, message) VALUES('$username', '$email', '$mobile', '$message')";
		mysqli_query($con, $sql);
		if(mysqli_affected_rows($con) > 0 )
		{
			setcookie('msg',"<div class='alert alert-success'>Thanks! We will meet you soon.</div>",time()+3);
			header('Location:contact-us.php');
		}
		else
		{
			setcookie('msg',"<div class='alert alert-danger'>Sorry! try again after sometime.</div>",time()+3);
			header('Location:contact-us.php');
		}
	}
 ?>
	<div class="container">
		<h1 class="text-center"><i>Contact Us</i></h1>
		<?php 
			if(isset($_COOKIE['msg'])): 
				echo $_COOKIE['msg'];
			endif;
		?>
		<form method="post" action="">
			<table class="table">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>
			        	<input type="text" name="username" class="form-control" placeholder="Enter Your Name" required>
			        </th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <th>Email Address</th>
			        <th>
			        	<input type="email" name="email" class="form-control" placeholder="Enter Email Address" required>
			        </th>
			      </tr>
			      <tr>
			        <th>Mobile Number</th>
			        <th>
			        	<input type="number" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
			        </th>
			      </tr>
			      <tr>
			        <th>Message</th>
			        <th>
			        	<textarea class="form-control" name="message" required placeholder="Enter Descriptions" rows="5" style="resize: none;"></textarea>
			        </th>
			      </tr>
			      <tr>
			      	<th></th>
			      	<th>
			      		<input type="submit" name="submit" value="Submit" class="btn btn-info">
			      	</th>
			      </tr>
			    </tbody>
		    </table>
		</form>
	</div>
<?php 
include("includes/footer.php");
?>