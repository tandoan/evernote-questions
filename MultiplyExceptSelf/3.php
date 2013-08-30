<?php

$numbers = array();
$leftProducts = array();

$numLines = readline();

$runningTotal = 1;
$leftProducts[0] = 1;

//store products from left to right
$runCount = $numLines + 1;
for($i=1;$i < $runCount; $i++){
	$input = trim(readline());
	$leftProducts[$i] = $leftProducts[$i-1] * $input;
	$numbers[] = $input;
}

//step backwards, calculating product from right to left, store in place
$rightProducts = 1;
for($i = $numLines-2;$i>=0;$i--) {
	$rightProducts = $rightProducts * $numbers[$i+1];
	$leftProducts[$i] = $leftProducts[$i] * $rightProducts;

}

//last element unnecessary
array_pop($leftProducts);

//final output
echo join(PHP_EOL, $leftProducts);
