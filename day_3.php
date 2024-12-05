<?php
$input = file_get_contents('./day_3_input.txt');

preg_match_all('/mul\([0-9]{1,3},[0-9]{1,3}\)/', $input, $matches);

var_dump($matches[0][0]);