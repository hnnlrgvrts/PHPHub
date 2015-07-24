<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['nickname']) || empty($_POST['password'])) {
$error = "nickname or Password is invalid";
}
else
{
// Define $nickname and $password
$nickname=$_POST['nickname'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "root");
// To protect MySQL injection for Security purpose
$nickname = stripslashes($nickname);
$password = stripslashes($password);
$nickname = mysql_real_escape_string($nickname);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("PHPhub", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND nickname='$nickname'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$nickname; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "nickname or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
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