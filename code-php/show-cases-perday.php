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