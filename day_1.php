<?php
$text = fopen('./day_1_input.txt', "r");

$firstColumn = [];
$secondColumn = [];

while($line = fgets($text)) {
  $pair = preg_split('/\s+/', trim($line));
  $firstColumn[] = $pair[0];
  $secondColumn[] = $pair[1];
};

sort($firstColumn, SORT_NUMERIC);
sort($secondColumn, SORT_NUMERIC);

// $distance = 0;

// for ($i = 0; $i < count($firstColumn); $i += 1) {
//   $firstNum = $firstColumn[$i];
//   $secondNum = $secondColumn[$i];

//   if ($firstNum >= $secondNum) {
//     $distance += $firstNum - $secondNum;
//   } else {
//     $distance += $secondNum - $firstNum;
//   };
// }

$totalScore = 0;

foreach($firstColumn as $firstNum) {
  $count = 0;
  forEach($secondColumn as $secondNum) {
    if ($firstNum === $secondNum) {
      $count += 1;
    }
  }
  $totalScore += $firstNum * $count;
}
echo $totalScore;
