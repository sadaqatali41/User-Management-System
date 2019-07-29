
<?php
include("includes/header.php");
 ?>
	
	
      <div class="container">
		
		<?PHP 
			
			//4
			//4.1= Connect to DB
				include("includes/connect.php");//$con
				
			if(isset($_POST['submit']))
			{
			//4.2= Reading form data
				$name=$_POST['uname'];
				$email=$_POST['email'];
				$pass=md5($_POST['pwd']);
				$mobile=$_POST['mobile'];
				$gender=$_POST['gender'];
				$city=$_POST['city'];
				$state=$_POST['state'];
				$address=$_POST['address'];
				$terms=$_POST['terms'];
				$ip=$_SERVER['REMOTE_ADDR'];
			//4.3=Insert Data into DB(Before insert create table)
			mysqli_query($con,"insert into register(username,
			email,password,mobile,
			gender,city,state,address,terms,date_of_reg,ip) 
			values('$name','$email','$pass','$mobile',
			'$gender','$city','$state','$address',
			'$terms',NOW(),'$ip')");
			if(mysqli_affected_rows($con)>0)
			{
				//5.send an Email to the registred user
				$id=base64_encode($email);
				$subject="Account Activation";
				$message="Hello ".$name.",<br><br>
				Thanks your account created successfully
				your details are:<br><br>Username:Yourmail
				<br>Password:".$_POST['pwd']."<br><br>To get
				access with our website pease activate your 
				account<br><br>
				<a target='_blank' 
				href='http://localhost:8080/jan/activate.php?kid=".$id."'>Activate Now</a>
				<br><br>Thanks<br>GoPHP";
				$headers="Content-Type:text/html".'\r\n'.
				"From:Info<info@gophp.in>";
				//echo $message."<br>";
				if(mail($email,$subject,$message,$headers))
				{
					setcookie('msg',"<p>Account Created Successfully, 
					Please Activate your Account</p>",time()+4);
					header('Location:register.php');
				}
				else
				{
					setcookie('msg',"Sorry! Network Error. 
					Unable to send Actvation link.
					Please contact Admin",time()+4);
					header('Location:register.php');
				}
			}
			else
			{
				setcookie('msg',"<p>Sorry! Unable to Insert</p>:-".mysqli_error($con),time()+4);
				header('Location:register.php');
			}
			
			}//end of form handling
			?>
	  
	  
        <h1 class="text-center"><i>Registration Form</i></h1>
        <?php if(isset($_COOKIE['msg']))
				echo $_COOKIE['msg']; ?>
		<form method="POST" action="" onsubmit="return validate()">
				<table class="table">
					<tr>
						<td><label>Username</label></td>
						<td><input type="text" name="uname" 
						id="uname" class="form-control" placeholder="Enter Username"></td>
					</tr>
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
						<td><label>Confirm Password</label></td>
						<td><input type="password" name="cpwd" 
						id="cpwd" class="form-control" placeholder="Enter Confirm Password"></td>
					</tr>
					<tr>
						<td><label>Mobile</label></td>
						<td><input type="text" name="mobile" 
						id="mobile" class="form-control" placeholder="Enter Mobile Number"></td>
					</tr>
					<tr>
						<td><label>Gender</label></td>
						<td>
							<label><input type="radio" name="gender"
							value="Male"> Male</label>
							<label><input type="radio" name="gender" 
							value="Female"> Female</label>
						</td>
					</tr>
					<tr>
						<td><label>City</label></td>
						<td><input class="form-control" type="text" name="city" placeholder="Enter City"></td>
					</tr>
					<tr>
						<td><label>State</label></td>
						<td><select name="state" class="form-control">
							<option value="">--Select State--</option>
							<option value="Andhrapradesh">Andhrapradesh</option>
							<option value="Telangana">Telangana</option>
							<option value="Maharastra">Maharastra</option>
							<option value="Tamilnadu">Tamilnadu</option>
						</select></td>
					</tr>
					<tr>
						<td><label>Address</label></td>
						<td><textarea class="form-control" name="address" placeholder="Enter Address"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><label><input type="checkbox" 
						name="terms" value="1"> PLease Accept 
						<a href='#'>Terms and Conditions</a></label></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" 
						value="Register" class="btn btn-primary"></td>
					</tr>
				</table>
			</form>
      </div>
  
  <script>
			function validate()
			{
		
				if(document.getElementById("uname").value=="")
				{
					alert("Enter Username");
					return false;
				}
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
				if(document.getElementById("cpwd").value=="")
				{
					alert("Enter Confirm Password");
					return false;
				}
				if(document.getElementById("pwd").value 
				!= document.getElementById("cpwd").value)
				{
					alert("Passwords Does not Match");
					return false;
				}
				//Mobile Validation
				if(document.getElementById("mobile").value=="")
				{
					alert("Please Enter Mobile");
					return false;
				}
				else
				{
					var mob=document.getElementById("mobile").value;
					if(mob.length==10)
					{
						if(isNaN(mob))
						{
							alert("Enter Valid Mobile Number");
							return false;
						}
					}
					else
					{
						alert("Enter 10 Digits Mobile NUmber");
						return false;
					}
				}
			}
		</script>
  
<?php
include("includes/footer.php");
 ?>
   
