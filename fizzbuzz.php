<?php

	define("FIZZ", isset($argv[1]) ? $argv[1] : 3);
	define("BUZZ", isset($argv[2]) ? $argv[2] : 5);

	for($i = 1; $i <= (isset($argv[3]) ? $argv[3] : 30); ++$i)
	{
		$out = "";
		if($i % FIZZ === 0) $out .= "fizz";
		if($i % BUZZ === 0) $out .= "buzz";
		if($out === "") $out .= $i;

		echo $out . "\n";
	}

?>
