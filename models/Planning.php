<?php
	date_default_timezone_set('Europe/Amsterdam');	// Time stamp is required for the date()

	class Planning {
		
		// Variables
		public $id_planning = null;
		public $id_act		= null;
		public $id_event	= null;
		public $id_stage	= null;
		public $time_start 	= "";
		public $time_end 	= "";

		// Constructor
		function __construct($id_act = null) {
			if (!is_null($id_act)) {
				$this->load($id_act);
			}
		}

		private function load($id) {
			global $mysqli;	// Include database

			// Search database
			$db_planning = mysqli_query($mysqli, "SELECT * FROM planning WHERE id_planning = {$id}");

			// Found an item?
			if (mysqli_num_rows($db_planning) == 1) {
				// Get data
				$planning = mysqli_fetch_array($db_planning);

				// Fill the data into variables
				$this->id_planning	= $planning['id_planning'];

				$this->id_event 	= $planning['id_event'];
				
				// Use model 	// Run function from the model
				$_Event 			= new Event();
				$this->event_date 	= $_Event->getDate($planning['id_event']);
				$this->event_day 	= $_Event->getDay($planning['id_event']);
				
				$this->id_stage 	= $planning['id_stage'];		

				// Use model 	// Run function from the model
				$_Stage 			= new Stage();
				$this->stage_name 	= $_Stage->getName($planning['id_stage']);

				$this->id_act 		= $planning['id_act'];

				// Use model 	// Run function from the model
				$_Act 				= new Act();
				$this->name 		= $_Act->getName($planning['id_act']);
				$this->description 	= $_Act->getDescription($planning['id_act']);
				$this->url_cover 	= $_Act->getCover($planning['id_act']);
				$this->url_video 	= $_Act->getVideo($planning['id_act']);

				// Set in specific format (Hour : Minute)
				$this->time_start 	= date("H:i", strtotime($planning['time_start']));
				$this->time_end 	= date("H:i", strtotime($planning['time_end']));
			}	

			else {
				// Error
				throw new Exception("Can't find planning with ID " . $id_act . ".");
				
			}		
		}

		// Get Count all values
		public function getTotalItems() {
			global $mysqli;								// Include database

			// Search database
			$result = mysqli_query($mysqli, "SELECT * FROM planning");
			if (mysqli_num_rows($result) > 0) {
				return mysqli_num_rows($result);		// Return row count
			}
			
			else {
				// Error
				throw new Exception("Empty data table.");
			}
		}

		public function save() {
			global $mysqli;

			// Enter checked input values
			$this->id_act = htmlentities(html_entity_decode($this->id_act, ENT_QUOTES), ENT_QUOTES);
			$this->id_event = htmlentities(html_entity_decode($this->id_event, ENT_QUOTES), ENT_QUOTES);
			$this->time_start = htmlentities(html_entity_decode($this->time_start, ENT_QUOTES), ENT_QUOTES);
			$this->time_end = htmlentities(html_entity_decode($this->time_end, ENT_QUOTES), ENT_QUOTES);
			$this->id_stage = htmlentities(html_entity_decode($this->id_stage, ENT_QUOTES), ENT_QUOTES);

			// Check if everyting is filled in
			if (strlen($this->id_act) > 0 && strlen($this->id_event) > 0 && strlen($this->id_stage) > 0 && strlen($this->time_start) > 0 && strlen($this->time_end) > 0) {
				// Check if it is an existing or a new item
				if (empty($this->id_planning)) {
					$SQL = "INSERT INTO `planning` (`id_planning`, `id_act`, `id_event`, `id_stage`, `time_start`, `time_end`) VALUES (NULL, '{$this->id_act}', '{$this->id_event}', '{$this->id_stage}', '{$this->time_start}', '{$this->time_end}')";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong while adding the new data!";
					}
				}

				else {
					$SQL = "UPDATE `planning` SET `id_act` = '{$this->id_act}', `id_event` = '{$this->id_event}', `id_stage` = '{$this->id_stage}', `time_start` = '{$this->time_start}', `time_end` = '{$this->time_end}' WHERE `id_planning` = '{$this->id_planning}'";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong with updating the new information!<br>";
					}
				}

				echo $SQL;
			}
		}
	}
?>