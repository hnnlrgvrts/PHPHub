<?php
	$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
	echo "page loaded";
	if (!$conn->connect_errno) {
		echo "connection established";
		if(isset($_POST['requestid'])){
			echo 'post detected';
			$query = "DELETE FROM db_request WHERE id =".$_POST['requestid'].";";
			$result = $conn->query($query);
			if($result){
				echo "result true";
				header("Location:index.php?page=project&id=".$_POST['projectid']);
			}
		}
	}
	