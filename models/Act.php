<?php
	class Act {
		
		// Variables
		public $id_act		= null;
		public $name		= "";
		public $description = "";
		public $url_cover 	= "";
		public $url_video 	= "";

		// Constructor
		function __construct($id_act = null) {
			if (!is_null($id_act)) {
				$this->load($id_act);
			}
		}

		// Get/Set values
		private function load($id_act) {
			global $mysqli;								// Include database

			// Search database
			$result = mysqli_query($mysqli, "SELECT * FROM act WHERE id_act = {$id_act}");

			// Found an item?
			if (mysqli_num_rows($result) == 1) {
				$act = mysqli_fetch_array($result);		// Get data

				// Fill the data into variables
				$this->id_act	 	= $id_act;
				$this->name 		= $act['name'];	
				$this->description 	= $act['description'];			
				$this->url_cover 	= $act['cover_url'];
				$this->url_video 	= $act['video_url'];
			}	

			else {
				// Error
				throw new Exception("Can't find act with ID " . $id_act . ".");
				
			}		
		}

		// Get name where value is ID
		public function getName($id) {
			$_Act = new Act($id);			// Use the load function with sended data
			$return = $_Act->name;			// Get the requested value
			return $return;					// Send back
		}

		// Get description where value is ID
		public function getDescription($id) {
			$_Act = new Act($id);			// Use the load function with sended data
			$return = $_Act->description;	// Get the requested value
			return $return;					// Send back		
		}

		// Get cover where value is ID
		public function getCover($id) {
			$_Act = new Act($id);			// Use the load function with sended data
			$return = $_Act->url_cover;		// Get the requested value
			return $return;					// Send back			
		}

		// Get video where value is ID
		public function getVideo($id) {
			$_Act = new Act($id);			// Use the load function with sended data
			$return = $_Act->url_video;		// Get the requested value
			return $return;					// Send back
		}

		public function save() {
			global $mysqli;

			// Enter checked input values
			$this->name = htmlentities(html_entity_decode($this->name, ENT_QUOTES), ENT_QUOTES);
			$this->description = htmlentities(html_entity_decode($this->description, ENT_QUOTES), ENT_QUOTES);
			$this->url_cover = htmlentities(html_entity_decode($this->url_cover, ENT_QUOTES), ENT_QUOTES);
			$this->url_video = htmlentities(html_entity_decode($this->url_video, ENT_QUOTES), ENT_QUOTES);
		
			// Check if everyting is filled in
			if (strlen($this->name) > 0 && strlen($this->description) > 0 && strlen($this->url_cover) > 0 && strlen($this->url_video) > 0) {
				// Check if it is an existing or a new item
				if (empty($this->id_act)) {
					$SQL = "INSERT INTO `act` (`id_act`, `name`, `description`, `cover_url`, `video_url`) VALUES (NULL, '{$this->name}', '{$this->description}', '{$this->url_cover}', '{$this->url_video}')";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong while adding the new data!";
					}
				}

				else {
					$SQL = "UPDATE `act` SET `name` = '{$this->name}', `description` = '{$this->description}', `cover_url` = '{$this->url_cover}', `video_url` = '{$this->url_video}' WHERE `id_act` = '{$this->id_act}'";
					$Query 	= mysqli_query($mysqli, $SQL);

					if (!$Query) {
						echo "Something went wrong with updating the new information!<br>";
						echo "$SQL";
					}
				}
			}
		}
	}
?>