<?php
include("includes/header.php");
 ?>
 
 <?php 
 if(isset($_SESSION['loggedin']))
 {
	 include("includes/connect.php");
	 //$userid = $_SESSION['loggedin'];
	 $result = mysqli_query($con,"SELECT * FROM news");
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
					<th>Serial No.</th>
					<th width="20%">Tite</th>
					<th width="35%">Description</th>
					<th>Category</th>
					<th>Image</th>
					<th>Date Posted</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php 
				$counter = 1;
				while($row=mysqli_fetch_assoc($result))
				{
				?>
				<tr>
					<td><?php echo $counter++;?></td>
					<td><?php echo $row['title'];?></td>
					<td style="text-align:justify;"><?php echo $row['description'];?></td>
					<td><?php echo $row['category'];?></td>
					<td>
						<?php if($row['filename']!=""){?>
						<img src="news/<?php echo $row['filename']?>" height="100" width="100" style="cursor: pointer;">
						<?php 
						}
						
						?>
					</td>
					<td><?php echo $row['date'];?></td>
					<td><?php echo $row['status'];?></td>
					<td>
						<div class="btn-group">
							<a href="edit_article.php?aid=<?php echo $row['id']?>" class="btn btn-primary btn-xs">Edit</a>
							<a href="javascript:void(0)" onclick="deleteArticle(<?php echo $row['id'];?>)" class="btn btn-danger">Delete</a>
							<?php 
							if($row['status']==1)
							{
							?>
							<a href="hideshow.php?aid=<?php echo $row['id']?>" class='btn btn-success btn-xs'>Active</a>
							<?php 
							}
							else
							{
								?>
								<a href="hideshow.php?aid=<?php echo $row['id']?>" class="btn btn-warning btn-xs">In-Active</a>
								<?php							
							}
							?>
						</div>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>
        	<img src="" id="preview_image" height="100%" width="100%" class="img-thumbnail">
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" title="Close">x</button>
      </div>
    </div>
  </div>
</div>
<?php
include("includes/footer.php");
?>
<script type="text/javascript">
	$(window).on('load',function(){
		$('table img').click(function(){
			var src = $(this).attr('src');
			var category = $(this).parent().prev().text();
			$('.modal-title').html(category);
			$('#preview_image').attr('src',src);
			$('#myModal').modal({
				show: true,
				backdrop: 'static',
    			keyboard: false
			});

		});
	});
</script>
