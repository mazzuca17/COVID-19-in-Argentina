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