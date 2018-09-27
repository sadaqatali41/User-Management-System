<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
	
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">UserMGT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
			if(isset($_SESSION['loggedin']))
			{
				?>
					<li class="nav-item active">
					  <a class="nav-link" href="home.php">Home
						<span class="sr-only">(current)</span>
					  </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="edit.php">Edit Profile</a>
					</li>
					 <li class="nav-item">
					  <a class="nav-link" href="change_pwd.php">Change Password</a>
					</li>
					<li class="nav-item" style="margin-right:10px;">
					  <a class="nav-link" href="upload_avatar.php">Upload avatar</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link btn" href="logout.php">Logout</a>
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link btn dropdown-toggle" data-toggle="dropdown" href="logout.php">News Articles</a>
					  <ul class="dropdown-menu">
						<li class="">
							<a class="mydrop" href="add_article.php">Add Article</a>
						</li>
						<li class="">
							<a class="mydrop" href="view_articles.php">View Articles</a>
						</li>
					  </ul>
					</li>
					
				<?php
			}
			else
			{
				?>
					<li class="nav-item active">
					  <a class="nav-link" href="index.php">Home
						<span class="sr-only">(current)</span>
					  </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="about.php">About</a>
					</li>
					 <li class="nav-item">
					  <a class="nav-link" href="contact.php">Contact</a>
					</li>
					<li class="nav-item" style="margin-right:10px;">
					  <a class="nav-link btn btn-success" style="color:white" href="register.php">Register</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link btn btn-success" style="color:white" href="login.php">Login</a>
					</li>
				<?php
			}

			?>
           
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header - set the background image for the header in the line below -->
    <header class="py-2 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
      <img class="img-fluid d-block mx-auto" src="http://placehold.it/200x200&text=Logo" alt="">
    </header>