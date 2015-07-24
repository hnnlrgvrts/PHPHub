<?php 

	if (!empty($_POST)) {
		$salt = "DMIqsegmiF§MEIfjé2";
		$nickname = $_POST['nickname'];
		$options = [ 'cost' => 12,];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options); // php 5.5

		$conn = new mysqli("localhost", "root", "root", "PHPhub");
		if (!$conn->connect_errno) {
			$query = "INSERT INTO db_users (nickname, password, email) VALUES ('".$conn->real_escape_string($nickname)."','".$password."','".$email."')";
			if ($conn->query($query)) {
				
				$feedback = "Welcome aboard!";

			}
		}

	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign up for an account</title>
</head>
<body>
	
	<h1>
		
		<?php if (isset($feedback)) {
			echo $feedback;
		}
		else
		{
			echo "Please sign up!";
		} ?>

	</h1>
	<form action="" method="post">
		
		<label for="nickname">nickname: </label>
		<input type="text" id="nickname" name="nickname">
		<label for="email">E-mail: </label>
		<input type="text" id="email" name="email">


		<label for="password">Password: </label>
		<input type="password" id="password" name="password">

		<button type="submit">Sign up!</button>

	</form>

</body>
</html>