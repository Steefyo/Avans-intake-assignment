<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Act</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="format-detection" content="telephone=no">
	    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">    
	</head>
  
  	<body> 
		
		<?php include 'include/menu.php'; ?>

		<div id="main-info">
			<?php
				if (count($act_solo) > 0) {
					foreach ($act_solo as $act) {
						echo "<section id='header' class='" . $act->event_day . " bg-no-repeat bg-cover '>";
							echo "<div class='bg wave-large-full-black-large bg-bottom bg-repeat-x top-padding'>";
								echo "<div class='inner-content wide'>";
									echo "<figure>";
										echo "<img src='" . $act->url_cover . "'>";
										echo "<div class='inner wave-large-full-black-small bg-repeat-x bg-bottom'></div>";
									echo "</figure>";

									echo "<div class='content'>";
										echo "<div class='inner'>";
											echo "<h3 class='bg-dark-grey'><a href='index.php'>Act</a></h3>";
											echo "<div class='clear'></div>";
											echo "<h1 class='bg-black'>" . $act->name . "</h1>";
											echo "<div class='clear'></div>";
											echo "<h5 class='bg-dark-grey'>" . $act->event_date . "</h5>";
											echo "<div class='clear'></div>";
											echo "<h5 class='bg-dark-grey " . $act->event_day . "'>" . $act->time_start . " - " . $act->time_end . "</span> | " . $act->stage_name . "</h5>";
											echo "<div class='clear'></div>";
										echo "</div>";
									echo "</div>";
									echo "<div class='clear'></div>";
								echo "</div>";
							echo "</div>";
						echo "</section>";

						echo "<section id='content' class='bg-black'>";
							echo "<div class='inner-content large lift'>";
								echo "<div class='" . $act->event_day . " bio padding-medium txt-white txt-left'>";
									echo "<p>" . $act->description . "</p>";
								echo "</div>";

								echo "<div class='" . $act->event_day . " video'>";
									echo "<div class='embed-container'>";
										echo "<iframe width='854' height='480' src='" . $act->url_video . "' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen=''></iframe>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</section>";

						echo "<section id='more-acts' class='bg-black bg-footer bg-bottom bg-repeat-x'>";
							echo "<div class='inner-content wide padding-normal'>";
								
								if ($act->id_act > 1) {
									echo "<a href='?planning=" . ($act->id_planning - 1) . "' style='font-size:20px; background-color:#ec008c; cursor:pointer; color:#fff; margin:auto; border-radius:500px; border:0; padding:20px;'>Previous Planning item</a>";
								}

								if ($act->id_act < $act->getTotalItems()) {
									echo " ";
									echo "<a href='?planning=" . ($act->id_planning + 1) . "' style='font-size:20px; background-color:#ec008c; cursor:pointer; color:#fff; margin:auto; border-radius:500px; border:0; padding:20px;'>Next Planning item</a>";
								}
							echo "</div>";
						echo "</section>";
					}
				}
			?>

		</div>

	   	<?php include 'include/footer.php'; ?>

	</body>
</html>