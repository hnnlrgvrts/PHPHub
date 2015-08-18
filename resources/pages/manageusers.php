<?php
	$conn = new mysqli("localhost", "root", "root", "phphub"); // Establish connection
	
	if (!$conn->connect_errno) {
		//Check if one of the buttons has been clicked
		if(isset($_POST['make_normal']) || isset($_POST['make_mod']) || isset($_POST['make_admin'])) {
			//Set which role to switch to depending on the clicked button.
			//-1 is default for easy recognition
			$user_role = -1;
			if(isset($_POST['make_normal'])) {
				$user_role = 0;
			}
			if(isset($_POST['make_mod'])) {
				$user_role = 2;
			}
			if(isset($_POST['make_admin'])) {
				$user_role = 1;
			}

			//Double check if a button has been clicked and a role has been set
			if($user_role !== -1) {
				//Update the DB record for this user
				$query = "UPDATE db_users SET role = " . $user_role . " WHERE id = " . $_POST['userid'] . ";";
				// var_dump($query);

				$result = $conn->query($query);
				// var_dump($result);
				
				if($result) {
					// If the update succeeded, refresh the page to make the changes appear or redirect to homepage if the current user lost his privileges
					var_dump($_SESSION);
					if($_POST['userid'] == $_SESSION['loggedin_userid'] && $user_role !== 1) {
						$_SESSION['loggedin_role'] = $user_role;
						header("Location: index.php");
					} else {
						header("Refresh:0");
					}
				}
			}
		}
	}
?>

<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<?php
		$conn = new mysqli("localhost", "root", "root", "phphub");
		
		if (!$conn->connect_errno && $_SESSION['loggedin_role'] == 1) {
			// Connection is ok
			$query = "SELECT * FROM db_users;";

			// $result fetches data from the table of the database 
			$result=$conn->query($query);        

			echo "<table class='table table-hover table-manage-users'>
					<thead>
						<tr>
							<th>Nickname</th>
							<th>E-mail</th>
							<th>Role</th>
							<th>Change role to</th>
						</tr>
					</thead>
					<tbody>";

			while ($i=$result->fetch_object()) {
				//Display the role in a human readable format
				$role = "";
				switch($i->role) {
					case 0:
						$role = "Normal user";
						break;
					case 1:
						$role = "Administrator";
						break;
					case 2:
						$role = "Moderator";
						break;
				}

				//Check what role this user has, and disable buttons accordingly.
				// User permissions are:
				// User < Moderator < Administrator
				$normal_disable = ($i->role == 0? 'disabled="disabled"' : '');
				$mod_disable = ($i->role == 2? 'disabled="disabled"' : '');
				$admin_disable = ($i->role == 1? 'disabled="disabled"' : '');

				echo '<tr>
						<td>' . $i->nickname . '</td>
						<td>' . $i->email . '</td>
						<td>' . $role . '</td>
						<td>
							<form action="" method="post">
								<button name="make_normal" class="btn btn-default" ' . $normal_disable . '>Normal user</button>
								<button name="make_mod" class="btn btn-default" ' . $mod_disable . '>Moderator</button>
								<button name="make_admin" class="btn btn-default" ' . $admin_disable . '>Administrator</button>
								<input type="hidden" name="userid" value="' . $i->id . '">
							</form>
						</td>
					  </tr>';
			}

			echo "	</tbody>
				  </table>";
		}
		?>
	</div>
</div>