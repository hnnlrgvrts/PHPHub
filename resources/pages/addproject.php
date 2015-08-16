<?php
if (!empty($_POST)) {
	// Get the filled in values
	$project_name = $_POST['project_name'];
	$project_company = $_POST['project_company'];
	$project_description = $_POST['project_description'];
	$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
	$target_dir = "uploads/"; //where files get stored.
	$target_file  = $target_dir.$project_name.$project_company.".".$imageFileType;
	//basename = Given a string containing the path to a file or directory, this function will return the trailing name component.
	$uploadOk = 1;
	print_r($_FILES);
	
	//Check if image file is an actual image.
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		var_dump($_FILES);
		if ($check !== false) {
			$uploadOk = 1;
		}
		else
		{
			$uploadOk = 0;
		}

	}
	
	// Allow certain file formats
	if($imageFileType != "png") {
	    echo "Sorry, only PNG are allowed.";
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

	//basename = Given a string containing the path to a file or directory, this function will return the trailing name component.
	// Set connection to db
	$conn = new mysqli("localhost", "root", "root", "phphub");
	
	if (!$conn->connect_errno) {
		// Prepare the query, protects from SQL injection (real_escape_string)
		$query = "INSERT INTO db_project (project_name, project_company, project_description) VALUES ('" . 
			$conn->real_escape_string($project_name) . "','" . 
			$conn->real_escape_string($project_company) . "','" . 
			$conn->real_escape_string($project_description) . "')";

		// Executes query on connection & returns true (= success) or false (= fail).
		// $conn->real_escape_string : prevent html input from being rendered.
		if ($conn->query($query)) {
			// header("Location: index.php");
		}
	}
}

?>

<div class="page-header">
	<h1>Add a new project</h1>
</div>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="project_name" class="col-sm-2 control-label">Project name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="project_name" placeholder="Project name" name="project_name">
		</div>
	</div>
	<div class="form-group">
		<label for="project_company" class="col-sm-2 control-label">Project company</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="project_company" placeholder="Project company" name="project_company">
		</div>
	</div>
	<div class="form-group">
		<label for="project_description" class="col-sm-2 control-label">Project description</label>
		<div class="col-sm-10">
			<textarea id="project_description" name="project_description" class="form-control" placeholder="Project description" rows="5"></textarea>
		</div>
	</div>
	<div class="form-group">
	<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload" class="col-sm-2 control-label">Select image</label>
    <div class="col-sm-offset-2 col-sm-10">
    <input type="file" name="fileToUpload" id="fileToUpload"></div></div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Add project</button>
		</div>
	</div>
	
   
</form>
</form>