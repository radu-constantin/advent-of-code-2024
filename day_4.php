<?php
$input = [];

$text = fopen('./day_4_input.txt', 'r');

$test = file_get_contents('./day_4_input.txt');
// $test = preg_replace('/\s+/', '', $test);  

while($line = fgets($text)) {
  $input[] = trim($line);
}

$counter = 0;

// $counter += preg_match_all('/(XMAS)/', $test, $matches);
// $counter += preg_match_all('/(SAMX)/', $test, $matches);


for($index = 0; $index < count($input); $index += 1) {
  $firstLine = str_split($input[$index]);
  array_key_exists($index + 1, $input) ? $secondLine = str_split($input[$index + 1]) : $secondLine = [];
  array_key_exists($index + 2, $input) ? $thirdLine = str_split($input[$index + 2]) : $thirdLine = [];
  // array_key_exists($index + 3, $input) ? $fourthLine = str_split($input[$index + 3]) : $fourthLine = [];

  for ($i = 0; $i < count($firstLine); $i += 1) {
    // if ($firstLine[$i] === 'X' && $secondLine[$i] === 'M' && $thirdLine[$i] === 'A' && $fourthLine[$i] === 'S') {
    //   $counter += 1;
    // } if ($firstLine[$i] === 'S' && $secondLine[$i] === 'A' && $thirdLine[$i] === 'M' && $fourthLine[$i] === 'X') {
    //   $counter += 1;
    // } if ($firstLine[$i] === 'X' && $secondLine[$i+1] === 'M' && $thirdLine[$i+2] === 'A' && $fourthLine[$i+3] === 'S') {
    //   $counter += 1;
    // } if ($firstLine[$i] === 'S' && $secondLine[$i+1] === 'A' && $thirdLine[$i+2] === 'M' && $fourthLine[$i+3] === 'X') {
    //   $counter += 1;
    // } if ($firstLine[$i] === 'X' && $secondLine[$i-1] === 'M' && $thirdLine[$i-2] === 'A' && $fourthLine[$i-3] === 'S') {
    //   $counter += 1;
    // } if ($firstLine[$i] === 'S' && $secondLine[$i-1] === 'A' && $thirdLine[$i-2] === 'M' && $fourthLine[$i-3] === 'X') {
    //   $counter += 1;
    // }
    if ($firstLine[$i] === "M" && $secondLine[$i + 1] === "A" && $thirdLine[$i + 2] === "S") {
      if ($thirdLine[$i] === "M" && $firstLine[$i + 2] === "S") {
        $counter += 1;
      } elseif ($thirdLine[$i] === "S" && $firstLine[$i + 2] === "M") {
        $counter += 1;
      }
    }else if ($firstLine[$i] === "S" && $secondLine[$i + 1] === "A" && $thirdLine[$i + 2] === "M") {
      if ($thirdLine[$i] === "M" && $firstLine[$i + 2] === "S") {
        $counter += 1;
      } elseif ($thirdLine[$i] === "S" && $firstLine[$i + 2] === "M") {
        $counter += 1;
      }
    }
  }
};

echo $counter;