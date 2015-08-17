<?php
$project = $_GET['id']; // Gets the project id from the url.
$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
if (!$conn->connect_errno) {
	$query = "SELECT * FROM db_project WHERE id =" . $project . ";";
	// $result fetches data from the table out of the database
	$result = $conn->query($query);
	// fetch_object() makes sure $result is (human) readable.
	$object = $result->fetch_object();
	// The following prints out what's in the $_POST variable if one of the forms is used, e.g. a feature request has been added or a vote has been submitted
	//	if(!empty($_POST)){
		//		print_r($_POST);
		//		echo "<br/>";
		//
		//		foreach($_POST as $key => $value) {
		//		   echo "The HTML name: $key <br/>";
		//		   echo "The content of it: $value <br/>";
		//		}
	//	}
	
	// Add a new feature request
	if (isset($_POST['request'])) {
		//var_dump($_POST);
		$request = $_POST['request'];
		$userid = $_SESSION['loggedin_userid'];
		$query = "INSERT INTO db_request (request,id_user,id_project)" . " VALUES ('" .
			$conn->real_escape_string($request) . "','" .
			$userid . "','" .
			$project . "')";
		
		if ($conn->query($query)) {
			echo '<div class="alert alert-success" role="alert">Feature request successfully added!</div>';
		} else {
			echo '<div class="alert alert-warning" role="alert">Request could not be added to the database.</div>';
		}
	}
}
?>
<div class="jumbotron" >
	<form id="projectcontainer" action="index.php?page=editproject" method="post">
		<input type="hidden" name="inputid" value="<?php echo $_GET['id'] ?>">
		<h1 class="title" id="projecttitle">
			<?php echo $object->project_name;?>
		</h1>
		<img <?php echo 'src = "uploads/'.$object->project_picture.'"'; ?> class="img-responsive projectimg" />
		<h2 class="description2" id="projectdescription">
			<?php echo $object->project_description; ?>
		</h2>
	</form>
</div>
<?php if(isset($_SESSION[ 'loggedin_user']) &&
							isset($_SESSION[ 'loggedin_role']) &&
$_SESSION[ 'loggedin_role'] == 1 ) { //Means we 're logged in as an admin ?>
<button  class="btn glyphicon glyphicon-pencil" type="submit" onclick="edit()" type="submit" ></button>
<form action="index.php?page=deleteproject" method="post">
<input type="hidden" name="inputid" value="<?php echo $_GET['id'] ?>">
<button type="submit" value="X" class="btn "><i class="glyphicon glyphicon-remove"></i></button>
</form>

<?php } ?>

<?php if (isset($_SESSION['loggedin_user'])){ ?>
<form class="form-inline feature-request-form" action="" method="post">
	<div class="form-group">
		<input type="hidden" id="<?php echo $_GET['id'] ?>" name="<?php echo $_GET['id'] ?>" class="projectid">
		<label class="sr-only" for="request">Feature request</label>
		<input type="text" class="form-control" id="request" placeholder="Feature request" name="request">
	</div>
	<button type="submit" name="submit" class="btn btn-default">Submit feature request</button>
</form>
<?php } ?>
<?php
if (!$conn->connect_errno) {
	$query = "SELECT * FROM db_request WHERE id_project =" . $project . ";";
	// $result gets data from table out of the database
	$result = $conn->query($query);
	
	while ($i = $result->fetch_object()) {
		//when
			//	projects page load
			//	select all votes of
				//		loaded project
				//		load score of each request
		
		// Select the nickname from the users table & join this with the request table based on the user id
		// (matching the user id from both the users & request table). This user id also matches the user id from object $i.
		$queryTwo = "SELECT db_users.nickname, db_users.id " .
			"FROM db_users INNER JOIN db_request ON db_users.id=db_request.id_user " .
			"WHERE db_request.id_user=" . $i->id_user . ";";
		$resultTwo = $conn->query($queryTwo);
		$objectTwo = $resultTwo->fetch_object();
		
		if(isset($_SESSION['loggedin_userid'])){
			// Check if this user has already voted on a feature request, if so, disable the vote buttons
			// Query for a row in the voting table which contains the current request_id AND the current user_id
			$queryVoteCheck = "SELECT db_voting.* FROM db_voting WHERE db_voting.id_user = " . $_SESSION['loggedin_userid'] .
				" AND db_voting.id_votedrequest = " . $i->id . ";";
					
			// Query the database and fetch the result(s)
					$resultVC = $conn->query($queryVoteCheck);
			$objectVC = $resultVC->fetch_object();
		}
		
		// Create the disabled state for the buttons
		$btndisable = "disabled='disabled'";
		// Start creating the feature request HTML
		$fr_html = '<div class="panel panel-default">' .
							'<div class="panel-body">' .
									'<form class="form-inline vote-buttons" action="index.php?page=vote&projectid=' . $project . '&requestid=' . $i->id . '" method="post" >' .
											'<input id="request_id" name="request_id" type="hidden" value="' . $i->id . '" />' .
											'<button type="submit" name="upvote" class="btn btn-success" ';
					
					// If a row was found in the voting table (= this user has voted on this request), add the disabled state to the buttons
					// disabled if the user is not logged in too
					if(!isset($_SESSION['loggedin_userid']) || !is_null($objectVC)) {
						$fr_html .= $btndisable;
					}
					
					// Add to the feature request HTML
									$fr_html .=				'><i class="glyphicon glyphicon-triangle-top"></i></button>' .
											'<button type="submit" name="downvote" class="btn btn-danger" ';
					
					// If a row was found in the voting table, this button gets disabled too
					// disabled if the user is not logged in too
					if(!isset($_SESSION['loggedin_userid']) || !is_null($objectVC)) {
						$fr_html .= $btndisable;
					}
					
					// Add the rest of the feature request HTML
											$fr_html .=				'><i class="glyphicon glyphicon-triangle-bottom"></i></button>' .
											'<span class="feature-score">' . $i->score . '</span>' .
									'</form>';
					if(isset($_SESSION[ 'loggedin_user']) && isset($_SESSION[ 'loggedin_role']) && $_SESSION[ 'loggedin_role'] == 1 || $_SESSION['loggedin_userid'] === $i->id_user) {
							 $fr_html .=	'<form action="index.php?page=editrequest" method="post" id="requestcontainer">'.
								 				'<h3 class="panel-title" id="prependTarget">'.
								 					'<strong id="currentRequest">'.$i->request.'</strong>'.
								 					'<span>- requested by '.$objectTwo->nickname.'</span>'.
								 				'</h3>'.								
												'<input name="requestid" type="hidden" value="'.$i->id.'">'.
												'<input name="projectid" type="hidden" value="'.$project.'">'.
												'<button id ="confirmEditRequest" type="submit" class="btn hidden">Submit</button>'.
											'</form>'.
											'<button class="btn glyphicon glyphicon-pencil" onclick="editrequest()"></button>'.
											'</div>'.
							 				'<form action="index.php?page=deleterequest" method="post">'.
												'<input name="requestid" type="hidden" value="'.$i->id.'">'.
												'<input name="projectid" type="hidden" value="'.$project.'">'.
												'<button type="submit" class="btn"><i class="glyphicon glyphicon-remove"></i></button>'.
											'</form>'.
									'</div>';
					}
					else
					{
						$fr_html .= '<h3 class="panel-title"><strong id="currentRequest">' . $i->request . '</strong> <span>- requested by ' . $objectTwo->nickname . '</span></h3>' .
								'</div>'.
							'</div>';
					}
				
		echo $fr_html;
	}
}
?>