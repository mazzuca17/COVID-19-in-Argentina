<?php
		echo"<section class='service-area'>";
			echo"<div class='container-fluid'>";
				echo"<div class='row justify-content-start align-items-center'>";
					echo"<div class='col-lg-6 service-left'>";
						echo"<div class='row justify-content-center'>";
							echo"<div class='col-lg-8 col-sm-8 service-content '>";
								echo"<h2 class='text-white'>
								<span>Coronavirus</span><br>
								en Argentina.

							    </h2>";
								echo"<p>
									A continuación, se disponen todos los datos totales importantes sobre el 
									avance del Coronavirus
									COVID-19 en el país.
								</p>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
					echo"<div class='col-lg-6 service-right'>";
						echo"<div class='row'>";
							echo"<div class='col-lg-6 col-md-6 col-sm-6 single-services'>";
								echo"<h2>";
								$confirmados = $data[$j-1]['Cases'];
								echo $confirmados;
								echo"</h2>";
								echo"<p>
									Casos confirmados
								</p>";
							echo"</div>";
							echo"<div class='col-lg-6 col-md-6 col-sm-6 single-services'>";
								echo"<h2>";
									echo $total;
								echo"</h2>";
								echo"<p>
									Muertes
								</p>";
							echo"</div>";
							echo"<div class='col-lg-6 col-md-6 col-sm-6 single-services'>";
								echo"<h2>";
									echo $recuperadosT;
									$porciento = ($recuperadosT / ($confirmados - $total)) * 100;
									$mostrar_porciento = round($porciento, 2);
									echo" ("; echo $mostrar_porciento; echo" %)";
								echo"</h2>";
								echo"<p>Recuperados</p>";
							echo"</div>";
							echo"<div class='col-lg-6 col-md-6 col-sm-6 single-services'>";
								echo"<h2>";
								$casosActivos = $confirmados - $recuperadosT - ($total);
								$porciento_ca = ($casosActivos / ($confirmados - $total)) * 100;
								$show_p_ca = round($porciento_ca, 2);
								echo $casosActivos;
								echo" ("; echo $show_p_ca; echo" %)";
								echo"</h2>";
								echo"<p>
									Casos activos
								</p>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</section>";
?>