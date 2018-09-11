<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Planning item</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="format-detection" content="telephone=no">
	    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">    
	</head>
  
  	<body> 
		
		<?php include 'include/menu-secure.php'; ?>

		<div id="main-info">
			<section id='header' class='sunday bg-no-repeat bg-cover '>
				<div class='bg wave-large-full-black-large bg-bottom bg-repeat-x top-padding'>
					<div class='inner-content wide'>
						<figure>
							
						</figure>
					</div>
			</section>

			<section id='content' class='bg-black'>
				<div class='inner-content large lift'>
					<h3 class='bg-dark-grey'>You are currenty creating an new Planning item</h3>
					<div class='sunday bio padding-medium txt-white txt-left'>

						<form action='?validate=planning' method='post'>
							<input type='hidden' id='id' name='id' value=''>
							<table style='width:100%;'>
								<tr>
									<td>Name</td>
									<td>
										<select id='name' name='name' style='width:100%; padding:20px; font-size: 16px;'>
											<?php
												if (count($acts) > 0) {
													foreach ($acts as $act) {
														echo "<option value='{" . $act->id_act . "}'>" . $act->name . "</option>";
													}
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Date</td>
									<td>
										<select id='date' name='date' style='width:100%; padding:20px; font-size: 16px;'>
											<?php
												if (count($events) > 0) {
													foreach ($events as $event) {
														echo "<option value='{" . $event->id_event . "}'>" . date("l j F", strtotime($event->event_date)) . "</option>";
													}
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Start time</td>
									<td><input type='time' placeholder='00:00' id='time_start' name='time_start' value='00:00' style='width:100%;'></td>
								</tr>

								<tr>
									<td>End time</td>
									<td><input type='time' placeholder='time' id='time_end' name='time_end' value='00:00' style='width:100%;'></td>
								</tr>
								<tr>
									<td>Stage</td>
									<td>
										<select id='stage' name='stage' style='width:100%; padding:20px; font-size: 16px;'>
											<?php
												if (count($stages) > 0) {
													foreach ($stages as $stage) {
														echo "<option value='{" . $stage->id_stage . "}'>" . $stage->name . "</option>";
													}
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type='submit' name='submit' value='Create'> <a href='index.php' style='font-size:20px; background-color:#ec008c; cursor:pointer; color:#fff; margin:auto; border-radius:500px; border:0; padding:20px;'>Cancel</a></td>
								</tr>
							</table>
						</form>

					</div>
				</div>
			</section>
		</div>

	   	<?php include 'include/footer.php'; ?>

	</body>
</html>