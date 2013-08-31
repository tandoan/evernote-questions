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
	$leftProducts[$i] = bcmul($leftProducts[$i-1], $input);
	$numbers[] = $input;
}

//step backwards, calculating product from right to left, store in place
$rightProducts = 1;
for($i = $numLines-2;$i>=0;$i--) {
	$rightProducts = bcmul($rightProducts,  $numbers[$i+1]);
	$leftProducts[$i] = bcmul($leftProducts[$i], $rightProducts);

}

//last element unnecessary
array_pop($leftProducts);

//final output
$i = 0;
while($i<$numLines){
	echo $leftProducts[$i];
	$i++;
	if($i<$numLines){
		echo PHP_EOL;
	}
}
