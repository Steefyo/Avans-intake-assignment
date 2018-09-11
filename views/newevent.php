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
			<section id='header' class='sunday bg-no-repeat bg-cover '>
				<div class='bg wave-large-full-black-large bg-bottom bg-repeat-x top-padding'>
					<div class='inner-content wide'>
						<figure>
							
						</figure>
					</div>
			</section>

			<section id='content' class='bg-black'>
				<div class='inner-content large lift'>
					<h3 class='bg-dark-grey'>You are currenty creating an new Event</h3>
					<div class='sunday bio padding-medium txt-white txt-left'>

						<form action='?validate=event' method='post'>
							<input type='hidden' id='id' name='id' value=''>
							<table style='width:100%;'>
								<tr>
									<td>Name</td>
									<td><input type='text' placeholder='Name' id='name' name='name' value=''></td>
								</tr>
								<tr>
									<td>Date</td>
									<td><input type='Date' id='date' name='date' style='width:100%;'></td>
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