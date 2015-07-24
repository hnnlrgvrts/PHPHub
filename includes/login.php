<?php
session_start();
// Do Something
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