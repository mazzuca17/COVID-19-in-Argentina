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
		<?php
			include 'header.php'; 		
			include '../code-php/show-graphics.php';
			include '../code-php/show-resumeEN.php';			
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
				<?php include '../code-php/show-cases-perday.php';?>				
			  ]
		  }, {
			name: "Evolution of cases in Argentina",
			data: [	
			  <?php	include '../code-php/show-cases-evolution.phh';?>			  
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
					<?php include '../code-php/show-newDeaths.php';?>			
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
				<?php include '../code-php/show-newRecovereds.php';?>								
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