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
                $message = "Welcome!";
                echo "<script type='text/javascript'>alert('$message');</script>";
				// Start de session als login succesvol is!
				session_start();
				if (!isset($_SESSION['loggedin_user'])) {
					$_SESSION['loggedin_user'] = $row_user['nickname'];
					$_SESSION['loggedin_role'] = $row_user['role'];
					$_SESSION['loggedin_userid'] =$row_user['id'];
				} else {
					var_dump($_SESSION);
				}
				// redirect naar indexpagina terwijl men aangemeld is. 
				header("Location: index.php");	
			}
			else
			{
				echo "Go away!";
			}
		}	
	}	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('head_content.php'); ?>
  
  <title>Login</title>
</head>

<body>
  <?php require_once('header.php'); ?> 
  <div class="container-fluid">
    <h1>Login</h1>
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
  </div>
</body>

</html>