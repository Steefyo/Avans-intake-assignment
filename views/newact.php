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
					<h3 class='bg-dark-grey'>You are currenty creating an new Act</h3>
					<div class='sunday bio padding-medium txt-white txt-left'>

						<form action='?validate=act' method='post'>
							<input type='hidden' id='id' name='id' value=''>
							<table style='width:100%;'>
								<tr>
									<td>Image</td>
									<td><input type='text' placeholder='Url cover' id='image' name='image' value=''></td>
								</tr>
								<tr>
									<td>Name</td>
									<td><input type='text' placeholder='Name' id='name' name='name' value=''></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea id='description' name='description' placeholder='Description' rows='10' style='resize:none;'></textarea></td>
								</tr>
								<tr>
									<td>Video</td>
									<td><input type='text' placeholder='Url video (embed)' id='video' name='video' value=''></td>
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