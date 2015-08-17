<?php
	echo "loaded";
	$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
	if (!$conn->connect_errno) {
		if(isset($_POST['requestid'])){
			echo "post right";
			$query = "UPDATE db_request SET request = '".$_POST['newRequest']."' WHERE id =".$_POST['requestid'].";";
			$result = $conn->query($query);
			var_dump($query);
			if($result){
				header("Location:index.php?page=project&id=".$_POST['projectid']);
			}
		}
	} 