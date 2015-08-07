<?php ini_set('display_errors', 1); error_reporting(~0); ?>
<?php
	if (!empty($_POST)) {
		$project_name = $_POST['project_name'];
		$project_company = $_POST['project_company'];
		$project_description = $_POST['project_description'];
		$conn = new mysqli("localhost", "root", "root", "phphub");
		if (!$conn->connect_errno) {
		// bereidt de query voor, beschermt tegen SQL injectie (real_escape_string)
			$query = "INSERT INTO db_project (project_name, project_company, project_description) VALUES ('".$conn->real_escape_string($project_name)."','".$conn->real_escape_string($project_company)."','".$conn->real_escape_string($project_description)."')";
		// voert query uit op connectie, returned true of false. true = succesvol; false = onsuccesvol.
		// $conn->real_escape_string : voorkomen dat html input gerendered wordt. 
			if ($conn->query($query)) {
				header("Location: ../index.php");

			}
		}
	}
	echo "sdfjsdhf";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Project</title>
</head>
<body>
	<form action="" enctype="multipart/form-data" method="post">
		<label for="project_name">Name</label><input type="text" name="project_name" id="project_name">
		<label for="project_company">Company</label><input type="text" name"project_company" id="project_company">
		<label for="project_description">Description</label><textarea name="project_description" id="project_description" cols="30" rows="10"></textarea>
		<button type="submit">Submit</button>
	</form>
	<?php
	
	?>

</body>
</html>