<?php

	//ones		IV
	//tens		XL
	//hundreds	CD
	//thousands	M

	$in = isset($argv[1]) ? $argv[1] : 1776;
	$out = "";


	while(strlen($in) > 0)
	{

		switch (strlen($in))
		{
			case "1":
				switch (substr($in, 0, 1))
				{
					case "1": $out .= "I"; break;
					case "2": $out .= "II"; break;
					case "3": $out .= "III"; break;
					case "4": $out .= "IV"; break;
					case "5": $out .= "V"; break;
					case "6": $out .= "VI"; break;
					case "7": $out .= "VII"; break;
					case "8": $out .= "VIII"; break;
					case "9": $out .= "IX"; break;
				}
				break;
			case "2":
				switch (substr($in, 0, 1))
				{
					case "1": $out .= "X"; break;
					case "2": $out .= "XX"; break;
					case "3": $out .= "XXX"; break;
					case "4": $out .= "XL"; break;
					case "5": $out .= "L"; break;
					case "6": $out .= "LX"; break;
					case "7": $out .= "LXX"; break;
					case "8": $out .= "LXXX"; break;
					case "9": $out .= "XC"; break;
				}
				break;
			case "3":
				switch (substr($in, 0, 1))
				{
					case "1": $out .= "C"; break;
					case "2": $out .= "CC"; break;
					case "3": $out .= "CCC"; break;
					case "4": $out .= "CD"; break;
					case "5": $out .= "D"; break;
					case "6": $out .= "DC"; break;
					case "7": $out .= "DCC"; break;
					case "8": $out .= "DCCC"; break;
					case "9": $out .= "CM"; break;
				}
				break;
			default:
				for($i = 0; $i < pow(10, strlen($in)-4); ++$i)
				{
					for($j = 0; $j < substr($in, 0, 1); ++$j)
					{
						$out .= "M";
					}
				}
		}

		$in = substr($in, 1);

	}

	echo $out . "\n";

?>
