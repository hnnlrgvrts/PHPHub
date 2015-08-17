<?php 
	// Errors & warnings toggle
	ini_set('display_errors', 1); 
	error_reporting(~0);

	//Start a new session for the current user - more info: http://www.w3schools.com/php/php_sessions.asp
	session_start();
	//Set the timezone to prevent warnings
	date_default_timezone_set("Europe/Brussels");

	if (isset($_GET['page'])) {
		// get the title of the page from the config file, if the title exists
		if(array_key_exists($_GET['page'], $config["titles"])) {
			$title = $config["titles"][$_GET['page']]; 
		} else {
			// get the error page title in all other circumstances
			$title = $config["titles"]["error"];
		}
	} else {
		// get the default title - the one from the index page
		$title = $config["titles"]["index"];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>

	<!-- Bootstrap CSS & Theme -->
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="/css/screen.css">

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="js/vote.js"></script>
	<script src="js/edit.js"></script>

	<title>
		<?php echo $title; ?>
	</title>
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-static-top navbar-inverse">
		<input type="hidden" id="hiddenUserId" value=
			<?php
			if(isset($_SESSION['loggedin_userid'])){
				echo '"'.$_SESSION['loggedin_userid'].'"';
			};
			?>
		>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">PHP Hub</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="index.php">Home<span class="sr-only">(current)</span></a>
					</li>
					<?php if(isset($_SESSION[ 'loggedin_user']) && 
							 isset($_SESSION[ 'loggedin_role']) && 
							 $_SESSION[ 'loggedin_role'] == 1 ) { //Means we 're logged in as an admin ?> 
<!--
					Put the dropdown in comments because it only works on the homepage so far... Fix this or go with the solution provided below - put the actions directly in the navbar.
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="index.php?page=addproject">Add new project</a>
							</li>
							<li>
								<a href="#">Edit Admins</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li role="separator" class="divider"></li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</li>
-->
					<li>
						<a href="index.php?page=addproject">Add new project</a>
					</li>
					<?php } ?>
				</ul>
				<?php if (isset($_SESSION[ 'loggedin_user'])) { ?>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<img <?php echo 'src = "uploads/avatars/av'.$_SESSION['loggedin_user'].'.png"'; ?> class="img-responsive avatar" />
						<p class="navbar-text">
							<?php echo $_SESSION[ 'loggedin_user'] . " (" . $_SESSION[ 'loggedin_role'] . ")"; ?>
						</p>
					</li>
					<li>
						<a href="index.php?page=logout">Logout</a>
					</li>
				</ul>
				<?php } else { ?>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="index.php?page=signup">Sign Up!</a>
					</li>
					<li>
						<a href="index.php?page=login">Login</a>
					</li>
				</ul>
				<?php }?>
		</div>
		<!-- /.navbar-collapse -->
	  </div>
	  <!-- /.container-fluid -->
	</nav>
	<!-- End of navbar-->