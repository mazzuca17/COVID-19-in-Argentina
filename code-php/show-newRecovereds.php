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