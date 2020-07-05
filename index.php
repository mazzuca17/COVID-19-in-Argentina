<?php
error_reporting(0);

        file_get_contents('https://api.covid19api.com/dayone/country/argentina/status/confirmed');
        $data = json_decode( file_get_contents('https://api.covid19api.com/dayone/country/argentina/status/confirmed'), true );
        $i=0;
        $a = 1;
        $t = 0;
        $j = count($data);
		$limit = $j+1;
                
        if(!empty($data))
        {
          for ($i=0; $i <$j ; $i++)
          { 
            
            $cases = $data[$i]['Cases'];
            $ej = $data[$i];

            if($a>=$limit){break;}
            else
            {
              if (count($ej) === 0){} 
              else 
              {             
                if($data[$a]['Cases'] != $data[$i]['Cases']){
                  
                  $calculo= $data[$a]['Cases'] - $data[$i]['Cases'];
                  if($calculo>0)
                  {
                    $nuevos_Casos[$t] = $calculo;
                  }
                  
                }
                else{
                  $nuevos_Casos[$t]=0;
				}
              }
            }          
            $a++;
            $t++;
            trim($a);


          }
          
        } else {
            echo "Data not fetched.";
		}
		
		//abro API con info general en el país
		file_get_contents('http://api.coronatracker.com/v3/analytics/newcases/country?countryCode=AR&startDate=2020-03-03&endDate=2020-12-02');
        $dates = json_decode( file_get_contents('http://api.coronatracker.com/v3/analytics/newcases/country?countryCode=AR&startDate=2020-03-03&endDate=2020-12-02'), true );
        $i_new=0;
        $j_new = count($dates);
		if(!empty($dates))
		{
		for ($i_new=0; $i_new < $j ; $i_new++)
		{ 
			$cases = $dates[$i_new]['new_deaths'];   
			$total += $dates[$i_new]['new_deaths']; 
			$recuperadosT += $dates[$i_new]['new_recovered']; 

		}
		
		}
		else {
			echo "Data not fetched.";
		}    
		  
      

       
        
       

        
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="Colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>COVID-19 in Argentina</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
		<style>
            .highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #EBEBEB;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
            padding: 0.5em;
            }
            .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
            }
            .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
            background: #f1f7ff;
            }

        </style>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

	</head>
	<body>
		<!-- Start Header Area -->
		<header class="default-header">
			<div class="container">
				<div class="header-wrap">
					<div class="header-top d-flex justify-content-between align-items-center">
						<div class="logo">
							<a href="index.html"><img src="img/logo.png" alt=""></a>
						</div>
						<div class="main-menubar d-flex align-items-center">
							<nav class="hide">
								<a href="index.html">Inicio</a>
								<a href="generic.html">Español/Ingles</a>
							</nav>
							<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
						</div>
					</div>
				</div>
			</div>
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

		<!-- Start service Area -->
		<section class="service-area">
			<div class="container-fluid">
				<div class="row justify-content-start align-items-center">
					<div class="col-lg-6 service-left">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-sm-8 service-content ">
								<h2 class="text-white"><span>Coronavirus</span><br>
								in Argentina.</h2>
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
								<?php echo $total;?>
								</h2>
								<p>
									Muertes
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php echo $recuperadosT;?>
								</h2>
								<p>
									Recuperados
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 single-services">
								<h2>
								<?php 
								$casosActivos = $confirmados - $recuperadosT - $total;
								echo $casosActivos;
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

		

		<!-- Start latest-work Area -->
		<section class="latest-work-area pt-100 pb-100">
			<div class="container-fluid">
				
			</div>
		</section>
		<!-- End latest-work Area -->

		
		<!-- Start Footer Area -->
		<footer class="footer-area pt-40 pb-40">
			<div class="container">
				<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
					<p class="footer-text m-0 text-white">COVID 19 - Matías Mazzuca &copy;<script>document.write(new Date().getFullYear());</script></p>
					
				</div>
			</div>
		</footer>
		
		<!-- End Footer Area -->
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/jquery.flipster.min.js"></script>
		<script src="js/main.js"></script>

		<script>
			Highcharts.chart('container', {
		  chart: {
			type: 'spline'
		  },
		  title: {
			text: 'Cases of Coronavirus COVID-19 in Argentina'
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
			name: "New Cases for days in Argentina ",
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
			name: "Evolution of Cases in Argentina",
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
			text: 'Deaths of COVID-19 in Argentina'
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
			name: "New Deaths per days in Argentina ",
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
			text: 'Deaths of COVID-19 in Argentina'
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

		colors: ['#37D64F', '#37D64F', '#21E53F', '#21E53F', '#000'],

		// Define the data points. All series have a dummy year
		// of 1970/71 in order to be compared on the same x axis. Note
		// that in JavaScript, months start at 0 for January, 1 for February etc.
		series: [ {
			name: "New Recorvered in Argentina",
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
