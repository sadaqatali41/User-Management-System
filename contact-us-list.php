<?php 
include("includes/header.php");
if(!isset($_SESSION['loggedin']))
{
	header('Location:login.php');
	exit(0);
}
include("includes/connect.php");
	$sql = "SELECT * FROM contact";
	$res = mysqli_query($con, $sql);
?>
<div class="container">
		<h1 class="text-center"><i>Contact Us List</i></h1>
		<?php 
		if(isset($_COOKIE['msg']))
			echo $_COOKIE['msg'];
		 ?>
		<table class="table table-striped">
		    <thead>
		      <tr class="success">
		      	<th>Serial No.</th>
		        <th>Name</th>
		        <th>Email Address</th>
		        <th>Mobile Number</th>
		        <th>Message</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <?php $counter = 1; if(mysqli_num_rows($res) > 0 ): ?>
		    	<?php while($row = mysqli_fetch_object($res)): ?>
		    		<tr>
		    			<td><?php echo $counter++ ?></td>
		    			<td><?php echo $row->username; ?></td>
		    			<td><?php echo $row->email; ?></td>
		    			<td><?php echo $row->mobile; ?></td>
		    			<td><?php echo $row->message; ?></td>
		    			<td>
		    				<a class="btn btn-danger btn-xs" href="contact-delete.php?id=<?php echo $row->id ?>" onclick="return delFunc()">Delete</a>
		    			</td>
		    		</tr>
		    	<?php endwhile; ?>
		    <?php else: ?>
		    	<tr>
		    		<th colspan="5">Sorry! record not found.</th>
		    	</tr>
		    <?php endif; ?>
		    <tbody>
		      
		    </tbody>
		  </table>
</div>
<?php 
include("includes/footer.php");
?>
<script type="text/javascript">
	function delFunc()
	{
		if(confirm('Do you want to delete this?'))
			return true;
		else
			return false;
	}
</script>