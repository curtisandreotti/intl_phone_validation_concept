<?php

function formatPhoneForDisplay($phone,$country)
{
	global $box;

        $digits = preg_replace("![^0-9]!", "", $phone);

	if ($box->id == '19' || $box->id == '38')
	{
		return $phone;
	}
        
		if (strlen($digits) < 10 || strlen($digits) > 11)
        {
                return $phone;
        }

        // Remove the first 1
        if (strlen($digits) == 11)
        {
            $digits = substr($digits, 1);
        }
        
		if ($country == "AUS") 
		{
	       	$part1 = substr($digits,0,1);
        	$part2 = substr($digits,3,3);
        	$part3 = substr($digits,6,4);
		}
		elseif ($country == "NZ")
		{
			$part1 = substr($digits,0,3);
        	$part2 = substr($digits,3,3);
        	$part3 = substr($digits,6,4);
		}   
		else
		{
			$part1 = substr($digits,0,3);
        	$part2 = substr($digits,3,3);
        	$part3 = substr($digits,6,4);
		}
        

	if ( $box->id == 130 )
        	$array = array( $part1, " ", $part2, "-", $part3);

	elseif ($country == "AUS")
			$array = array( "+61 ",$part1, " ", $part2, " ", $part3);
	
	elseif ($country == "NZ")
			$array = array( "+61 ",$part1, " ", $part2, " ", $part3); 
	
	else
        	$array = array( "(", $part1, ") ", $part2, "-", $part3);

        $returnPhone = implode("",$array);

        return $returnPhone;

}     

?>