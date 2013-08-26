<?php

$numbers = array();
$runningTotal = 1;

$numLines = readline();
for($i=0;$i < $numLines; $i++){
	$input = trim(readline());
	$runningTotal *= $input;
	$numbers[] = $input;
}

foreach($numbers as $num){
	echo $runningTotal/$num;
	echo "\n";
}
