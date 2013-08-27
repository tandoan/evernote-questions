<?php

$numbers = array();
$leftFactorials = array();
$rightFactorials = array();

$numLines = readline();

$runningTotal = 1;
$leftFactorials[0] = 1;
$rightFactorials[$numLines] = 1;

//store the left and right side multiplication in separate arrays to prevent overflow.
//multiply the two arrays together for final answer

$runCount = $numLines + 1;
for($i=1;$i < $runCount; $i++){
	$input = trim(readline());
	$numbers[] = $input;
	$leftFactorials[$i] = $leftFactorials[$i-1] * $input;
}

// generate array for right side, using $numbers[] buffer
for($i=1;$i < $runCount; $i++) {
	$rightFactorials[$numLines - $i] = $rightFactorials[$numLines - $i + 1] * $numbers[$numLines - $i];
}

$i = 0;
while($i < $numLines) {
	echo $leftFactorials[$i] * $rightFactorials[$i+1];
	echo "\n";
	$i++;

}

