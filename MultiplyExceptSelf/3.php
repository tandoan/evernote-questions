<?php

$numbers = array();
$leftProducts = array();
$rightProducts = array();

$numLines = readline();

$runningTotal = 1;
$leftProducts[0] = 1;
$rightProducts[$numLines] = 1;

//store the left and right side multiplication in separate arrays to prevent overflow.
//multiply the two arrays together for final answer

$runCount = $numLines + 1;
for($i=1;$i < $runCount; $i++){
	$input = trim(readline());
	$numbers[] = $input;
	$leftProducts[$i] = $leftProducts[$i-1] * $input;
}

// generate array for right side, using $numbers[] buffer
for($i=1;$i < $runCount; $i++) {
	$rightProducts[$numLines - $i] = $rightProducts[$numLines - $i + 1] * $numbers[$numLines - $i];
}

$i = 0;
$output = array();
while($i < $numLines) {
	$output[$i] = $leftProducts[$i] * $rightProducts[$i+1];
	$i++;
}
echo join("\n", $output);
