<?php
include("includes/header.php");
include("includes/connect.php");
$res=mysqli_query($con,"select *from news where status=1");

 ?>

    <!-- Content section -->
    <section class="py-5">
      <div class="container">
	  <?php 
	  if(mysqli_num_rows($res)>0)
	  {
	  ?>
		<div class="row">
		<?php 
		while($row=mysqli_fetch_assoc($res))
		{
		?>
			<div class="col-md-4">
				<img class="img-thumbnail" src="news/<?php echo $row['filename']?>" height="150" width="270">
				<h6 class=""><?php echo $row['title']?></h6>
				<p><?php echo substr($row['description'],0,80);?></p>
				<a href="view_news.php?nid=<?php echo $row['id']?>" class="btn btn-success">Readmore...</a>
			</div>
		<?php }?>	
			
		</div>
		<?php 
	  }
	  else
	  {
		  echo "<div class='alert alert-info'>Sorry! No Articles Posted</div>";
	  }
		?>
      </div>
    </section>

    

   <?php
include("includes/footer.php");
 ?>