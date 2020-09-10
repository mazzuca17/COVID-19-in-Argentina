<?php
	file_get_contents('http://api.coronatracker.com/v3/analytics/newcases/country?countryCode=AR&startDate=2020-03-03&endDate=2020-12-02');
	$dates = json_decode( file_get_contents('http://api.coronatracker.com/v3/analytics/newcases/country?countryCode=AR&startDate=2020-03-03&endDate=2020-12-02'), true );
	
	$i_new=0;
	$j_new = count($dates);
	$total = 2558;
	if(!empty($dates))
	{
		for ($i_new=1; $i_new < $j_new ; $i_new++)
		{ 
			$cases = $dates[$i_new]['new_deaths']; 
			if($dates[$i_new+1]['new_deaths'] != $dates[$i_new]['new_deaths'])  
			{
				$total += $dates[$i_new]['new_deaths']; 

			}
			$recuperadosT += $dates[$i_new]['new_recovered']; 
		}	
	}
	else {
		echo "Data not fetched.";
	}  
  

?>