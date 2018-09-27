<?php 
include("includes/header.php");
?>

<?php 
if(isset($_SESSION['loggedin']))
{
	?>
		<div class="container">
			<h1>Add Article</h1>
			<?php 
				if(isset($_COOKIE['success']))
				{
					echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
				}
			?>
			<?php 
				if(isset($_POST['submit']))
				{
					include("includes/connect.php");//$con
					$cat=$_POST['category'];
					$title=$_POST['title'];
					$desc=$_POST['description'];
					if(is_uploaded_file($_FILES['image']['tmp_name']))
					{
						$filename=$_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'],"news/$filename");
					}
					else
					{
						$filename="";
					}
					$ip=$_SERVER['REMOTE_ADDR'];
					
					mysqli_query($con,"insert into news(title,
					description,filename,category,date,ip)
					values('$title','$desc','$filename','$cat',
					NOW(),'$ip')");
					if(mysqli_affected_rows($con)>0)
					{
						setcookie("success","Article Added Successfully",time()+3);
						header("location:add_article.php");
						
					}
					else
					{
						echo "<p class='alert alert-danger'>Sorry! Unable to insert</p>";
					}
					
				}
			?>
			
			<p class="text-danger">All * fields are mandatory </p>
				<form action="" method="POST" 
				onsubmit="return newsValidation()"
				enctype="multipart/form-data">
					<div class="form-group">
						<label>Select Category <span class="text-danger">*</span> &nbsp;&nbsp;<span class="text-danger" id="cat_err"></span></label>
						<select onchange="handleError()" id="category" name="category" class="form-control">
							<option value="">--Select category--</option>
							<option value="Movies">Movies</option>
							<option value="Politics">Politics</option>
							<option value="Sports">Sports</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Enter Title *  <span class="text-danger" id="title_err"></span></label>
						<input onblur="hideError(this)" id="title" type="text" name="title" class="form-control">
					</div>
					
					<div class="form-group">
						<label>Enter Description *  <span class="text-danger" id="desc_err"></span></label>
						<textarea onblur="hideError(this)" id="desc" name="description" class="form-control" style="height:150px;"></textarea>
					</div>
					
					<div class="form-group">
						<label>Upload News Images</label>
						<input type="file" class="form-control" name="image">
					</div>
					
					<div class="form-group">
						
						<input type="Submit" name="submit" Value="Add Article" class="btn btn-primary">
					</div>
					
				</form>
			
		</div>
		
		<script>
			function newsValidation()
			{
				if(document.getElementById("category").value=="")
				{
					alert("Select Category");
					return false;
				}
				if(document.getElementById("title").value=="")
				{
					alert("Enter Title");
					return false;
				}
				if(document.getElementById("desc").value=="")
				{
					alert("Enter Description");
					return false;
				}
			}
		
			/*function newsValidation()
			{
				if(document.getElementById("category").value=="")
				{
					document.getElementById("cat_err").innerHTML="Category is Required!";
					document.getElementById("category").focus();
					return false;
				}
				if(document.getElementById("title").value=="")
				{
					document.getElementById("title_err").innerHTML="Title is Required!";
					document.getElementById("title").focus();
					return false;
				}
				if(document.getElementById("desc").value=="")
				{
					document.getElementById("desc_err").innerHTML="Description is Required!";
					document.getElementById("desc").focus();
					return false;
				}
			}
			
			function handleError(){
				if(document.getElementById("category").value!="")
				{
					document.getElementById("cat_err").innerHTML="";
				}
			}
			function hideError(ele)
			{
				if(ele.value !="")
				{
					document.getElementById(ele.id+"_err").innerHTML="";
				}
			}*/
		</script>
		
		
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