<?php
	class EventController {
		
		public function index()	{
			global $mysqli;										// Include database

			// Get all event data from the database
			$db_events = mysqli_query($mysqli, "SELECT id_event FROM event ORDER BY event_date ASC");
			if (mysqli_num_rows($db_events) != 0) {				// Are there values in the database?
				$events = Array();								// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_events)) {	// Push data into the Array
					$events[] = new Event($row["id_event"]);	// Create data based on the Model
				}
			}

			// Get all stage data from the database
			$db_stages = mysqli_query($mysqli, "SELECT id_stage FROM stage ORDER BY id_stage ASC");
			if (mysqli_num_rows($db_stages) != 0) {				// Are there values in the database?
				$stages = Array();								// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_stages)) {	// Push data into the Array
					$stages[] = new Stage($row["id_stage"]);	// Create data based on the Model
				}
			}

			// Get all act data from the database
			$db_acts = mysqli_query($mysqli, "SELECT id_act FROM act ORDER BY id_act ASC");
			if (mysqli_num_rows($db_acts) != 0) {				// Are there values in the database?
				$acts = Array();								// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_acts)) {	// Push data into the Array
					$acts[] = new Act($row["id_act"]);			// Create data based on the Model
				}
			}

			// Get all planning item data from the database
			$db_planning = mysqli_query($mysqli, "SELECT id_planning FROM planning ORDER BY id_planning ASC");
			if (mysqli_num_rows($db_planning) != 0) {				// Are there values in the database?
				$planning = Array();								// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_planning)) {	// Push data into the Array
					$planning[] = new Planning($row["id_planning"]);// Create data based on the Model
				}
			}

			include 'views/eventlist.php';						// Add view
		}

		public function showAct($id)	{
			global $mysqli;											// Include database

			// Get all act data from the database where ID = value
			$db_acts_all = mysqli_query($mysqli, "SELECT id_act FROM act ORDER BY name ASC");
			if (mysqli_num_rows($db_acts_all) > 0) {					// Is there data
				$acts = Array();									// Create Array
				while ($row = mysqli_fetch_array($db_acts_all)) {		// Push data into the Array
					$acts[] = new Act($row["id_act"]);			// Create data based on the Model
				}
			}

			// Get all act data from the database where ID = value
			$db_acts = mysqli_query($mysqli, "SELECT * FROM planning WHERE id_planning = {$id}");
			if (mysqli_num_rows($db_acts) > 0) {					// Is there data
				$act_solo = Array();									// Create Array
				while ($row = mysqli_fetch_array($db_acts)) {		// Push data into the Array
					$act_solo[] = new Planning($row["id_planning"]);			// Create data based on the Model
				}
				include 'views/showact.php';						// Add view
			}

			else {
				header("Location:index.php");						// Can't find the act
			}
		}

		public function edit($type, $id)	{
			global $mysqli;											// Include database

			// Check data if it's necessary to get a single value or all the data from that specific item

			if ($type == "event") {
				$db_events = mysqli_query($mysqli, "SELECT * FROM event WHERE id_event = {$id}");
			} else {
				$db_events = mysqli_query($mysqli, "SELECT id_event FROM event ORDER BY event_date ASC");
			}
			if (mysqli_num_rows($db_events) != 0) {					// Are there values in the database?
				$events = Array();									// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_events)) {		// Push data into the Array
					$events[] = new Event($row["id_event"]);		// Create data based on the Model
				}
				if ($type == "event") {
					include 'views/editevent.php';					// Add view
				}
			}

			if ($type == "stage") {
				$db_stages = mysqli_query($mysqli, "SELECT * FROM stage WHERE id_stage = {$id}");
			} else {
				$db_stages = mysqli_query($mysqli, "SELECT id_stage FROM stage ORDER BY name ASC");
			}
			if (mysqli_num_rows($db_stages) != 0) {					// Are there values in the database?
				$stages = Array();									// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_stages)) {		// Push data into the Array
					$stages[] = new Stage($row["id_stage"]);		// Create data based on the Model
				}
				if ($type == "stage") { 
					include 'views/editstage.php';					// Add view
				}
			}

			// Check all or solo value
			if ($type == "act") {
				$db_acts = mysqli_query($mysqli, "SELECT * FROM act WHERE id_act = {$id}");
			} else {
				$db_acts = mysqli_query($mysqli, "SELECT id_act FROM act ORDER BY name ASC");
			}
			if (mysqli_num_rows($db_acts) != 0) {					// Are there values in the database?
				$acts = Array();									// Make an Array for all the values
				while ($row = mysqli_fetch_array($db_acts)) {		// Push data into the Array
					$acts[] = new Act($row["id_act"]);				// Create data based on the Model
				}
				if ($type == "act") {
					include 'views/editact.php';					// Add view
				}
			}

			// This is the last option so there is no need to check all the items
			if ($type == "planning") {
				$db_plannings = mysqli_query($mysqli, "SELECT * FROM planning WHERE id_planning = {$id}");
				if (mysqli_num_rows($db_plannings) > 0) {					// Is there data
					$plannings = Array();									// Create Array
					while ($row = mysqli_fetch_array($db_plannings)) {		// Push data into the Array
						$plannings[] = new Planning($row["id_planning"]); 	// Create data based on the Model
					}
					include 'views/editplanning.php';						// Add view
				}
			} else {
				header("Location:index.php");								// Type or ID is incorrect
			}
		}

		public function delete($type, $id)	{
			global $mysqli;											// Include database

			// Search in the corresponding database

			if ($type == 'event') {
				$result = mysqli_query($mysqli, "DELETE FROM `planner`.`event` WHERE `event`.`id_event` = {$id}");
			}
			if ($type == 'stage') {
				$result = mysqli_query($mysqli, "DELETE FROM `planner`.`stage` WHERE `stage`.`id_stage` = {$id}");
			}
			if ($type == 'act') {
				$result = mysqli_query($mysqli, "DELETE FROM `planner`.`act` WHERE `act`.`id_act` = {$id}");
			}
			if ($type == 'planning') {
				$result = mysqli_query($mysqli, "DELETE FROM `planner`.`planning` WHERE `planning`.`id_planning` = {$id}");
			}

			if ($result) {						// Did it work?
				header("Location: index.php");	// It worked
				exit;
			} else {
				echo "An error occured in the deleting phase!";
			}
		}

		public function newItem($type)	{
			global $mysqli;											// Include database

			// Make the create page for corresponding data (include database values if necessary)

			if ($type == "event") {
				include 'views/newevent.php';	// Add view
			}

			if ($type == "stage") {
				include 'views/newstage.php';	// Add view
			}

			if ($type == "act") {
				include 'views/newact.php';		// Add view
			}

			if ($type == "planning") {
				// Get all act data from the database
				$db_acts = mysqli_query($mysqli, "SELECT id_act FROM act ORDER BY name ASC");
				if (mysqli_num_rows($db_acts) != 0) {				// Are there values in the database?
					$acts = Array();								// Make an Array for all the values
					while ($row = mysqli_fetch_array($db_acts)) {	// Push data into the Array
						$acts[] = new Act($row["id_act"]);			// Create data based on the Model
					}
				}

				// Get all event data from the database
				$db_events = mysqli_query($mysqli, "SELECT id_event FROM event ORDER BY event_date ASC");
				if (mysqli_num_rows($db_events) != 0) {				// Are there values in the database?
					$events = Array();								// Make an Array for all the values
					while ($row = mysqli_fetch_array($db_events)) {	// Push data into the Array
						$events[] = new Event($row["id_event"]);	// Create data based on the Model
					}
				}

				// Get all stage data from the database
				$db_stages = mysqli_query($mysqli, "SELECT id_stage FROM stage ORDER BY name ASC");
				if (mysqli_num_rows($db_stages) != 0) {				// Are there values in the database?
					$stages = Array();								// Make an Array for all the values
					while ($row = mysqli_fetch_array($db_stages)) {	// Push data into the Array
						$stages[] = new Stage($row["id_stage"]);	// Create data based on the Model
					}
				}
					
				include 'views/newplanning.php';					// Add view
			}

			else {
				return false;										// Type does not exist
			}
		}

		public function login()	{
			include 'views/login.php';			// Add view
		}

		public function logout() {
			session_start();					// Start session
			session_destroy();					// Destroy session
			header("Location:index.php");		// Return back
		}

		public function validate($type)	{
			global $mysqli;											// Include database

			if ($type == 'event') {
				// Check input
				$_id	= mysqli_real_escape_string($mysqli, $_REQUEST['id']);
				$_name 	= mysqli_real_escape_string($mysqli, $_REQUEST['name']);
				$_date 	= mysqli_real_escape_string($mysqli, $_REQUEST['date']);

				// Are the fields filled in?
				if (!empty($_name) && !empty($_date)) {
					// Create object
					$_Event = new Event();
					$_Event->id_event 	= $_id;		// If id is empty create else update (in model)
					$_Event->event_name = $_name;
					$_Event->event_date = $_date;
					$_Event->save();				// Execute

					header("Location:index.php");	// Return back
				}
			}

			if ($type == 'stage') {
				// Check input
				$_id			= mysqli_real_escape_string($mysqli, $_REQUEST['id']);
				$_name 			= mysqli_real_escape_string($mysqli, $_REQUEST['name']);
				$_description 	= mysqli_real_escape_string($mysqli, $_REQUEST['description']);

				// Are the fields filled in?
				if (!empty($_name) && !empty($_description)) {
					// Create object
					$_Stage = new Stage();
					$_Stage->id_stage 	= $_id;		// If id is empty create else update (in model)
					$_Stage->name 		= $_name;
					$_Stage->description= $_description;
					$_Stage->save();				// Execute

					header("Location:index.php");	// Return back
				}
			}

			if ($type == 'act') {
				// Check input
				$_id			= mysqli_real_escape_string($mysqli, $_REQUEST['id']);
				$_image 		= mysqli_real_escape_string($mysqli, $_REQUEST['image']);
				$_name 			= mysqli_real_escape_string($mysqli, $_REQUEST['name']);
				$_description 	= mysqli_real_escape_string($mysqli, $_REQUEST['description']);
				$_video 		= mysqli_real_escape_string($mysqli, $_REQUEST['video']);

				// Are the fields filled in?
				if (!empty($_image) && !empty($_name) && !empty($_description) && !empty($_video)) {
					// Create object
					$_Act = new Act();
					$_Act->id_act 		= $_id;		// If id is empty create else update (in model)
					$_Act->url_cover 	= $_image;
					$_Act->name 		= $_name;
					$_Act->description 	= $_description;
					$_Act->url_video 	= $_video;
					$_Act->save();				// Execute

					header("Location:index.php");	// Return back
				}
			}

			if ($type == 'planning') {
				// Check input
				$_id			= mysqli_real_escape_string($mysqli, $_REQUEST['id']);
				$_name 			= mysqli_real_escape_string($mysqli, $_REQUEST['name']);
				$_date 			= mysqli_real_escape_string($mysqli, $_REQUEST['date']);
				$_time_start 	= mysqli_real_escape_string($mysqli, $_REQUEST['time_start']);
				$_time_end 		= mysqli_real_escape_string($mysqli, $_REQUEST['time_end']);
				$_stage 		= mysqli_real_escape_string($mysqli, $_REQUEST['stage']);

				// Are the fields filled in?
				if (!empty($_name) && !empty($_date) && !empty($_time_start) && !empty($_time_end) && !empty($_stage)) {
					// Create object
					$_Planning = new Planning();
					$_Planning->id_planning = $_id;		// If id is empty create else update (in model)
					$_Planning->id_act 		= substr($_name, 1, -1);
					$_Planning->id_event 	= substr($_date, 1, -1);
					$_Planning->time_start 	= $_time_start;
					$_Planning->time_end 	= $_time_end;
					$_Planning->id_stage 	= substr($_stage, 1, -1);
					$_Planning->save();				// Execute

					header("Location:index.php");	// Return back
				}
			}

			if ($type == 'login') {
				// Check input
				$_username = mysqli_real_escape_string($mysqli, $_REQUEST['username']);
				$_password = mysqli_real_escape_string($mysqli, $_REQUEST['password']);

				// Check if there is data
				if (strlen($_username) > 0 && strlen($_password) > 0) {
					$_password = md5($_password);

					// Check in database
					$query = "SELECT * FROM user WHERE username = '$_username' AND password = '$_password'";
					$result = mysqli_query($mysqli, $query);
					if (mysqli_num_rows($result) == 1) {		// If exist
						session_start();						// Start login session
						$_SESSION['username'] = $_username;		// Set username as session
						header("Location:index.php");		// Return back
					}
					else {
						// Login incorrect
						echo '<script language="javascript">Username or Password incorrect!</script>';
						header("Location:index.php?login");
						exit;
					}
				}
				else {
					echo "Not all fields have been filled in!";
					exit;
				}
			}
		}
	}
?>