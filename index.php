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
		<?php 
			include 'components/header.php'; 
			include 'code-php/show-graphics.php';
			include 'code-php/show-resume.php';	
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