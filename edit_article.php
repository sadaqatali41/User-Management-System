<?php 
include("includes/header.php");
include("includes/connect.php");
?>
	<?php 
		if(isset($_SESSION['loggedin']))
		{
			if(isset($_GET['aid']))
			{
				$id=$_GET['aid'];
				$res=mysqli_query($con,"SELECT * FROM news WHERE id=$id");
				$row=mysqli_fetch_assoc($res);
			}
			else
			{
				exit("Sorry! You are in wrong WIndow");
			}
			?>
			<?php 
			if(mysqli_num_rows($res)>0)
			{
			?>
				<div class='container'>
					<h1>Edit Article</h1>
					
					<?php 
					if(isset($_COOKIE['error']))
					{
						echo "<div class='alert alert-danger'>".$_COOKIE['error']."</div>";
					}
					if(isset($_COOKIE['success']))
					{
						echo "<div class='alert alert-success'>".$_COOKIE['success']."</div>";
					}
					?>
					
					
					<?php 
					if(isset($_POST['submit']))
					{
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
							$filename=$row['filename'];
						}
						
						mysqli_query($con,"update news set
						category='$cat',
						title='$title',
						description='$desc',
						filename='$filename'
						 where id=$id");
						 if(mysqli_affected_rows($con)>0)
						 {
							setcookie("success","Article updated Successfully",time()+3); 
							header("Location:edit_article.php?aid=$id");
						 }
						 else
						 {
							setcookie("error","Sorry! Unable to Update",time()+3); 
							header("Location:edit_article.php?aid=$id"); 
						 }
					}
					?>
					
					
					<form action="" method="POST" 
				onsubmit="return newsValidation()"
				enctype="multipart/form-data">
					<div class="form-group">
						<label>Select Category <span class="text-danger">*</span> &nbsp;&nbsp;<span class="text-danger" id="cat_err"></span></label>
						<select onchange="handleError()" id="category" name="category" class="form-control">
							<option value="">--Select category--</option>
							<option value="Movies" <?php if($row['category']=="Movies") echo "selected" ?>>Movies</option>
							<option value="Politics" <?php if($row['category']=="Politics") echo "selected" ?>>Politics</option>
							<option value="Sports" <?php if($row['category']=="Sports") echo "selected" ?>>Sports</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Enter Title *  <span class="text-danger" id="title_err"></span></label>
						<input value="<?php echo $row['title'];?>" onblur="hideError(this)" id="title" type="text" name="title" class="form-control" placeholder="Enter Article Title">
					</div>
					
					<div class="form-group">
						<label>Enter Description *  <span class="text-danger" id="desc_err"></span></label>
						<textarea onblur="hideError(this)" id="desc" name="description" class="form-control" style="height:150px;" placeholder="Enter Description"><?php echo $row['description']?></textarea>
					</div>
					
					<div class="form-group">
						<label>Upload News Images</label>
						<input type="file" class="form-control" name="image">
						<br>
						<?php if($row['filename']!=""){?>
						<Img src="news/<?php echo $row['filename']?>" height="100" width="100">
						<?php }?>
					</div>
					
					<div class="form-group">
						
						<input type="Submit" name="submit" Value="Update Article" class="btn btn-primary">
					</div>
					
				</form>
				</div>
			<?php
			}
			else
			{
				?>
					<div class="container">
						<h1>Sorry! This Article was not Found<h1>
					</div>
				<?php
			}
		}
		else
		{
			header("Location:login.php");
		}
	?>
<?php 
include("includes/footer.php");
?>