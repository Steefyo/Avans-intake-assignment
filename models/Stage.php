<?php
	class Stage {
		
		// Variables
		public $id_stage	= null;
		public $name		= "";
		public $description	= "";

		// Constructor
		function __construct($id_stage = null) {
			if (!is_null($id_stage)) {
				$this->load($id_stage);
			}
		}

		private function load($id_stage) {
			global $mysqli;	// Include database

			// Search database
			$result = mysqli_query($mysqli, "SELECT * FROM stage WHERE id_stage = {$id_stage}");

			// Found an item?
			if (mysqli_num_rows($result) == 1) {
				// Get data
				$row = mysqli_fetch_array($result);

				// Fill the data into variables
				$this->id_stage 	= $id_stage;
				$this->name 		= $row['name'];
				$this->description 	= $row['description'];		
			}	

			else {
				// Error
				throw new Exception("Can't find event with ID " . $id_stage . ".");
				
			}		
		}

		// Get name where value is ID
		public function getName($id) {
			$_Stage = new Stage($id);		// Use the load function with sended data
			$return = $_Stage->name;		// Get the requested value
			return $return;					// Send back	
		}

		public function save() {
			global $mysqli;

			// Enter checked input values
			$this->name = htmlentities(html_entity_decode($this->name, ENT_QUOTES), ENT_QUOTES);
			$this->description = htmlentities(html_entity_decode($this->description, ENT_QUOTES), ENT_QUOTES);
		
			// Check if everyting is filled in
			if (strlen($this->description) > 0 && strlen($this->name) > 0) {
				// Check if it is an existing or a new item
				if (empty($this->id_stage)) {
					$SQL = "INSERT INTO `stage` (`id_stage`, `description`, `name`) VALUES (NULL, '{$this->description}', '{$this->name}')";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong while adding the new data!";
					}
				}

				else {
					$SQL = "UPDATE `stage` SET `description` = '{$this->description}', `name` = '{$this->name}' WHERE `id_stage` = '{$this->id_stage}'";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong with updating the new information!<br>";
					}
				}
			}
		}
	}
?>