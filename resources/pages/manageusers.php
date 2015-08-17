<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<?php
		$conn = new mysqli("localhost", "root", "root", "phphub");
		
		if (!$conn->connect_errno && $_SESSION['loggedin_role'] == 1) {
			// Connection is ok
			$query = "SELECT * FROM db_users;";

			// $result fetches data from the table of the database 
			$result=$conn->query($query);        

			echo "<table class='table table-hover'>
					<thead>
						<tr>
							<th>ID</th>
							<th>Nickname</th>
							<th>E-mail</th>
							<th>Picture</th>
							<th>Role</th>
							<th>Admin</th>
							<th>Moderator</th>
						</tr>
					</thead>
					<tbody>";

			while ($i=$result->fetch_object()) {
				$role = "";
				switch($i->role) {
					case 0:
						$role = "Normal";
						break;
					case 1:
						$role = "Admin";
						break;
					case 2:
						$role = "Moderator";
						break;
				}
				echo '<tr>
						<td>' . $i->id . '</td>
						<td>' . $i->nickname . '</td>
						<td>' . $i->email . '</td>
						<td>' . $i->picture . '</td>
						<td>' . $role . '</td>';

				if($_SESSION['loggedin_role'] == 1) {
					$admin_disable = ($i->role == 1? 'disabled="disabled"' : '');
					$mod_disable = ($i->role == 2? 'disabled="disabled"' : '');
					echo '
						<td><button class="btn btn-default" ' . $admin_disable . '>Make this user an admin</button></td>
						<td><button class="btn btn-default" ' . $mod_disable . '>Make this user a moderator</button></td>';
				}
				echo '</tr>';
			}

			echo "	</tbody>
				  </table>";
		}
		?>
	</div>
</div>