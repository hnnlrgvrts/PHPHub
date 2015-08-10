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
        header("Location: sessionhandler.php");
      }
    } else {
    echo "fail ".$conn->connect_error;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('head_content.php'); ?>
  
  <title>Sign up for an account</title>
</head>

<body>
  <?php require_once('header.php'); ?> 
  <div class="container-fluid">
    <h1>
      <?php 
        if (isset($feedback)) {
			echo $feedback;
		} else {
          echo "Please sign up!";
		} 
      ?>
   </h1>
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
  </div>
</body>
</body>
</html>