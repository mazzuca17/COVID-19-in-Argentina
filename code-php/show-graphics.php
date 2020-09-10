<?php

	if ($language=='esp') {

		echo"<section class='banner-area relative'>";
			echo"<div class='container'>";
				echo"<div class='row fullscreen align-items-center justify-content-between' style='height: 735px;'>";
					echo"<div class='col-lg-12'>";
						echo"<div class='banner-content text-center'>";
							echo"<h1 class='text-white text-uppercase'>COVID-19 en Argentina</h1>";
						echo"</div>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</section>";

		echo"<section class='feature-area'>";
			echo"<div class='container'>";				
				echo"<figure class='highcharts-figure'>";
					echo"<div class='row justify-content-center'>";
						echo"<h2>Casos de COVID-19 en Argentina</h2>";
					echo"</div>";
					echo"<div id='container'></div>";
					echo"<p class='highcharts-description'>
						Este gráfico muestra el total de los casos y los casos que se registraron por día de 
						COVID-19 en Argentina.
						Para visualizar la información por día ponga el cursor sobre el punto del gráfico.
						Los casos más recientes se muestran a la derecha del gráfico.
					</p>";
					echo"</figure>";			
			echo"</div>";
			echo"<div class='container'>";				
				echo"<figure class='highcharts-figure'>";
					echo"<div class='row justify-content-center'>";
						echo"<h2>Fallecimientos por día por COVID-19 en Argentina</h2>";
					echo"</div>";
					echo"<div id='graphic2'></div>";
					echo"<p class='highcharts-description'>
						Este gráfico muestra los datos sobre los nuevos fallecimientos por 
						COVID-19 que se produjeron en Argentina por día.
						Para visualizar la información por día ponga el cursor sobre el punto del gráfico.
						Los casos más recientes se muestran a la derecha del gráfico.						
					</p>";
					echo"</figure>";			
			echo"</div>";
			echo"<div class='container'>";
				
				echo"<figure class='highcharts-figure'>";
					echo"<div class='row justify-content-center'>";
						echo"<h2>Recuperados por día por COVID-19 en Argentina</h2>";
					echo"</div>";
					echo"<div id='graphic3'></div>";
					echo"<p class='highcharts-description'>
						Este gráfico muestra los datos sobre los nuevos recuperados 
						por COVID-19 que se produjeron en Argentina por día.
						Para visualizar la información por día ponga el cursor sobre el punto del gráfico.
						Los casos más recientes se muestran a la derecha del gráfico.						
					</p>";
					echo"</figure>";			
			echo"</div>";
		echo"</section>";
	}
	else
	{
		echo"<section class='banner-area relative'>";
		echo"<div class='container'>";
				echo"<div class='row fullscreen align-items-center justify-content-between' style='height: 735px;'>";
					echo"<div class='col-lg-12'>";
						echo"<div class='banner-content text-center'>";
							echo"<h1 class='text-white text-uppercase'>COVID-19 in Argentina</h1>";
						echo"</div>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</section>";

		echo"<section class='feature-area'>";
			echo"<div class='container'>";
				
				echo"<figure class='highcharts-figure'>";
					echo"<div class='row justify-content-center'>";
						echo"<h2>COVID-19 cases in Argentina</h2>";
					echo"</div>";
					echo"<div id='container'></div>";
					echo"<p class='highcharts-description'>";
						echo"This graph shows the total cases and cases that were recorded per day of
						COVID-19 in Argentina.
						To display the information by day, place the cursor on the point of the graph.
						The most recent cases are shown to the right of the graph.";
					echo"</p>";
					echo"</figure>";			
			echo"</div>";
			echo"<div class='container'>";				
				echo"<figure class='highcharts-figure'>";
					echo"<div class='row justify-content-center'>";
						echo"<h2>";
							echo"Deaths per day from COVID-19 in Argentina";
						echo"</h2>";
					echo"</div>";

					echo"<div id='graphic2'></div>";
					echo"<p class='highcharts-description'>
					This graph shows data on new deaths by
					COVID-19 that were produced in Argentina per day.
					To display the information by day, place the cursor on the point of the graph.
					The most recent cases are shown to the right of the graph
						
					</p>";
					echo"</figure>";		
			echo"</div>";
			echo"<div class='container'>";
				
				echo"<figure class='highcharts-figure'>";
					echo"<div class='row justify-content-center'>";
						echo"<h2>
							Recovered per day by COVID-19 in Argentina						
						</h2>";
					echo"</div>";
					echo"<div id='graphic3'></div>";
					echo"<p class='highcharts-description'>
					This graph shows data on newly recovered
					by COVID-19 that occurred in Argentina per day.
					To display the information by day, place the cursor on the point of the graph.
					The most recent cases are shown to the right of the graph.						
					</p>";
					echo"</figure>";			
			echo"</div>";
		echo"</section>";
	}

?>