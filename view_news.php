<?php 
include("includes/header.php");
include("includes/connect.php");
?>

<?php 
if(isset($_GET['nid']))
{
	$id=$_GET['nid'];
	$res=mysqli_query($con,"SELECT * FROM news WHERE id=$id AND status=1");
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
		?>
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h3><?php echo $row['title'] ?></h3>
						<img height="300" width="650" src="news/<?php echo $row['filename']?>">
						<p><?php echo $row['description'] ?></p>
						<p>Posted On: <?php echo date("l dS F",strtotime($row['date'])); ?></p>
					</div>
					<div class="col-md-3">
						<h5>Related articles</h5>
						<?php 
						$all_art=mysqli_query($con,"SELECT title,id FROM news WHERE status=1 AND id!=$id");
						?>
						<!-- <ul class="nav"> -->
						<?php 
						while($arow=mysqli_fetch_assoc($all_art))
						{
						?>
							<!-- <li></li> -->
							<p><a href="view_news.php?nid=<?php echo $arow['id']?>"><?php echo $arow['title']?></a></p>
						<?php 
						}
						?>
						<!-- </ul> -->
					</div>
				</div>
			</div>
		<?php
	}
	else
	{
		echo "<div class='jumbotron'><h5>Sorry! The article you requested was not found</h5></div>";
	}
}
else
{
	header("Location:index.php");
}
?>

<?php 
include("includes/footer.php");
?>
