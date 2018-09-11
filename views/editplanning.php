<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Planning</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="format-detection" content="telephone=no">
	    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">    
	</head>
  
  	<body> 
		
		<?php include 'include/menu-secure.php'; ?>

		<div id="main-info">
			<?php
				if (count($plannings) > 0) {
					foreach ($plannings as $planning) {
						echo "<section id='header' class='sunday bg-no-repeat bg-cover '>";
							echo "<div class='bg wave-large-full-black-large bg-bottom bg-repeat-x top-padding'>";
								echo "<div class='inner-content wide'>";
									echo "<figure>";
										
									echo "</figure>";
								echo "</div>";
						echo "</section>";
						
						echo "<section id='content' class='bg-black'>";
							echo "<div class='inner-content large lift'>";
								echo "<h3 class='bg-dark-grey'>You are currenty editing an Planning item with ID " . $planning->id_act . "</h3>";
								echo "<div class='" . $planning->event_day . " bio padding-medium txt-white txt-left'>";

									echo "<form action='?validate=planning' method='post'>";

										echo "<input type='hidden' name='id' value='" . $planning->id_planning . "'>";

										echo "<table style='width:100%;'>";
											echo "<tr>";
												echo "<td>Name</td>";
												//echo "<td><input type='text' placeholder='Name' name='name' value='" . $planning->name . "'></td>";
												echo "<td>";
													echo "<select id='name' name='name' style='width:100%; padding:20px; font-size: 16px;'>";

														if (count($acts) > 0) {
															foreach ($acts as $act) {
																if ($act->name == $planning->name) {
																	echo "<option value='{" . $act->id_act . "}' selected='selected'>" . $act->name . "</option>";
																} else {
																	echo "<option value='{" . $act->id_act . "}'>" . $act->name . "</option>";
																}
															}
														}

													echo "</select>";
											echo "</tr>";
											echo "<tr>";
												echo "<td>Date</td>";
												echo "<td>";
													echo "<select id='date' name='date' style='width:100%; padding:20px; font-size: 16px;'>";

														if (count($events) > 0) {
															foreach ($events as $event) {
																if ($event->id_event == $planning->id_event) {
																	echo "<option value='{" . $event->id_event . "}' selected='selected'>" . date("l j F", strtotime($event->event_date)) . "</option>";
																} else {
																	echo "<option value='{" . $event->id_event . "}'>" . date("l j F", strtotime($event->event_date)) . "</option>";
																}
															}
														}

													echo "</select>";
												echo "</td>";
											echo "</tr>";
											echo "<tr>";
												echo "<td>Start time</td>";
												echo "<td><input type='time' placeholder='00:00'  id='time_start' name='time_start' value='" . $planning->time_start . "' style='width:100%;'></td>";
											echo "</tr>";

											echo "<tr>";
												echo "<td>End time</td>";
												echo "<td><input type='time' placeholder='time' id='time_end' name='time_end' value='" . $planning->time_end . "' style='width:100%;'></td>";
											echo "</tr>";
											echo "<tr>";
												echo "<td>Stage</td>";
												echo "<td>";
													echo "<select id='stage' name='stage' style='width:100%; padding:20px; font-size: 16px;'>";

														if (count($stages) > 0) {
															foreach ($stages as $stage) {
																if ($stage->id_stage == $planning->id_stage) {
																	echo "<option value='{" . $stage->id_stage . "}' selected='selected'>" . $stage->name . "</option>";
																} else {
																	echo "<option value='{" . $stage->id_stage . "}'>" . $stage->name . "</option>";
																}
															}
														}

													echo "</select>";
												echo "</td>";
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