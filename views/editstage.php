<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Stage</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="format-detection" content="telephone=no">
	    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">    
	</head>
  
  	<body> 
		
		<?php include 'include/menu-secure.php'; ?>

		<div id="main-info">
			<?php
				if (count($stages) > 0) {
					foreach ($stages as $stage) {
						echo "<section id='header' class='sunday bg-no-repeat bg-cover '>";
							echo "<div class='bg wave-large-full-black-large bg-bottom bg-repeat-x top-padding'>";
								echo "<div class='inner-content wide'>";
									echo "<figure>";
										
									echo "</figure>";
								echo "</div>";
						echo "</section>";
						
						echo "<section id='content' class='bg-black'>";
							echo "<div class='inner-content large lift'>";
								echo "<h3 class='bg-dark-grey'>You are currenty editing an Stage with ID " . $stage->id_stage . "</h3>";
								echo "<div class='sunday bio padding-medium txt-white txt-left'>";

									echo "<form action='?validate=stage' method='post'>";

										echo "<input type='hidden' name='id' value='" . $stage->id_stage . "'>";

										echo "<table style='width:100%;'>";
											echo "<tr>";
												echo "<td>Name</td>";
												echo "<td><input type='text' placeholder='Name' name='name' value='" . $stage->name . "'></td>";
											echo "</tr>";
											echo "<tr>";
												echo "<td>Description</td>";
												echo "<td><textarea name='description' placeholder='Description' rows='10' style='resize:none;'>" . $stage->description . "</textarea></td>";
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