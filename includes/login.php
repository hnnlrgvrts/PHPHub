<?php
ini_set('display_errors', 1); error_reporting(~0);
	if (!empty($_POST)) {
		$salt = "DMIqsegmiF§MEIfjé2";
		$nickname = $_POST['nickname'];
		$password = $_POST['password'];
		// connectie maken met database
		// @ gebruiken om fouten onbeschikbaar te maken
		$conn = new mysqli("localhost", "root", "root", "PHPhub");
		if (!$conn->connect_errno) {
			//connectie is ok
			$query = "SELECT * FROM db_users WHERE nickname = '".$conn->real_escape_string($nickname)."';";
			// $result haalt data uit databank 
			$result=$conn->query($query);
			// $row_user maakt de data leesbaar (fetch_assoc()).
			$row_user =$result->fetch_assoc();
			var_dump($row_user);
			// als $password in databank staat:
			if (password_verify($password, $row_user['password']))
			{
				echo "Welcome!";
				// Start de session als login succesvol is!
				session_start();
				if (!isset($_SESSION['loggedin_user'])) {
					$_SESSION['loggedin_user'] = $row_user['nickname'];
					$_SESSION['loggedin_role'] = $row_user['role'];
				} else {
					var_dump($_SESSION);
				}
				// redirect naar indexpagina terwijl men aangemeld is. 
				header("Location: ../index.php");
				
			}
			else
			{
				echo "Go away!";
			}
	
		}
		
	}
	/*
	
	
	*/
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body>
		
		<h1>Login</h1>
		<form action="" method="post">
			
			<label for="nickname">nickname: </label>
			<input type="text" id="nickname" name="nickname">
			<label for="password">Password: </label>
			<input type="password" id="password" name="password">
			<button type="submit">Login!</button>
		</form>
	</body>
</html>