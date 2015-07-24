<?php 

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
			$result = $conn->query($query);
			// echo $query;
			check of password_verify(wachtwoord) == hash
			$row_hash = $result->fetch_array();
			$res = "";
			if (password_verify($password, $row_hash['password'])) 
			{
				res = "Welcome!";
			}
			else
			{
				res = "Invalid nickname/password";
			// }
		}
		function doLogin($p_username)
	{
		// cookie plaatsen (onthouden)
		//$salt ="DFMEIFJ35938...8!!sdmciejf";
		//$content = $p_username . "," . md5($p_username.$salt);
		//setcookie("loginCookie", $content, time()+60*60);

		session_start();
		$_SESSION['loggedin'] = 'yes';

		// ga naar andere pagina
	}

	function isLoggedIn()
	{
		// als er een cookie is
		$salt ="DFMEIFJ35938...8!!sdmciejf";
		if (isset($_COOKIE['loginCookie'])) 
		{
			$cookie = $_COOKIE['loginCookie'];
			$cookie_exploded = explode(",", $cookie);
			if (md5($cookie_exploded[0] . $salt) == $cookie_exploded[1]) {
				return true;
			}

			
		}
		else
		{
			return false;
		}
	}

	// controleer of er gepost is
	if (!empty($_POST)) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// check of user mag inloggen
		if (canLogIn($username,$password)) 
		{
			doLogin($username);
			$feedback = "Welcome back!";
		}
		else
		{
			$feedback = "You can't login!";
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
	<?php if($res != "") echo $res; ?>
	<form action="" method="post">
		
		<label for="nickname">nickname: </label>
		<input type="text" id="nickname" name="nickname">

		<label for="password">Password: </label>
		<input type="password" id="password" name="password">

		<button type="submit">Login!</button>

	</form>

</body>
</html>