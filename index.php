<?php
	error_reporting(0);     
	$language = 'esp';
	include 'code-php/extraer-casos.php';
	include 'code-php/extraer-recuperados.php';
?>

<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<?php include 'components/head.php'; ?>
	</head>
	<body>
		<?php include 'components/header.php'; ?>

		<section class="banner-area relative">
			<div class="container">
				<div class="row fullscreen align-items-center justify-content-between" style="height: 735px;">
					<div class="col-lg-12">
						<div class="banner-content text-center">
							<h1 class="text-white text-uppercase">COVID-19 en Argentina</h1>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="feature-area">
			<div class="container">
				
				<figure class="highcharts-figure">
					<div class="row justify-content-center">
						<h2>Casos de COVID-19 en Argentina</h2>
					</div>
					<div id="container"></div>
					<p class="highcharts-description">
						Este gráfico muestra el total de los casos y los casos que se registraron por día de 
						COVID-19 en Argentina.
						Para visualizar la información por día ponga el cursor sobre el punto del gráfico.
						Los casos más recientes se muestran a la derecha del gráfico.
					</p>
					</figure>
			
			</div>
			<div class="container">
				
				<figure class="highcharts-figure">
					<div class="row justify-content-center">
						<h2>Fallecimientos por día por COVID-19 en Argentina</h2>
					</div>

					<div id="graphic2"></div>
					<p class="highcharts-description">
						Este gráfico muestra los datos sobre los nuevos fallecimientos por 
						COVID-19 que se produjeron en Argentina por día.
						Para visualizar la información por día ponga el cursor sobre el punto del gráfico.
						Los casos más recientes se muestran a la derecha del gráfico.
						
					</p>
					</figure>
			
			</div>
			<div class="container">
				
				<figure class="highcharts-figure">
					<div class="row justify-content-center">
						<h2>Recuperados por día por COVID-19 en Argentina</h2>
					</div>
					<div id="graphic3"></div>
					<p class="highcharts-description">
						Este gráfico muestra los datos sobre los nuevos recuperados 
						por COVID-19 que se produjeron en Argentina por día.
						Para visualizar la información por día ponga el cursor sobre el punto del gráfico.
						Los casos más recientes se muestran a la derecha del gráfico.
						
					</p>
					</figure>
			
			</div>
		</section>

		<section class="service-area">
			<div class="container-fluid">
				<div class="row justify-content-start align-items-center">
					<div class="col-lg-6 service-left">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-sm-8 service-content ">
								<h2 class="text-white">
								<span>Coronavirus</span><br>
								en Argentina.

							    </h2>
								<p>
									A continuación, se disponen todos los datos totales importantes sobre el 
									avance del Coronavirus
									COVID-19 en el país.
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 service-right">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php 
								$confirmados = $data[$j-1]['Cases'];
								echo $confirmados?>
								</h2>
								<p>
									Casos confirmados
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php 
									echo $total;
								?>
								</h2>
								<p>
									Muertes
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php 
									echo $recuperadosT;
									$porciento = ($recuperadosT / ($confirmados - $total)) * 100;
									$mostrar_porciento = round($porciento, 2);
									echo" ("; echo $mostrar_porciento; echo" %)";
								?>
								</h2>
								<p>
									Recuperados
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php 
								$casosActivos = $confirmados - $recuperadosT - ($total);
								$porciento_ca = ($casosActivos / ($confirmados - $total)) * 100;
								$show_p_ca = round($porciento_ca, 2);
								echo $casosActivos;
								echo" ("; echo $show_p_ca; echo" %)";
								?>
								</h2>
								<p>
									Casos activos
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		

		<section class="latest-work-area pt-100 pb-100">
			<div class="container-fluid">
				
			</div>
		</section>

		
		<?php
		include 'components/footer.php';
		include 'components/scripts.php';
		?>
		
		
	  <script>
			Highcharts.chart('container', {
		  chart: {
			type: 'spline'
		  },
		  title: {
			  text: 'Casos (total y diarios)'
		  },
		  subtitle: {
			text: ''
		  },
		  xAxis: {
			
			title: {
			  text: 'Dias'
			}
		  },
		  yAxis: {
			title: {
			  text: 'Casos'
			},
			min: 0
		  },
		  tooltip: {
		  
			headerFormat: '<b>{series.name}</b><br>',
			pointFormat: '{point.y:.2f} Casos'
		  },
	
		  plotOptions: {
			series: {
			  marker: {
				enabled: true
			  }
			}
		  },
	
		  colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
	
		  // Define the data points. All series have a dummy year
		  // of 1970/71 in order to be compared on the same x axis. Note
		  // that in JavaScript, months start at 0 for January, 1 for February etc.
		  series: [{
			name: "Nuevos casos por día en Argentina ",
			data: [		
				<?php include 'code-php/show-cases-perday.php';	 ?>		  
			  ]
		  }, {
			name: "Evolución de los casos en Argentina",
			data: [	
			  <?php
				include 'code-php/show-cases-evolution.php'; ?>		  
			]		  
		  }],
	
		  responsive: {
			rules: [{
			  condition: {
				maxWidth: 450
			  },
			  chartOptions: {
				plotOptions: {
				  series: {
					marker: {
					  radius: 2.5
					}
				  }
				}
			  }
			}]
		  }
		});
	
	  </script>

	  <script>
			Highcharts.chart('graphic2', {
					chart: {
	        type: 'spline'
			},
			title: {
				text:'Fallecidos'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				
				title: {
				text: 'Días'
				}
			},
			yAxis: {
				title: {
				text: 'Muertes'
				},
				min: 0
			},
			tooltip: {
			
				headerFormat: '<b>{series.name}</b><br>',
				pointFormat: '{point.y:.2f} Fallecidos'
			},

			plotOptions: {
				series: {
				marker: {
					enabled: true
				}
				}
			},

			colors: ['#000', '#000', '#000', '#000', '#000'],

			// Define the data points. All series have a dummy year
			// of 1970/71 in order to be compared on the same x axis. Note
			// that in JavaScript, months start at 0 for January, 1 for February etc.
			series: [{
				name: "Nuevas muertes por día en Argentina ",
				data: [
			
					<?php include 'code-php/show-newDeaths.php';?>
				]
			}],

			responsive: {
				rules: [{
				condition: {
					maxWidth: 450
				},
				chartOptions: {
					plotOptions: {
					series: {
						marker: {
						radius: 2.5
						}
					}
					}
				}
				}]
			}
			});

	
	  </script>

	  <script>
			Highcharts.chart('graphic3', {
				chart: {
			type: 'spline'
			},
			title: {
				text: 'Recuperados'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				
				title: {
				text: 'Días'
				}
			},
			yAxis: {
				title: {
				text: 'Recuperados'
				},
				min: 0
			},
			tooltip: {
			
				headerFormat: '<b>{series.name}</b><br>',
				pointFormat: '{point.y:.2f} Recuperados'
			},

			plotOptions: {
				series: {
				marker: {
					enabled: true
				}
				}
			},

			colors: ['#37D64F', '#37D64F', '#21E53F', '#21E53F', '#000'],

			// Define the data points. All series have a dummy year
			// of 1970/71 in order to be compared on the same x axis. Note
			// that in JavaScript, months start at 0 for January, 1 for February etc.
			series: [ {
				name: "Recuperados en Argentina",
				data: [
					<?php include 'code-php/show-newRecovereds.php';?>				
				]
			
			}],

			responsive: {
				rules: [{
				condition: {
					maxWidth: 450
				},
				chartOptions: {
					plotOptions: {
					series: {
						marker: {
						radius: 2.5
						}
					}
					}
				}
				}]
			}
			});

	
	  </script>
	</body>
</html>
