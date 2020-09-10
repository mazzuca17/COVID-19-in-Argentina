<?php
	error_reporting(0);
	$language = 'english';

	include '../code-php/extraer-casos.php';
	include '../code-php/extraer-recuperados.php';
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<?php include 'head.php'; ?>
	</head>
	<body>
		<!-- Start Header Area -->
		<header class="default-header">
			<?php include 'header.php'; ?>
		</header>
		<!-- End Header Area -->
		<!-- Start Banner Area -->
		<section class="banner-area relative">
			<div class="container">
				<div class="row fullscreen align-items-center justify-content-between" style="height: 735px;">
					<div class="col-lg-12">
						<div class="banner-content text-center">
							<h1 class="text-white text-uppercase">COVID-19 in Argentina</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Area -->

		<!-- Start feature Area -->
		<section class="feature-area">
			<div class="container">
				
				<figure class="highcharts-figure">
					<div class="row justify-content-center">
						<h2>COVID-19 cases in Argentina</h2>
					</div>
					<div id="container"></div>
					<p class="highcharts-description">
						This graph shows the total cases and cases that were recorded per day of
						COVID-19 in Argentina.
						To display the information by day, place the cursor on the point of the graph.
						The most recent cases are shown to the right of the graph.
					</p>
					</figure>
			
			</div>
			<div class="container">
				
				<figure class="highcharts-figure">
					<div class="row justify-content-center">
						<h2>
							Deaths per day from COVID-19 in Argentina
						</h2>
					</div>

					<div id="graphic2"></div>
					<p class="highcharts-description">
					This graph shows data on new deaths by
					COVID-19 that were produced in Argentina per day.
					To display the information by day, place the cursor on the point of the graph.
					The most recent cases are shown to the right of the graph
						
					</p>
					</figure>
			
			</div>
			<div class="container">
				
				<figure class="highcharts-figure">
					<div class="row justify-content-center">
						<h2>
							Recovered per day by COVID-19 in Argentina						
						</h2>
					</div>
					<div id="graphic3"></div>
					<p class="highcharts-description">
					This graph shows data on newly recovered
					by COVID-19 that occurred in Argentina per day.
					To display the information by day, place the cursor on the point of the graph.
					The most recent cases are shown to the right of the graph.
						
					</p>
					</figure>
			
			</div>
		</section>

		<!-- Start service Area -->
		<section class="service-area">
			<div class="container-fluid">
				<div class="row justify-content-start align-items-center">
					<div class="col-lg-6 service-left">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-sm-8 service-content ">
								<h2 class="text-white">
								<span>Coronavirus</span><br>
								in Argentina.

							    </h2>
								<p>
									
									All important total data on the
									Coronavirus advance
									COVID-19 in the country.
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
									Confirmed cases
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php echo $total;?>
								</h2>
								<p>
									Deaths
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
									Recovered
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
									Active Cases
								</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		

		<!-- Start latest-work Area -->
		<section class="latest-work-area pt-100 pb-100">
			<div class="container-fluid">
				
			</div>
		</section>
		<!-- End latest-work Area -->

		
		<!-- Start Footer Area -->
		<?php
		include 'footer.php';
		include 'scripts.php';
		?>

	  <script>
			Highcharts.chart('container', {
		  chart: {
			type: 'spline'
		  },
		  title: {
			  text: 'Cases (total and daily)'
		  },
		  subtitle: {
			text: ''
		  },
		  xAxis: {
			
			title: {
			  text: 'Days'
			}
		  },
		  yAxis: {
			title: {
			  text: 'Cases'
			},
			min: 0
		  },
		  tooltip: {
		  
			headerFormat: '<b>{series.name}</b><br>',
			pointFormat: '{point.y:.2f} Cases'
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
			name: "New cases per day in Argentina ",
			data: [
		  
				<?php
				if(!empty($data))
				{
				  $a=0;
				
					for ($i=1; $i < $t ; $i++)
					{ 
					  $cases = $data[$i]['Cases'] - $data[$a]['Cases'];   
					  $a++;
	
					  if($cases !=0)
					  {
						echo"[$i, $cases],";
	
					  }
	
	
					}
						
				
				}
				else {
					echo "Data not fetched.";
				}
				  
				?>
	
			  
			  ]
		  }, {
			name: "Evolution of cases in Argentina",
			data: [
	
			  <?php
				
				if(!empty($data))
				{
				  for ($i=0; $i < $j ; $i++)
				  { 
					$cases = $data[$i]['Cases'];   
				  
					echo"[$i, $cases],";
	
				  }
				
				}
				else {
					echo "Data not fetched.";
				}
				
				?>
			  
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
			text:'Deaths'
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			
			title: {
			text: 'Days'
			}
		},
		yAxis: {
			title: {
			text: 'Deaths'
			},
			min: 0
		},
		tooltip: {
		
			headerFormat: '<b>{series.name}</b><br>',
			pointFormat: '{point.y:.2f} Deaths'
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
			name: "New deaths per day in Argentina ",
			data: [
		
				<?php
				if(!empty($dates))
				{
				for ($i_new=0; $i_new < $j_new ; $i_new++)
				{ 
					$cases = $dates[$i_new]['new_deaths'];   
					echo"[$i_new, $cases],";

				}
				
				}
				else {
					echo "Data not fetched.";
				}
				?>

			
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
				text: 'Recovered'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				
				title: {
				text: 'Days'
				}
			},
			yAxis: {
				title: {
				text: 'Recovered'
				},
				min: 0
			},
			tooltip: {
			
				headerFormat: '<b>{series.name}</b><br>',
				pointFormat: '{point.y:.2f} Recovered'
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
				name: "Recovered in Argentina",
				data: [

				<?php
					
					if(!empty($dates))
					{
					for ($i_new=0; $i_new < $j_new ; $i_new++)
					{ 
						$cases = $dates[$i_new]['new_recovered'];   
					
						echo"[$i_new, $cases],";

					}
					
					}
					else {
						echo "Data not fetched.";
					}
					
					?>
				
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
