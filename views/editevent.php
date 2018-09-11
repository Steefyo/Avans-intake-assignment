<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Event</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="format-detection" content="telephone=no">
	    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">    
	</head>
  
  	<body> 
		
		<?php include 'include/menu-secure.php'; ?>

		<div id="main-info">
			<?php
				if (count($events) > 0) {
					foreach ($events as $event) {
						echo "<section id='header' class='sunday bg-no-repeat bg-cover '>";
							echo "<div class='bg wave-large-full-black-large bg-bottom bg-repeat-x top-padding'>";
								echo "<div class='inner-content wide'>";
									echo "<figure>";
										
									echo "</figure>";
								echo "</div>";
						echo "</section>";

						echo "<section id='content' class='bg-black'>";
							echo "<div class='inner-content large lift'>";
								echo "<h3 class='bg-dark-grey'>You are currenty editing an Event with ID " . $event->id_event . "</h3>";
								echo "<div class='" . $event->event_text_day . " bio padding-medium txt-white txt-left'>";

									echo "<form action='?validate=event' method='post'>";

										echo "<input type='hidden' id='id' name='id' value='" . $event->id_event . "'>";

										echo "<table style='width:100%;'>";
											echo "<tr>";
												echo "<td>Name</td>";
												echo "<td><input type='text' placeholder='Name' name='name' value='" . $event->event_name . "'></td>";
											echo "</tr>";
											echo "<tr>";
												echo "<td>Date</td>";
												echo "<td><input type='date' name='date' value='" . $event->event_date . "' style='width:100%; padding:20px; font-size: 16px;'></td>";
											echo "</tr>";
											
											echo "<tr>";
												echo "<td></td>";
												echo "<td><input type='submit' name='submit' value='Update'> <a href='index.php' style='font-size:20px; background-color:#ec008c; cursor:pointer; color:#fff; margin:auto; border-radius:500px; border:0; padding:20px;'>Cancel</a></td>";
											echo "</tr>";

										echo "</table>";

									echo "</form>";

								echo "</div>";
							echo "</div>";
						echo "</section>";
					}
				}
			?>
		</div>

	   	<?php include 'include/footer.php'; ?>
	   	
	</body>
</html>