<?php
//If the form has been submitted
if (!empty($_POST)) {
	$salt = "DMIqsegmiF§MEIfjé2";
	$nickname = $_POST['nickname'];
	// cost tells hash engine how many times to repeat --> encrypt. x 12
	$options = [ 'cost' => 12,];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options); // php 5.5
	// connect with database
	$conn = new mysqli("localhost", "root", "root", "phphub");
	
	if (!$conn->connect_errno) {
		// prepare the query, protect against SQL injection (real_escape_string)
		$query = "INSERT INTO db_users (nickname, password, email) VALUES ('".$conn->real_escape_string($nickname)."','".$password."','".$email."')";
		// execute query on connection, returns true/false. 
		// true = success, false = fail.
		// email & password has verification so these can not be rendered. Nickname can, however. 
		if ($conn->query($query)) {
			if (!isset($_SESSION['loggedin_user'])) {
				// Store session variables after successful registration (session has already been started in header.php).
				$_SESSION['loggedin_user'] = $nickname;
				$_SESSION['loggedin_role'] = 0;
			} else {
				var_dump($_SESSION);
			}
			// Redirect to index page while logged in.
			header("Location: index.php?page=sessionhandler");
		}
	} else {
		echo "fail " . $conn->connect_error;
	}
}
?>

<div class="page-header">
	<h1>
		<?php 
		if (isset($feedback)) {
			echo $feedback;
		} else {
		  echo "Please sign up!";
		} 
		?>
	</h1>
</div>
<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label for="nickname" class="col-sm-2 control-label">Nickname</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="nickname" placeholder="Nickname" name="nickname">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
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
			<button type="submit" class="btn btn-primary">Sign up!</button>
		</div>
	</div>
</form>