<?php
//If the form has been submitted
if (!empty($_POST)) {
	$salt = "DMIqsegmiF§MEIfjé2";
	$nickname = $_POST['nickname'];
	// cost tells hash engine how many times to repeat --> encrypt. x 12
	$options = [ 'cost' => 12,];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options); // php 5.5
	$email = $_POST['email'];
	
	$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
	var_dump($imageFileType);

	$target_dir = "uploads/avatars/av"; //where files get stored.
	$target_filename = "av" . $nickname . "." . $imageFileType;
	$target_file  = $target_dir.$nickname.".".$imageFileType;
	//basename = Given a string containing the path to a file or directory, this function will return the trailing name component.
	$uploadOk = 1;
	echo "end of vars";
	print_r($_FILES);
	
	//Check if image file is an actual image.
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		var_dump($_FILES);
		echo "into submit check";
		if ($check !== false) {
			$uploadOk = 1;
		}
		else
		{
			$uploadOk = 0;
		}

	}
	
	// Allow certain file formats
	if($imageFileType != "png" || $imageFileType != "jpg") {
	    echo "Sorry, only .png or .jpg are allowed.";
	    $uploadOk = 0;
	}

	if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        	echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
    	} else {
        	echo "Sorry, there was an error uploading your file.";
    	}
	}

	// connect with database
	$conn = new mysqli("localhost", "root", "root", "phphub");
	
	if (!$conn->connect_errno) {
		// prepare the query, protect against SQL injection (real_escape_string)
		$query = "INSERT INTO db_users (nickname, password, email, picture) VALUES ('".$conn->real_escape_string($nickname)."','".$password."','".$email."','" . $target_filename . "')";
		// execute query on connection, returns true/false. 
		// true = success, false = fail.
		// email & password has verification so these can not be rendered. Nickname can, however. 
		if ($conn->query($query)) {
			if (!isset($_SESSION['loggedin_user'])) {
				// Store session variables after successful registration (session has already been started in header.php).
				$_SESSION['loggedin_user'] = $nickname;
				$_SESSION['loggedin_role'] = 0;
				$_SESSION['loggedin_picture'] = $target_filename;
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
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
	<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload" class="col-sm-2 control-label">Select image</label>
    <div class="col-sm-offset-2 col-sm-10">
    <input type="file" name="fileToUpload" id="fileToUpload"></div></div>
    <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Sign up!</button>
		</div>
	</div>
</form>
</form>