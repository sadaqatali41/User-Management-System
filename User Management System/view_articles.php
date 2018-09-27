<?php
include("includes/header.php");
 ?>
 
 <?php 
 if(isset($_SESSION['loggedin']))
 {
	 include("includes/connect.php");
	 $result=mysqli_query($con,"select *from news");
	 if(mysqli_num_rows($result)>0)
	 {
		 ?>
		<div class="container">
			<h1>View Articles</h1>
			<?php 
			if(isset($_COOKIE['success']))
			{
				echo "<div class='alert alert-success'>".$_COOKIE['success']."</div>";
			}
			?>
			
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Tite</th>
					<th>Description</th>
					<th>Category</th>
					<th>Image</th>
					<th>Date Posted</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php 
				while($row=mysqli_fetch_assoc($result))
				{
				?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['title'];?></td>
					<td><?php echo $row['description'];?></td>
					<td><?php echo $row['category'];?></td>
					<td>
						<?php if($row['filename']!=""){?>
						<img src="news/<?php echo $row['filename']?>" height="50" width="50">
						<?php 
						}
						
						?>
					</td>
					<td><?php echo $row['date'];?></td>
					<td><?php echo $row['status'];?></td>
					<td>
						<a href="edit_article.php?aid=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
						<a href="javascript:void(0)" onclick="deleteArticle(<?php echo $row['id'];?>)" class="btn btn-danger">Delete</a>
						<?php 
						if($row['status']==1)
						{
						?>
						<a href="hideshow.php?aid=<?php echo $row['id']?>" class='btn btn-warning'>Hide</a>
						<?php 
						}
						else
						{

							?>
							<a href="hideshow.php?aid=<?php echo $row['id']?>" class="btn btn-success">Show</a>
							<?php							
						}
						?>
					</td>
					
				</tr>
				<?php 
				}
				?>
			</table>
		</div>
	 <?php
	 }
	 else
	 {
		 echo "<div class='container'>
			<p>Sorry! NO News articles Found.PLease <a href='add_article.php'>Add New Articles</a></p>
		 </div>";
	 }
 }
 else
 {
	 header("Location:login.php");
 }
 ?>
 <script>
 function deleteArticle(id)
 {
	var con=confirm("Do you want to delete a Record");
	if(con==true)
	{
		window.location="delete_article.php?aid="+id;
	}
 }
 </script>
 
 <?php
include("includes/footer.php");
 ?>