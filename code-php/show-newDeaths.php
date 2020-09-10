<?php
	if(!empty($dates))
	{
		$a_new = 0;
		for ($i_new=1; $i_new < $j_new ; $i_new++)
		{ 		  
			$a++;
			if($dates[$i_new]['new_deaths'] == $dates[$i_new+1]['new_deaths'])
			{}
			else
			{
				$cases = $dates[$i_new]['new_deaths'];   
				echo"[$i_new, $cases],";
			}
		}
	}
	else {
		echo "Data not fetched.";
	}
?>