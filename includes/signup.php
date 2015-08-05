<?php
ini_set('display_errors', 1); error_reporting(~0);
	if (!empty($_POST)) {
		$salt = "DMIqsegmiF§MEIfjé2";
		$nickname = $_POST['nickname'];
// cost zegt tegen hash engine hoe vaak hij zich moet herhalen --> encrypteren. x 12
$options = [ 'cost' => 12,];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options); // php 5.5
// connecteren met databank
$conn = new mysqli("localhost", "root", "root", "phphub");
if (!$conn->connect_errno) {
// bereidt de query voor, beschermt tegen SQL injectie (real_escape_string)
$query = "INSERT INTO db_users (nickname, password, email) VALUES ('".$conn->real_escape_string($nickname)."','".$password."','".$email."')";
// voert query uit op connectie, returned true of false. true = succesvol; false = onsuccesvol.
// bij email en password staat verification dus kan niet gerendered worden. Nickname wel. 
if ($conn->query($query)) {
// als query geslaagd is start sessie
session_start();
if (!isset($_SESSION['loggedin_user'])) {
// start sessie nadat men succesvol geregistreerd is.
$_SESSION['loggedin_user'] = $nickname;
$_SESSION['loggedin_role'] = 0;
} else {
var_dump($_SESSION);
}
// redirect aangemeld naar index pagina.
header("Location: ../index.php");
}
} else {
	echo "fail ".$conn->connect_error;
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