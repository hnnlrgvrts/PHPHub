<?php ini_set('display_errors', 1); error_reporting(~0);?>
<?php
session_start();
			$project = $_GET['id']; //Haalt id uit url.
			$conn = new mysqli("localhost", "root", "root", "phphub");
			if (!$conn->connect_errno) {
				$query = "SELECT * FROM db_project WHERE id =".$project.";";
				// $result haalt data uit tabel van databank
				$result=$conn->query($query);
				$object = $result->fetch_object();
				// fetch_object() zorgt er voor dat je $result wel kan zien.
			if (!empty($_POST)) {
				var_dump($_POST);
				$request = $_POST['request'];
				$userid = $_SESSION['loggedin_userid'];
				$query = "INSERT INTO db_request (request,id_user,id_project) VALUES ('".$conn->real_escape_string($request)."','".$userid."','".$project."')";
				if ($conn->query($query)){
					echo $request;
					echo " ";
					echo $userid;
					echo " ";
					echo $project;
				}
				else
				{
					echo "Request could not be added to the db";
				}
			}
			}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<!-- Bootstrap CSS & Theme -->
		<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
		<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>
		<link rel="stylesheet" href="../css/screen.css">
		<title>PHP Hub</title>
	</head>
	<body>
		<?php
		
		/* This loads the header - error occurs when file isn't found */
		require_once('header.php');
		?>
		<div class="container">
			<div class="jumbotron">
				
				<h1 class="title"><?php echo $object->project_name; ?><small><?php echo $object->project_company; ?></small></h1>
				<div class="imgcontainer"><img src="http://placehold.it/960x540"/></div>
				<h2 class="description2"><?php echo $object->project_description; ?></h2>
			</div>
			<?php if (isset($_SESSION['loggedin_user'])): ?>
			<form action="" method="POST">
				<input type="text" name="request" id="request">
				<button type="submit" name="submit">Request</button>
			</form>
			<?php else: ?>
			<a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
			<?php endif; ?>
			<?php if (!$conn->connect_errno) {
							$query = "SELECT * FROM db_request WHERE id_project =".$project.";";
							// $result haalt data uit tabel van databank
							$result=$conn->query($query);
							while ($i=$result->fetch_object()) {
								$queryTwo ="SELECT db_users.nickname FROM db_users INNER JOIN db_request ON db_users.id=db_request.id_user WHERE db_request.id_user=".$i->id_user.";";
								//Selecteer nickname uit databank users van databank users en voeg deze samen met databank request op basis 
								//van id uit databank users welke overeenstemt met user id uit databank request waarbij de user id uit
								//databank request gelijk is aan de user id uit object i.
								$resultTwo=$conn->query($queryTwo);
								$objectTwo=$resultTwo->fetch_object();
								echo '<button type="button" name="upvote" class="glyphicon glyphicon-triangle-top">'.
								'</button>'.
								'<button type="button" name="downvote" class="glyphicon glyphicon-triangle-bottom">'.
								'</button>'.
								'<div class="pasnel panel-default">'.
								'<div class="panel-heading">'.
								'<h3 class="panel-title">'.
								$objectTwo->nickname.
								'</h3>'.
								'</div>'.
								'<div class="panel-body">'.
								$i->request.
								'</div>'.
								'</div>';
							}
			}
			?>
			
		<!-- jQuery -->
		<script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
		<!-- Bootstrap JS -->
		<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
	</body>
</html>