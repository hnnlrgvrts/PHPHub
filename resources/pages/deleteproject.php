<?php
	$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
	echo "page loaded";
	if (!$conn->connect_errno) {
		echo "connection established";
		if(isset($_POST['inputid'])){
			echo 'post detected';
			$query = "DELETE FROM db_project WHERE id =".$_POST['inputid'].";";
			$result = $conn->query($query);
			if($result){
				echo "result true";
				header("Location:index.php");
			}
		}
	}