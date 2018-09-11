<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <title>Login</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="format-detection" content="telephone=no">
	    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">    
	</head>
  
  	<body> 
		
		<?php include 'include/menu.php'; ?>

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
					<h3 class='bg-dark-grey'>Login</h3>
					<div class='sunday bio padding-medium txt-white txt-left'>

						<form action='?validate=login' method='post'>

							<table style='width:100%;'>
								<tr>
									<td>Username</td>
									<td><input type='text' placeholder='Username' id='username' name='username' required='required'></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type='password' placeholder='Password' id='password' name='password' required='required' style='width:100%; padding:20px; font-size: 16px;'></td>
								</tr>

								<tr>
									<td></td>
									<td><input type='submit' name='submit' value='Login'> <a href='index.php' style='font-size:20px; background-color:#ec008c; cursor:pointer; color:#fff; margin:auto; border-radius:500px; border:0; padding:20px;'>Cancel</a></td>
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