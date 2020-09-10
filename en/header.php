<?php

	echo"<header class='default-header'>";
		echo"<div class='container'>";
			echo"<div class='header-wrap'>";
				echo"<div class='header-top d-flex justify-content-between align-items-center'>";
					echo"<div class='logo'>";
						echo"<a href='index.html'><img src='img/logo.png' alt=''></a>";
					echo"</div>";
					echo"<div class='main-menubar d-flex align-items-center'>";
						echo"<nav class='hide'>";
							if ($language == 'english') {
								echo"<a href='index.php'>Index</a>";
								echo"<a href='../index.php'>Spanish/English</a>";
							}
							else{
								if($language == 'esp'){
									echo"<a href='index.php'>Inicio</a>";
									echo"<a href='en/index.php'>Español/Inglés</a>";							
								}	
							}				
						echo"</nav>";
						echo"<div class='menu-bar'><span class='lnr lnr-menu'></span></div>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
	echo"</header>";
?>