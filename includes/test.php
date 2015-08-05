<?php
	$project = $_GET['id']; //Haalt id uit url.
	var_dump($project);
	$conn = new mysqli("localhost", "root", "root", "phphub");
	if (!$conn->connect_errno) {
		$query = "SELECT * FROM db_project WHERE id =".$project.";";
		// $result haalt data uit tabel van databank
		$result=$conn->query($query); 
		var_dump($result);
//		$object = $result->fetch_object(); 
		// fetch_object() zorgt er voor dat je $result wel kan zien.
		echo 	'<div class="col-xs-6 col-md-3">'.
				'<h1 class="title">'.$object->project_name.'</h1>'.
				'<a href="includes/project.php?id='.$object->id.'" class="thumbnail">'.
				'<img src="http://placehold.it/480x270" alt="'.$object->project_name.'" />'.
				'</a>'.'<div class="description">'.$object->project_description.'</div>'.'</div>';
	}
?>	