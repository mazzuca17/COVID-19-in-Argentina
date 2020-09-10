<?php
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

            if($a>=$j+1){break;}
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
?>