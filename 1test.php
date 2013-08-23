<?php

require('1.php');

$cb = new CircularBuffer(10);
$cb->append('Fee');
$cb->append('Fi');
$cb->append('Fo');
$cb->append('Fum');
$cb->remove(2);
echo $cb;

