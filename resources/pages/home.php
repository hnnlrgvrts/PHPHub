<!-- Jumbotron - used for displaying blurry header foto and brand -->
<div class="jumbotron">
	<div class="container">
		<h1>PHP Hub</h1>
		<p>On this website you'll be able to request features which you think are missing for a posted project. Our admins will keep an eye out so there wont be any inapropriate requests.</p>
		<?php if(!isset($_SESSION["loggedin_user"])) { ?>
		<p>You can either sign up for a new account, or log in if you're a returning user!</p>
		<a class="btn btn-primary" href="index.php?page=signup">Sign up!</a>
		<a href="index.php?page=login" class="btn btn-default">Login</a>
		<?php } ?>
	</div>
</div>
<!-- End of jumbotron -->

<!-- Thumbnails - project overviews -->
<div class="row">
	<?php
	$conn = new mysqli("localhost", "root", "root", "phphub");
	
	if (!$conn->connect_errno) {
		// Connection is ok
		$query = "SELECT * FROM db_project;";

		// $result fetches data from the table of the database 
		$result=$conn->query($query);        
		$counter = 0;
		while ($i=$result->fetch_object()) {
			$counter++;
			
			echo
				// '<a class="col-sm-6 col-md-3" href="index.php?page=project&id=' . $i->id . '">' .
				'<div class="col-sm-6 col-md-3" onclick="location.href=\'index.php?page=project&id=' . $i->id . '\'">'.
					'<div class="thumbnail">' .
//						'<img src="//placehold.it/480x270" alt="' . $i->project_name . '" />' .
						'<div class="caption">' .
							'<h3 class="title">' . $i->project_name . '</h3>' .
							'<p class="description">' . $i->project_description . '</p>' .
						'</div>' .
					'</div>' .
				'</div>'; 
				// '</a>';
		  		if($counter == 4){
		  			echo '<div class="clearfix visible"></div>';
		  		}
		  	}
		  	
	}

	?>
</div>