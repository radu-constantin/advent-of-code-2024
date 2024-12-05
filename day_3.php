<?php
$input = file_get_contents('./day_3_input.txt');

preg_match_all("/mul\([0-9]{1,3},[0-9]{1,3}\)|do\(\)|don't\(\)/", $input, $matches);

$commands = $matches[0];

$sum = 0;

$enableAdding = true;

foreach($commands as $command) {
  if ($command === "do()") {
    $enableAdding = true;  
  } else if ($command === "don't()") {
    $enableAdding = false;
  } else {
    if ($enableAdding) {
      preg_match_all('/[0-9]+/',$command, $numbers);
      $firstNumber = $numbers[0][0];
      $secondNumber = $numbers[0][1];

      $sum += $firstNumber * $secondNumber;
    }
  }
}

echo $sum;