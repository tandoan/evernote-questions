<?php
class CircularBuffer{

	private $buffer;
	private $head;

	private $count = 0;
	private $size = 0;

	public function __construct($size){
		$this->count = 0;	
		$this->size = $size;	
		$this->head = 0;
	}


	private function isFull(){
		return $this->count == $this->size;
	}

	private function isEmpty(){
		return 0 == $this->count;
	}
		
	public function append($input){
		//if size == 0, don't do anything.  prevent div by 0 error
		if($this->size > 0) {
			$tail = ($this->head + $this->count) % $this->size;
			$this->buffer[$tail] = $input;

			//if the buffer is full, move the head forward 1
			if($this->isFull()){
				$this->head = ($this->head + 1) % $this->size;
			} else {
				$this->count++;
			}
		}
	}

	public function remove($n){
		//if size == 0, don't do anything.  prevent div by 0 error
		if($this->size > 0) {
			//increment head by n spaces, decrement count by n
			$this->head = ($this->head + $n) % $this->size;
			$this->count = $this->count - $n;	

		}
	}


	public function printBuffer(){
		//if size == 0, don't do anything.  prevent div by 0 error
		if($this->size > 0) {

			$i = 0;
			$readIndex = $this->head;
			while($i < $this->count){
				echo $this->buffer[$readIndex];
				$readIndex = ($readIndex + 1) % $this->size;
				$i++;
				if($i < $this->count) {
					echo "\n";
				}
			}

		}
	}
}

class Driver{
	public function execute() {
		$bufferSize = trim(readline());
		$cb = new CircularBuffer($bufferSize);

		$line = '';
		while(true) {

			$line = readline();
			if('A' == $line[0]){
				$num = substr($line,2);
				unset($element);
				for($i = 0; $i < $num; $i++) {
					$element = readline();
					$cb->append($element);
				}
			} elseif('R' == $line[0]) {
				$num = substr($line,2);
				$cb->remove($num);
			} elseif ('L' == $line[0]) {
				$cb->printBuffer();
			} elseif('Q' == $line[0]) {
				exit;
			}	
		}
	}
	
}

$d = new Driver();
$d->execute();
