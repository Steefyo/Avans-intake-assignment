<?php
	date_default_timezone_set('Europe/Amsterdam');	// Time stamp is required for the date()

	class Event {
		
		// Variables
		public $id_event	= null;
		public $event_name	= "";
		public $event_date	= "";

		// Constructor
		function __construct($id_event = null) {
			if (!is_null($id_event)) {
				$this->load($id_event);
			}
		}

		// Get/Set values
		private function load($id_event) {
			global $mysqli;								// Include database

			// Search database
			$result = mysqli_query($mysqli, "SELECT * FROM event WHERE id_event = {$id_event}");

			// Found an item?
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result);		// Get data

				// Fill the data into variables
				$this->id_event 	= $id_event;
				$this->event_name 	= $row['event_name'];
				$this->event_date 	= $row['event_date'];		

				// Create custom values
				$this->event_text_day 	= strtolower(date("l", strtotime($row['event_date'])));
				$this->event_text_date 	= date("l j F", strtotime($row['event_date']));
			}	

			else {
				// Error
				throw new Exception("Can't find event with ID " . $id_event . ".");
			}		
		}

		// Get Date in a special format where value is ID
		public function getDate($id) {
			$_Event = new Event($id);			// Use the load function with sended data
			$return = $_Event->event_text_date;	// Get the requested value
			return $return;						// Send back		
		}

		// Get Date in a special format where value is ID
		public function getDay($id) {
			$_Event = new Event($id);			// Use the load function with sended data
			$return = $_Event->event_text_day;	// Get the requested value
			return $return;						// Send back		
		}

		public function save() {
			global $mysqli;

			// Enter checked input values
			$this->event_name = htmlentities(html_entity_decode($this->event_name, ENT_QUOTES), ENT_QUOTES);
			$this->event_date = htmlentities(html_entity_decode($this->event_date, ENT_QUOTES), ENT_QUOTES);
		
			// Check if everyting is filled in
			if (strlen($this->event_date) > 0 && strlen($this->event_name) > 0) {
				// Check if it is an existing or a new item
				if (empty($this->id_event)) {
					$SQL = "INSERT INTO `event` (`id_event`, `event_date`, `event_name`) VALUES (NULL, '{$this->event_date}', '{$this->event_name}')";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong while adding the new data!";
					}
				}

				else {
					$SQL = "UPDATE `event` SET `event_date` = '{$this->event_date}', `event_name` = '{$this->event_name}' WHERE `id_event` = '{$this->id_event}'";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong with updating the new information!<br>";
					}
				}
			}
		}

	}
?>