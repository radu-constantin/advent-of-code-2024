<?php
$stream = fopen("./day_5_input.txt", "r");

$rules = [];
$pages = [];

while ($line = fgets($stream)) {
  $line = trim($line);
  if (strpos($line, '|')) {
    $rules[]=preg_split('/\|/', $line);
  } elseif (strlen($line) > 0) {
    $pages[]=preg_split('/,/', $line);
  }
}

$correctedPages = [];

foreach($pages as $page) {
  forEach($rules as $rule) {
    if (in_array($rule[0], $page) && in_array($rule[1], $page)) {
        $firstIndex = array_search($rule[0], $page);
        $secondIndex = array_search($rule[1], $page);

        if ($firstIndex > $secondIndex) {
          $correctedPages[] = $page;
          break;
        }
    }
  }
}

for ($i = 0; $i <= 100; $i += 1) {
  foreach($correctedPages as &$page) {
    foreach($rules as $rule) {
      if (in_array($rule[0], $page) && in_array($rule[1], $page)) {
        $firstIndex = array_search($rule[0], $page);
        $secondIndex = array_search($rule[1], $page);
        if ($firstIndex > $secondIndex) {
          $tempValue = $page[$firstIndex];
          $page[$firstIndex] = $page[$secondIndex];
          $page[$secondIndex] = $tempValue;
        }
      }
    }
  }
}

// var_dump($correctedPages);
unset($page);

$middlePageSum = 0;

for($i = 0; $i < count($correctedPages); $i += 1) {
  $page = $correctedPages[$i];
  $count = count($page);
  $index = intdiv($count, 2);
  $middlePageSum += $page[$index];
}

echo $middlePageSum;
/*
Go through each page list;
  - for each page list check if update pages are included;
    - if included check if first update is before the second update;
  - if page list passes all rules store it in special list;
*/
