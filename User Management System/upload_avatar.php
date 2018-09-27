<?php 
include("includes/header.php");
?>

<?php 
if(isset($_SESSION['loggedin']))
{
	include("includes/connect.php");
	$lid=$_SESSION['loggedin'];
	?>
		<div class="container">
			<h1>Upload Profile Pic</h1>
			<?php
		if(isset($_POST['register']))
		{
			
			
			//file data
			$filename=$_FILES["image"]["name"];
			$size=$_FILES["image"]["size"];
			$type=$_FILES["image"]["type"];
			$tmpname=$_FILES["image"]["tmp_name"];
			
				$ext=substr($filename,strpos($filename,"."));
				$str="abcdefghijklmonpqrstuvwxyz1234567890";
				$fname=
			substr(str_shuffle($str),5,10)."_".time().$ext;
			
			$allowed_type=array(
				"image/jpeg",
				"image/jpg",
				"image/png",
				"image/gif"
				);
			
			if(in_array($type,$allowed_type))
			{
				if(move_uploaded_file($tmpname,
										"avatars/$fname"))
				{
					mysqli_query($con,"update register set
					profile_pic='$fname' where id=$lid");
					if(mysqli_affected_rows($con)>0)
					{
						echo "File Uploaded Successfully";	
					}
					else
					{
						echo "Sorry! Unable to Upload";
					}
					
				}
			
			}
			else
			{
				echo "Please Upload a valid Image";
			}
		}
		?>
		
		
		<form action="" method="POST" 
		enctype="multipart/form-data">
			<table class='table'>
				
				<tr>
					<td>Choose your Profile Pic</td>
					<td><input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" 
					name="register" 
value="Upload" class='btn btn-primary'></td>
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