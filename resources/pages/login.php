<?php
if (!empty($_POST)) {
	$salt = "DMIqsegmiF§MEIfjé2";
	$nickname = $_POST['nickname'];
	$password = $_POST['password'];

	// Connect with database
	// Use "@" to suppress error messages
	$conn = new mysqli("localhost", "root", "root", "PHPhub");
	if (!$conn->connect_errno) {

		// Connection is ok - use real_escape_string for protection against SQL injection
		$query = "SELECT * FROM db_users WHERE nickname = '" . $conn->real_escape_string($nickname) . "';";

		// $result gets the data from the database
		$result = $conn->query($query);

		// $row_user makes the data readable (fetch_assoc()).
		$row_user = $result->fetch_assoc();
		//var_dump($row_user);

		// if $password is in the fetched rows:
		if (password_verify($password, $row_user['password'])) {
			echo "Welcome!";
			
			// Start the session if the login was succesful!
			session_start();
			if (!isset($_SESSION['loggedin_user'])) {
				//Set the session variables
				$_SESSION['loggedin_user'] = $row_user['nickname'];
				$_SESSION['loggedin_role'] = $row_user['role'];
				$_SESSION['loggedin_userid'] = $row_user['id'];
				$_SESSION['loggedin_picture'] = $row_user['picture'];
			}
			//else {
			//	var_dump($_SESSION);
			//}

			// Redirect to the index page while staying logged in.
			header("Location: index.php");
		} else {
			echo "Login failed! Please try again - if you know the proper credentials, that is.";
		}
	}
}
?>

<div class="page-header">
  <h1>Login</h1>
</div>
<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label for="nickname" class="col-sm-2 control-label">Nickname</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="nickname" placeholder="Nickname" name="nickname">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
			<input type="password" id="password" name="password" class="form-control" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Login!</button>
		</div>
	</div>
</form>