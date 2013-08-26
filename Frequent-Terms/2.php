<?php
class FrequencyCounter {
	private $buffer;

	function add($element) {
		$this->buffer[$element] += 1;
	}

	function getTopN($outputSize) {
		$workingBuffer = $this->buffer;

		//sort by count, greatest to smallest
		arsort($workingBuffer);

		$countArray = array();
		//build array of arrays, outter array key is count.
		foreach($workingBuffer as $word => $count) {
			$countArray[$count][] = $word;
			//stop if we have enough for the output
			if(count($countArray) > $outputSize){
				break;
			}
		}
		

		//sort lexographically
		foreach($countArray as $key => &$wordArray){
			asort($wordArray);
		}


		$i = 0;
		$return = array();
		foreach($countArray as $k1=>$wordBucket){
			foreach($wordBucket as $k2=>$word){
				if($i < $outputSize){
					$return[] = $word;
					$i++;
				}
			}
		}
		return $return;
	}
}
class Driver{
	public function execute() {
		$inputSize = trim(readline());
		$fc = new FrequencyCounter();
		for($i = 0; $i < $inputSize; $i++) {
			$fc->add(trim(readline()));
		}

		$outputSize = trim(readline());
		$topN = $fc->getTopN($outputSize);
		echo join("\n",$topN);
	}
	
}

$d = new Driver();
$d->execute();
