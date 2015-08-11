<?php
$project = $_GET['id']; // Gets the project id from the url.

$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
if (!$conn->connect_errno) {
	$query = "SELECT * FROM db_project WHERE id =" . $project . ";";

	// $result fetches data from the table out of the database
	$result = $conn->query($query);
	// fetch_object() makes sure $result is (human) readable.
	$object = $result->fetch_object();

	// Add a new feature request
	if (!empty($_POST)) {
		//var_dump($_POST);
		$request = $_POST['request'];
		$userid = $_SESSION['loggedin_userid'];
		$query = "INSERT INTO db_request (request,id_user,id_project)" . "VALUES ('" . 
			$conn->real_escape_string($request) . "','" . 
			$userid . "','" . 
			$project . "')";
		
		if ($conn->query($query)) {
			echo '<div class="alert alert-success" role="alert">Feature request successfully added!</div>';
		}
		else {
			echo '<div class="alert alert-warning" role="alert">Request could not be added to the database.</div>';
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
		$queryTwo = "SELECT db_users.nickname " . 
			"FROM db_users INNER JOIN db_request ON db_users.id=db_request.id_user " . 
			"WHERE db_request.id_user=" . $i->id_user . ";";

		// Select the nickname from the users table & join this with the request table based on the user id
		// (matching the user id from both the users & request table). This user id also matches the user id from object $i.
		
		$resultTwo = $conn->query($queryTwo);
		$objectTwo = $resultTwo->fetch_object();
		echo '<div class="panel panel-default">' . 
				'<div class="panel-heading">' . 
					'<form class="form-inline vote-buttons">' .
						'<button type="submit" name="upvote" class="btn btn-default"><i class="glyphicon glyphicon-triangle-top"></i></button>' . 
						'<button type="submit" name="downvote" class="btn btn-default"><i class="glyphicon glyphicon-triangle-bottom"></i></button>' .		
						'<span class="feature-score">' . $i->score . '</span>' .
					'</form>' .
					'<h3 class="panel-title">' . $i->request . '</h3>' . 
				'</div>' . 
				'<div class="panel-body">Feature requested by <strong>' . $objectTwo->nickname . '</strong></div>' . 
			'</div>';
	}
}

?>		
		<!-- jQuery -->
		<script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
		<!-- Bootstrap JS -->
		<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
		<!-- JS for voting -->
		<script src="js/vote.js"></script>
	</body>
</html>