<?php

$numLines = trim(readline());
$buffer = array();

// if fewer than 4 read them all in, sort and output
if(4 >= $numLines) {
	$buffer = array();
	for($i = 0; $i < $numLines; $i++){
		$buffer[] = readline();
	}
} else {
	//buffer the first 4
	$dif = $numLines - 4;
	for($i = 0;$i < 4;$i++){
		$buffer[] = readline();
	}

	print_r($buffer);
	//then compare the buffer to each input on the way in
	for($i = 0;$i < $dif;$i++){
		$input = readline();
		for($k = 0;$k < 4;$k++) {
			if($buffer[$k] < $input) {
				$buffer[$k] = $input;
				break;
			}
		}
	}

}
arsort($buffer);
echo join("\n", $buffer);

