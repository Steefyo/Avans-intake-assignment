<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Events</title>
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	</head>
	<body>

		<?php include 'include/menu.php'; ?>

		<section id="acts" class="bg-fc-right bg-no-repeat top-padding bg-fixed archive">
			<div class="bg bg-repeat-x bg-bottom wave-large-full-black-large">
				<div class="inner-content wide padding-normal">
								
				<h1 class="section-title">Events</h1>
				<div id="filters" class="button-group txt-center">  
					<button class="button is-checked bg-pink" data-filter="*">All</button>
					<?php
						if (count($events) > 0) {
							foreach ($events as $event) {
								echo "<button class='button " . $event->event_text_day . "' data-filter='." . $event->event_text_day . "'>";
									echo $event->event_text_date;
									if (!empty($_SESSION['username'])) {
										echo "<a href='?type=event&edit=" . $event->id_event . "'><i class='fas fa-edit'></i></a><a href='?type=event&id=" . $event->id_event . "'><i class='fas fa-trash'></i></a>";
									}
								echo "</button>";
							}
						}

						if (!empty($_SESSION['username'])) {
							echo "<a href='?new=event'><button class='button is-checked bg-pink'><i class='fas fa-plus-circle'></i></button></a>";
						}
					?>
					
				</div>
				<div class="clear title"></div>

				<?php 
					if (!empty($_SESSION['username'])) {
						echo "<h1 class='section-title'>Stages</h1>";
						echo "<div id='filters' class='button-group txt-center'>";
							if (count($stages) > 0) {
								foreach ($stages as $stage) {
									echo "<button class='button sunday'>";
										echo $stage->name;
										echo "<a href='?type=stage&edit=" . $stage->id_stage . "'><i class='fas fa-edit'></i></a><a href='?type=stage&id=" . $stage->id_stage . "'><i class='fas fa-trash'></i></a>";
									echo "</button>";
								}
							}
							echo "<a href='?new=stage'><button class='button is-checked bg-pink'><i class='fas fa-plus-circle'></i></button></a>";
						echo "</div>";
						echo "<div class='clear title'></div>";


						echo "<h1 class='section-title'>Acts</h1>";
						echo "<div id='filters' class='button-group txt-center'>";
							if (count($acts) > 0) {
								foreach ($acts as $act) {
									echo "<button class='button saturday'>";
										echo $act->name;
										echo "<a href='?type=act&edit=" . $act->id_act . "'><i class='fas fa-edit'></i></a><a href='?type=act&id=" . $act->id_act . "'><i class='fas fa-trash'></i></a>";
									echo "</button>";
								}
							}
							echo "<a href='?new=act'><button class='button is-checked bg-pink'><i class='fas fa-plus-circle'></i></button></a>";
						echo "</div>";
						echo "<div class='clear title'></div>";
					}
				?>

				<h1 class="section-title">Planning</h1>
					<div class="grid">
						<div class="grid-sizer"></div>
						
						<?php
							if (count($planning) > 0) {
								foreach ($planning as $planning_solo) {
									echo "<a href='?planning=" . $planning_solo->id_planning . "'>";
										echo "<article class='grid-item " . $planning_solo->event_day . "'>";
											echo "<div class='inner bg-dark-grey'>";
												echo "<figure>";
													echo "<img src='" . $planning_solo->url_cover . "'>";
													echo "<div class='cover wave-small-full-dark-grey-small bg-bottom bg-repeat-x'></div>";
												echo "</figure>";

												echo "<div class='content'>";
													echo "<h3>" . $planning_solo->name . "</h3>";
													echo "<div class='divider'></div>";
													echo "<h5 class='rounded'>" . $planning_solo->event_date . "</h5>";
													echo "<div class='clear'></div>";
													echo "<h5 class='rounded " . $planning_solo->event_day . "'>";
														echo "<span class=''>" . $planning_solo->time_start . " - " . $planning_solo->time_end . "</span> | " . $planning_solo->stage_name;
													echo "</h5>";
													if (!empty($_SESSION['username'])) {
														echo "<a href='?type=planning&edit=" . $planning_solo->id_planning . "'><i class='fas fa-edit'></i></a> ";
														echo "<a href='?type=planning&id=" . $planning_solo->id_planning . "'><i class='fas fa-trash'></i></a>";
													}
												echo "</div>";
											echo "</div>";
										echo "</article>";
									echo "</a>";
								}
							}

							if (!empty($_SESSION['username'])) {
								echo "<a href='?new=planning'>";
									echo "<article class='grid-item none'>";
										echo "<div class='inner bg-dark-grey '>";
											echo "<figure>";
												echo "<img src='images/planning/new.png'>";
												echo "<div class='cover wave-small-full-dark-grey-small bg-bottom bg-repeat-x'></div>";
											echo "</figure>";

											echo "<div class='content'>";
												echo "<h3>New Planning item</h3>";
												echo "<div class='divider'></div>";
												echo "<h5 class='rounded'>Event date</h5>";
												echo "<div class='clear'></div>";
												echo "<h5 class='rounded none'>";
													echo "<span class=''>00:00 - 00:00</span> | Stage";
												echo "</h5>";
												echo "<a href='?new=planning'><i class='fas fa-plus-circle'></i></a>";
											echo "</div>";
										echo "</div>";
									echo "</article>";
								echo "</a>";
							}
						?>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</section>

		<?php include 'include/footer.php'; ?>

	</body>
</html>