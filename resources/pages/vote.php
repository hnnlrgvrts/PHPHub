<?php
//when
//	user clicks button
//check (expand at later point to include switchable votes)
//	if user has already voted
//		cancel (= disable buttons)
//	else 
//		insert record into
//			voting with
//				id of logged in user
//				id of feature request
//				1/0 for up-/downvote

$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection

$feedback = array();

if (!$conn->connect_errno) {
	try {
		// Get user id & feature request id
		$userid = $_SESSION['loggedin_userid'];
		$requestid = $_GET['requestid'];
		$queryRequest = "";
		$queryVoting = "";

		//Upvote a feature request
		if(isset($_POST['upvote'])) {
				// Update 2 tables of the db:
				// 1. update the feature request record: score + 1
				// 2. create new record in voting table with the id of the user that voted, the request voted on, and the type of vote.
				$queryRequest = 'UPDATE db_request SET score = score + 1 WHERE db_request.id = ' . $requestid . ';';	
				$queryVoting = 'INSERT INTO db_voting (id_user, id_votedrequest, type) VALUES(' . 
					$userid . ',' .
					$requestid . ',' .
					'1'	. ')';
		}
		//Downvote a feature request
		if(isset($_POST['downvote'])) {
				// Update 2 tables of the db:
				// 1. update the feature request record: score - 1
				// 2. create new record in voting table with the id of the user that voted, the request voted on, and the type of vote.
				$queryRequest = 'UPDATE db_request SET score = score - 1 WHERE db_request.id = ' . $requestid . ' AND score > 0;';	
				$queryVoting = 'INSERT INTO db_voting (id_user, id_votedrequest, type) VALUES(' . 
					$userid . ',' .
					$requestid . ',' .
					'0'	. ')';
		}
		// If both queries succeeded
		if ($conn->query($queryRequest) && $conn->query($queryVoting)) {
			// Show succesful feedback
			$feedback['message'] = "Voting succesful!";
			$feedback['status'] = true;
			// echo '<div class="alert alert-success" role="alert">Successfully voted!</div>';
		} else {
			// Show negative feedback
			$feedback['message'] = "Something went wrong with your vote. Please try again!";
			$feedback['POST'] = $_POST;
			$feedback['status'] = false;
		}
	} catch(Exception $e) {
		$feedback['message'] = $e->getMessage();
		$feedback['status'] = false;
	}
	
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');
	echo json_encode($feedback);
}
die(); // We use die() for reasons explained here: http://thedailywtf.com/articles/WellIntentioned-Destruction
?>