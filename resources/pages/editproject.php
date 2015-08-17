<?php
	$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
	echo "page loaded";
	if (!$conn->connect_errno) {
		echo "connection established";
		if(isset($_POST['titleinput'])){
			echo 'post detected';
			$query = "UPDATE db_project SET project_name = '".$_POST['titleinput']."', project_description = '".$_POST['descriptioninput']."' WHERE id =".$_POST['inputid'].";";
			$result = $conn->query($query);
			var_dump($query);
			if($result){
				echo "result true";
				header("Location:index.php?page=project&id=".$_POST['inputid']);
			}
		}
	}
?>