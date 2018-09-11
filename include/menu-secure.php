<header class="">
	<div class="inner-content wide">
    	<div class="logo">
            <a href="index.php"><img src="images/logo.svg"></a>
        </div>
        <div class="date">
            <?php 
                require 'include/session.php';
                if (!empty($_SESSION['username'])) {
                    echo "<a href='?logout'><i class='fas fa-sign-out-alt'></i> Logout</a>";
                } else {
                    echo "<a href='?login'><i class='fas fa-sign-in-alt'></i> Login</a>";
                }
            ?>
		</div>
	</div>
</header>