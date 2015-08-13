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
		
//		if ($conn->query($query)) {
//			echo '<div class="alert alert-success" role="alert">Feature request successfully added!</div>';
//		} else {
//			echo '<div class="alert alert-warning" role="alert">Request could not be added to the database.</div>';
//		}
	}
	//Upvote a feature request
	if(isset($_POST['upvote'])) {
		// Get user id & feature request id
		$userid = $_SESSION['loggedin_userid'];
		$requestid = $_POST['request_id'];
		
		// Update 2 tables of the db:
		// 1. update the feature request record: score + 1
		// 2. create new record in voting table with the id of the user that voted, the request voted on, and the type of vote.
		$queryRequest = 'UPDATE db_request SET score = score + 1 WHERE db_request.id = ' . $requestid . ';';	
		$queryVoting = 'INSERT INTO db_voting (id_user, id_votedrequest, type) VALUES(' . 
			$userid . ',' .
			$requestid . ',' .
			'1'	. ')';
		
		// If both queries succeeded
		if ($conn->query($queryRequest) && $conn->query($queryVoting)) {
			// Show succesful feedback
			echo '<div class="alert alert-success" role="alert">Successfully voted!</div>';
		} else {
			// Show negative feedback
			echo '<div class="alert alert-warning" role="alert">Something went wrong while voting.</div>';
		}
	}
	//Downvote a feature request
	if(isset($_POST['downvote'])) {
		// Get user id & feature request id
		$userid = $_SESSION['loggedin_userid'];
		$requestid = $_POST['request_id'];
		
		// Update 2 tables of the db:
		// 1. update the feature request record: score - 1
		// 2. create new record in voting table with the id of the user that voted, the request voted on, and the type of vote.
		$queryRequest = 'UPDATE db_request SET score = score - 1 WHERE db_request.id = ' . $requestid . ' AND score > 0;';	
		$queryVoting = 'INSERT INTO db_voting (id_user, id_votedrequest, type) VALUES(' . 
			$userid . ',' .
			$requestid . ',' .
			'0'	. ')';
		
		// If both queries succeeded
		if ($conn->query($queryRequest) && $conn->query($queryVoting)) {
			// Show succesful feedback
			echo '<div class="alert alert-success" role="alert">Successfully voted!</div>';
		} else {
			// Show negative feedback
			echo '<div class="alert alert-warning" role="alert">Something went wrong while voting.</div>';
		}
	}
}
?>

<div class="jumbotron">
   	<img src="http://placehold.it/960x540" class="img-responsive" />
	<h1 class="title">
		<?php
			echo $object->project_name . " <small>" . $object->project_company . "</small>";
		?>
    </h1>
    <h2 class="description2"><?php echo $object->project_description; ?></h2>
</div>
	
<?php if (isset($_SESSION['loggedin_user'])){ ?>
<form class="form-inline feature-request-form" action="" method="post">
	<div class="form-group">
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
		// Select the nickname from the users table & join this with the request table based on the user id
		// (matching the user id from both the users & request table). This user id also matches the user id from object $i.
		$queryTwo = "SELECT db_users.nickname, db_users.id " . 
			"FROM db_users INNER JOIN db_request ON db_users.id=db_request.id_user " . 
			"WHERE db_request.id_user=" . $i->id_user . ";";

		$resultTwo = $conn->query($queryTwo);
		$objectTwo = $resultTwo->fetch_object();
		
		// Check if this user has already voted on a feature request, if so, disable the vote buttons
		// Query for a row in the voting table which contains the current request_id AND the current user_id
		$queryVoteCheck = "SELECT db_voting.* FROM db_voting WHERE db_voting.id_user = " . $_SESSION['loggedin_userid'] . 
			" AND db_voting.id_votedrequest = " . $i->id . ";";  
		
		// Create the disabled state for the buttons
		$btndisable = "disabled='disabled'";
				
		// Query the database and fetch the result(s)
		$resultVC = $conn->query($queryVoteCheck);		
		$objectVC = $resultVC->fetch_object();
				
		// Start creating the feature request HTML
		$fr_html = '<div class="panel panel-default">' . 
						'<div class="panel-body">' . 
							'<form class="form-inline vote-buttons" action="" method="post" >' .
								'<input name="request_id" type="hidden" value="' . $i->id . '" />' .
								'<button type="submit" name="upvote" class="btn btn-success" ';
		
		// If a row was found in the voting table (= this user has voted on this request), add the disabled state to the buttons
		if(!is_null($objectVC)) {
			$fr_html .= $btndisable;
		}
		
		// Add to the feature request HTML
		$fr_html .=				'><i class="glyphicon glyphicon-triangle-top"></i></button>' . 
								'<button type="submit" name="downvote" class="btn btn-danger" ';
		
		// If a row was found in the voting table, this button gets disabled too
		if(!is_null($objectVC)) {
			$fr_html .= $btndisable;
		}
		
		// Add the rest of the feature request HTML
		$fr_html .=				'><i class="glyphicon glyphicon-triangle-bottom"></i></button>' .		
								'<span class="feature-score">' . $i->score . '</span>' .
							'</form>' .
							'<h3 class="panel-title"><strong>' . $i->request . '</strong> <span>- requested by ' . $objectTwo->nickname . '</span></h3>' . 
						'</div>' . 
					'</div>';							
				
		echo $fr_html;
	}
}
?>	
<!-- JS for voting -->
<!--<script src="js/vote.js"></script>-->