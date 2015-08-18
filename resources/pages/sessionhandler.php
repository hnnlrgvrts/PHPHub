<?php 
	$conn = new mysqli("localhost", "root", "root", "phphub");
	$query = "SELECT * FROM db_users WHERE nickname = '".$_SESSION['loggedin_user']."';";
	$result = $conn->query($query);
	
	$object = $result->fetch_object();
	$_SESSION['loggedin_userid'] = $object->id;
	
	header("Location: index.php");
?>