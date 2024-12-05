<?php
$input = fopen('./day_2_input.txt', 'r');
$list = [];

while($line = fgets($input)) {
  $list[] = preg_split('/\s+/', trim($line));
};

$counter = 0;

foreach($list as $level) {
  $order = null;
  if ($level[0] === $level[1]) {
    continue;
  } else if ($level[0] < $level[1]) {
    $order = 'ascending';
  } else if ($level[0] > $level[1]) {
    $order = 'descending';
  }

  $errors = 0;

  for ($i = 0; $i <= count($level) - 2; $i += 1) {
    if ($order === 'ascending') {
      if ($level[$i + 1] - $level[$i] > 3 || $level[$i + 1] - $level[$i] < 1) {
        $errors += 1;
      }
    } else if ($order === 'descending') {
      if ($level[$i] - $level[$i + 1] > 3 || $level[$i] - $level[$i + 1] < 1) {
        $errors += 1;
      }
    }
  }

  if ($errors <= 1) {
    $counter += 1;
  }
}

echo $counter;
